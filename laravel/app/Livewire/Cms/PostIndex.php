<?php

namespace App\Livewire\Cms;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class PostIndex extends Component
{
    use WithPagination;

    public $search = '';

    public $id_format = 0;

    public $id_category = 0;

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $this->deleteFilesByNameWithoutExtension($post->photo_file);

        $deletePost = Post::findOrFail($id)->delete();

        if ($deletePost == true) {
            session()->flash('message', 'Post BERHASIL dihapus.');
            session()->flash('theme', 'success');
        } elseif ($deletePost == false) {
            session()->flash('message', 'Post GAGAL dihapus.');
            session()->flash('theme', 'danger');
        }

        // $this->redirectRoute('cms-post');
    }

    public function render()
    {
        $posts = Post::query()
            ->when(! empty($this->id_format), fn ($query) => $query->where('id_format', $this->id_format))
            ->when(! empty($this->id_category), fn ($query) => $query->where('id_category', $this->id_category))
            ->when(! empty($this->search), fn ($query) => $query->where(function ($query) {
                $query->where('h1', 'like', '%'.$this->search.'%')
                    ->orWhere('eyebrow', 'like', '%'.$this->search.'%')
                    ->orWhere('h2', 'like', '%'.$this->search.'%')
                    ->orWhere('photo_grafer', 'like', '%'.$this->search.'%')
                    ->orWhere('photo_caption', 'like', '%'.$this->search.'%')
                    ->orWhere('belly', 'like', '%'.$this->search.'%')
                    ->orWhere('key_word', 'like', '%'.$this->search.'%');
            }))
            ->where('id_format', '!=', 5)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.post-index', [
            'page_title' => 'Posts',
            'items' => $posts,
            'href_create' => 'cms-posts-create',
            'href_edit' => 'cms-posts-edit',
            'awesome' => 'fa-solid fa-newspaper',
        ]);
    }

    public function clearInputSearch()
    {
        $this->search = '';
    }

    // Fungsi untuk menghapus file berdasarkan nama tanpa ekstensi di folder 'original' dan 'webp'
    public function deleteFilesByNameWithoutExtension($fileName)
    {
        // Ambil nama file tanpa ekstensi
        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);

        // Daftar ekstensi yang ingin dicari di folder 'original'
        $extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif', 'bmp'];

        // Loop untuk mencoba setiap ekstensi di folder 'original'
        foreach ($extensions as $ext) {
            $filePath = 'original/'.$fileNameWithoutExtension.'.'.$ext;

            if (Storage::exists($filePath)) {
                Storage::delete($filePath); // Hapus file jika ditemukan
                break; // Keluar dari loop setelah file ditemukan dan dihapus
            }
        }

        // Cek dan hapus file di folder 'webp' dengan ekstensi .webp
        $webpFileLarge = 'large/'.$fileNameWithoutExtension.'.webp';
        if (Storage::exists($webpFileLarge)) {
            Storage::delete($webpFileLarge);
        }
        $webpFileMedium = 'medium/'.$fileNameWithoutExtension.'.webp';
        if (Storage::exists($webpFileMedium)) {
            Storage::delete($webpFileMedium);
        }
        $webpFileSmall = 'small/'.$fileNameWithoutExtension.'.webp';
        if (Storage::exists($webpFileSmall)) {
            Storage::delete($webpFileSmall);
        }
    }
}
