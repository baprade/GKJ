<?php

namespace App\Livewire\Cms;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class HomeSlideIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        $homeslide = Post::findOrFail($id);
        if (Storage::exists('homeslide/'.$homeslide->photo_file)) {
            Storage::delete('homeslide/'.$homeslide->photo_file);
        }

        $deleteHomeSlide = Post::findOrFail($id)->delete();

        if ($deleteHomeSlide == true) {
            session()->flash('message', 'HomeSlide BERHASIL dihapus.');
            session()->flash('theme', 'success');
        } elseif ($deleteHomeSlide == false) {
            session()->flash('message', 'HomeSlide GAGAL dihapus.');
            session()->flash('theme', 'danger');
        }

        // $this->redirectRoute('cms-homeslide');
    }

    public function render()
    {
        $homeslides = Post::query()
            ->when(! empty($this->search), function ($query) {
                $query->where(function ($query) {
                    $query->Where('h1', 'like', '%'.$this->search.'%')
                        ->orWhere('h2', 'like', '%'.$this->search.'%')
                        ->orWhere('photo_grafer', 'like', '%'.$this->search.'%')
                        ->orWhere('photo_caption', 'like', '%'.$this->search.'%')
                        ->orWhere('belly', 'like', '%'.$this->search.'%')
                        ->orWhere('key_word', 'like', '%'.$this->search.'%');
                });
            })
            ->where('id_format', 5)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.homeslide-index', [
            'page_title' => 'HomeSlide',
            'items' => $homeslides,
            'href_create' => 'cms-homeslide-create',
            'href_edit' => 'cms-homeslide-edit',
            'awesome' => 'fa-solid fa-images',
        ]);
    }

    public function clearInputSearch()
    {
        $this->search = '';
    }
}
