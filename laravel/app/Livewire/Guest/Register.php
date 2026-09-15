<?php

namespace App\Livewire\Guest;

use App\Livewire\Forms\Guest\RegisterForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]

class Register extends Component
{
    public RegisterForm $form;

    public function save()
    {
        $this->form->store();
        // session()->flash('message', 'Register BERHASIL dilakukan. Silakan hubungi Admin untuk di-approve.');
        session()->flash('message', 'Register BERHASIL dilakukan.');
        session()->flash('theme', 'success');
        $this->redirectRoute('login');
    }

    public function render()
    {
        return view('livewire.guest.register');
    }
}
