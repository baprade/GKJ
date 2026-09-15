<?php

namespace App\Livewire\Guest;

use App\Livewire\Forms\Guest\LoginForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]

class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $this->form->store();
    }

    public function render()
    {
        return view('livewire.guest.login');
    }
}
