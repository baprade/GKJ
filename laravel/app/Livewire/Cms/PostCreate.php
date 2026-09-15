<?php

namespace App\Livewire\Cms;

use App\Livewire\Forms\Cms\PostForm;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.cms')]

class PostCreate extends Component
{
    use WithFileUploads;

    public PostForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('message', 'Post BERHASIL disimpan.');
        session()->flash('theme', 'success');

        $this->redirectRoute('cms-posts');
    }

    public function render()
    {
        return view('livewire.cms.post-form', [
            'page_title' => 'Tambah Post',
        ]);
    }
}
