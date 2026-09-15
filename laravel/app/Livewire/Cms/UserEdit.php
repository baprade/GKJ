<?php

namespace App\Livewire\Cms;

use App\Livewire\Forms\Cms\UserForm;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.cms')]

class UserEdit extends Component
{
    public UserForm $form;

    public $id = 0;

    public function mount()
    {
        $this->form->setUser(User::findOrFail($this->id));
    }

    public function save()
    {
        $this->form->update();

        session()->flash('message', 'User BERHASIL disimpan.');
        session()->flash('theme', 'success');

        $this->redirectRoute('cms-users-edit', ['id' => $this->id]);
    }

    public function render()
    {
        return view('livewire.cms.user-form', [
            'page_title' => 'Edit User',
        ]);
    }
}
