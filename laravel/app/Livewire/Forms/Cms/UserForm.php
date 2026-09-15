<?php

namespace App\Livewire\Forms\Cms;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    public $id = 0;

    #[Rule('required', message: 'Silakan ketik Nama.')]
    #[Rule('min:3', message: 'Karakter terlalu sedikit.')]
    public $name = '';

    public $nickname = '';

    public $avatar = '';

    #[Rule('required', message: 'Silakan ketik E-Mail.')]
    #[Rule('min:3', message: 'Karakter terlalu sedikit.')]
    #[Rule('email', message: 'Silakan ketik alamat E-Mail yang valid.')]
    // #[Rule('unique:users,email', message: 'Alamat E-Mail sudah terdaftar, silakan gunakan Alamat E-Mail yang lain.')]
    public $email = '';

    public $password = '';

    public $password_confirm = '';

    #[Rule('not_in:0', message: 'Silakan pilih Role.')]
    public $id_role = 0;

    public $onoff = 0;

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->id = $user->id;
        $this->name = $user->name;
        $this->nickname = $user->nickname;
        $this->avatar = $user->avatar;
        $this->email = $user->email;
        $this->id_role = $user->id_role;
        $this->onoff = $user->onoff;
    }

    public function update()
    {
        $this->validate();

        $rules = [
            'email' => 'unique:users,email,'.$this->id.'',
        ];
        $messages = [
            'email.unique' => 'Alamat E-Mail sudah terdaftar, silakan gunakan Alamat E-Mail yang lain.',
        ];
        $this->validate($rules, $messages);

        $updateUser = [
            'name' => $this->name,
            'nickname' => $this->nickname,
            'email' => $this->email,
            'id_role' => $this->id_role,
            'onoff' => $this->onoff,
        ];
        User::findOrFail($this->id)->update($updateUser);

        // $this->reset();
    }

    public function store()
    {
        $this->validate();

        $rules = [
            'email' => 'unique:users,email,'.$this->id.'',
            'password' => 'required|min:3',
            'password_confirm' => 'required|min:3|same:password',
        ];
        $messages = [
            'email.unique' => 'Alamat E-Mail sudah terdaftar, silakan gunakan Alamat E-Mail yang lain.',
            'password.required' => 'Silakan ketik Password.',
            'password.min' => 'Karakter terlalu sedikit.',
            'password_confirm.required' => 'Silakan ketik Confirm Password.',
            'password_confirm.min' => 'Karakter terlalu sedikit.',
            'password_confirm.same' => 'Password tidak sama.',
        ];
        $this->validate($rules, $messages);

        $createUser = [
            'name' => $this->name,
            'nickname' => $this->nickname,
            'email' => $this->email,
            'password' => $this->password,
            'id_role' => $this->id_role,
            'onoff' => 1,
        ];
        User::create($createUser);

        // $this->reset();
    }
}
