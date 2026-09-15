<?php

namespace App\Livewire\Cms;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('components.layouts.cms')]

class AccountPasswordReset extends Component
{
    #[Rule('required', message: 'Silakan ketik Password Baru.')]
    #[Rule('min:3', message: 'Karakter terlalu sedikit.')]
    public $password = '';

    #[Rule('required', message: 'Silakan ketik Confirm Password Baru.')]
    #[Rule('min:3', message: 'Karakter terlalu sedikit.')]
    #[Rule('same:password', message: 'Password tidak sama.')]
    public $password_confirm = '';

    public $id = 0;

    public $name = '';

    public $email = '';

    public function mount()
    {
        if ($this->id == 0) {
            $this->id = Auth()->user()->id;
        }
        $user = User::findOrFail($this->id);
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update()
    {
        $this->validate();

        $resetPassword = User::findOrFail($this->id)->update(['password' => $this->password]);

        if ($resetPassword == true) {
            session()->flash('message', 'Reset Password BERHASIL dilakukan.');
            session()->flash('theme', 'success');
        } elseif ($resetPassword == false) {
            session()->flash('message', 'Reset Password GAGAL dilakukan.');
            session()->flash('theme', 'danger');
        }

        // $this->redirectRoute('cms-users-password-reset', ['id' => $this->id]);
    }

    public function render()
    {
        return view('livewire.cms.account-password-reset', [
            'page_title' => 'Reset Password',
        ]);
    }
}
