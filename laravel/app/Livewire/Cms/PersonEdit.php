<?php

namespace App\Livewire\Cms;

use App\Livewire\Forms\Cms\PersonForm;
use App\Models\Person;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.cms')]

class PersonEdit extends Component
{
    public PersonForm $form;

    public $id = 0;

    public function mount()
    {
        $this->form->setPerson(Person::findOrFail($this->id));
    }

    public function save()
    {
        $this->form->update();

        session()->flash('message', 'Jemaat BERHASIL disimpan.');
        session()->flash('theme', 'success');

        $this->redirectRoute('cms-people-edit', ['id' => $this->id]);
    }

    public function render()
    {
        return view('livewire.cms.person-form', [
            'page_title' => 'Edit Jemaat',
        ]);
    }
}
