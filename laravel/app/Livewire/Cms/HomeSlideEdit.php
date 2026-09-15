<?php

namespace App\Livewire\Cms;

use App\Livewire\Forms\Cms\HomeSlideForm;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.cms')]

class HomeSlideEdit extends Component
{
    use WithFileUploads;

    public HomeSlideForm $form;

    public $id = 0;

    public function mount()
    {
        $this->form->setHomeSlide(Post::findOrFail($this->id));
    }

    public function save()
    {
        $this->form->update();

        session()->flash('message', 'HomeSlide BERHASIL disimpan.');
        session()->flash('theme', 'success');

        $this->redirectRoute('cms-homeslide-edit', ['id' => $this->id]);
    }

    public function deleteFoto($id)
    {
        $homeslide = Post::findOrFail($id);
        if (Storage::exists('homeslide/'.$homeslide->photo_file)) {
            Storage::delete('homeslide/'.$homeslide->photo_file);
        }

        $deletePostphoto_file = Post::findOrFail($id)->update([
            'photo_file' => null,
        ]);

        if ($deletePostphoto_file == true) {
            session()->flash('message', 'Foto Slide BERHASIL dihapus.');
            session()->flash('theme', 'success');
        } elseif ($deletePostphoto_file == false) {
            session()->flash('message', 'Foto Slide GAGAL dihapus.');
            session()->flash('theme', 'danger');
        }

        // $this->redirectRoute('cms-posts');
        $this->reset('form.photo_file');
    }

    public function render()
    {
        return view('livewire.cms.homeslide-form', [
            'page_title' => 'Edit HomeSlide',
        ]);
    }
}
