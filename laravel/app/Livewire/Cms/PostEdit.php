<?php

namespace App\Livewire\Cms;

use App\Livewire\Forms\Cms\PostForm;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.cms')]

class PostEdit extends Component
{
    use WithFileUploads;

    public PostForm $form;

    public $id = 0;

    public function mount()
    {
        $this->form->setPost(Post::findOrFail($this->id));
    }

    public function save()
    {
        $this->form->update();

        session()->flash('message', 'Post BERHASIL disimpan.');
        session()->flash('theme', 'success');

        $this->redirectRoute('cms-posts-edit', ['id' => $this->id]);
    }

    public function deleteFoto($id)
    {
        $del_photo = Post::findOrFail($this->id)->photo_file;
        $deletePostphoto_file = $this->deleteFilesByNameWithoutExtension($del_photo);

        if ($deletePostphoto_file == true) {
            session()->flash('message', 'Foto BERHASIL dihapus.');
            session()->flash('theme', 'success');
        } elseif ($deletePostphoto_file == false) {
            session()->flash('message', 'Foto GAGAL dihapus.');
            session()->flash('theme', 'danger');
        }

        // $this->redirectRoute('cms-posts');
        $this->reset('form.photo_file');
    }

    public function render()
    {
        return view('livewire.cms.post-form', [
            'page_title' => 'Edit Post',
            'photos' => Photo::where('id_post', $this->id)->get(),
        ]);
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
