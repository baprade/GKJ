<?php

namespace App\Livewire\Cms;

use App\Livewire\Forms\Cms\PersonForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.cms')]

class PersonCreate extends Component
{
    public PersonForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('message', 'Jemaat BERHASIL disimpan.');
        session()->flash('theme', 'success');

        $this->redirectRoute('cms-people');
    }

    public function render()
    {
        return view('livewire.cms.person-form', [
            'page_title' => 'Tambah Jemaat',
        ]);
    }
}
