<?php

namespace App\Livewire\Cms;

use App\Livewire\Forms\Cms\UserForm;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.cms')]

class AccountEdit extends Component
{
    public UserForm $form;

    public $id = 0;

    public function mount()
    {
        $this->id = Auth()->user()->id;
        $this->form->setUser(User::findOrFail($this->id));
    }

    public function save()
    {
        $this->form->update();

        session()->flash('message', 'Akun BERHASIL disimpan.');
        session()->flash('theme', 'success');

        $this->redirectRoute('cms-account-edit');
    }

    public function render()
    {
        return view('livewire.cms.account-form', [
            'page_title' => 'Edit Akun',
        ]);
    }
}
