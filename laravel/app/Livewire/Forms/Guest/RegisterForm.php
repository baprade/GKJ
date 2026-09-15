<?php

namespace App\Livewire\Forms\Guest;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisterForm extends Form
{
    public ?User $user;

    #[Rule('required', message: 'Silakan ketik Nama.')]
    #[Rule('min:3', message: 'Karakter terlalu sedikit.')]
    public $name = '';

    // #[Rule('not_in:0', message: 'Silakan pilih Role.')]
    // public $id_role = 0;

    #[Rule('required', message: 'Silakan ketik E-Mail.')]
    #[Rule('min:3', message: 'Karakter terlalu sedikit.')]
    #[Rule('email', message: 'Silakan ketik alamat E-Mail yang valid.')]
    #[Rule('unique:users,email', message: 'Alamat E-Mail sudah terdaftar, silakan gunakan Alamat E-Mail yang lain.')]
    public $email = '';

    #[Rule('required', message: 'Silakan ketik Password.')]
    #[Rule('min:3', message: 'Karakter terlalu sedikit.')]
    public $password = '';

    #[Rule('required', message: 'Silakan ketik Confirm Password.')]
    #[Rule('min:3', message: 'Karakter terlalu sedikit.')]
    #[Rule('same:password', message: 'Password tidak sama.')]
    public $password_confirm = '';

    public $onoff = 0;

    public function store()
    {
        $this->validate();

        $createUser = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            // 'id_role' => $this->id_role,
            'id_role' => 5,
            // 'onoff' => $this->onoff,
            'onoff' => 1,
        ];
        User::create($createUser);

        $this->reset();
    }
}
