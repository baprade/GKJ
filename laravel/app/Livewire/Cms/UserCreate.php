<?php

namespace App\Livewire\Cms;

use App\Livewire\Forms\Cms\UserForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.cms')]

class UserCreate extends Component
{
    public UserForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('message', 'User BERHASIL disimpan.');
        session()->flash('theme', 'success');

        $this->redirectRoute('cms-users');
    }

    public function render()
    {
        return view('livewire.cms.user-form-create', [
            'page_title' => 'Tambah User',
        ]);
    }
}
