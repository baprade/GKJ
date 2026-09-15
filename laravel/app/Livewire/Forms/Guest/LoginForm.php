<?php

namespace App\Livewire\Forms\Guest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required', message: 'Silakan ketik E-Mail.')]
    #[Rule('min:3', message: 'Karakter terlalu sedikit.')]
    #[Rule('email', message: 'Silakan ketik alamat E-Mail yang valid.')]
    public $email = '';

    #[Rule('required', message: 'Silakan ketik Password.')]
    #[Rule('min:3', message: 'Karakter terlalu sedikit.')]
    public $password = '';

    public $remember = false;

    public function store()
    {
        $this->validate();

        if (Auth::attempt($this->validate(), $this->remember)) {
            if (Auth()->user()->onoff == 1) {
                // return redirect()->route('dashboard');

                // Auth::login($user);

                // User Admin
                if ((Auth()->user()->id_role == 1) ||
                    (Auth()->user()->id_role == 2) ||
                    (Auth()->user()->id_role == 3) ||
                    (Auth()->user()->id_role == 4)) {
                    return Redirect::route('dashboard');
                }

                // Visitor
                else {
                    return Redirect::route('home');
                }

            } elseif (Auth()->user()->onoff == 0) {
                session()->flash('message', 'Akun belum di-approve. Silakan hubungi Admin.');
                session()->flash('theme', 'warning');

                Auth::logout();

                return Redirect::route('login');
            }
        }

        throw ValidationException::withMessages([
            // 'email' => ('The provided credentials do not match our records.'),
            'noemail' => ('E-Mail dan atau Password yang Anda ketik tidak tersedia di dalam database kami.'),
        ]);
    }
}
