<?php

namespace App\Livewire\App;

use Livewire\Component;

class FormulirSent extends Component
{
    public function render()
    {
        return view('livewire.app.formulir-sent', [
            'page_title' => 'Formulir Terkirim',
        ]);
    }
}
