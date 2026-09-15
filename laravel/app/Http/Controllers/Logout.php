<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Auth::logout();

        session()->flash('message', 'Logout BERHASIL');
        session()->flash('theme', 'success');

        // return Redirect::back();
        // return to_route('login');
        return redirect()->back();
    }
}
