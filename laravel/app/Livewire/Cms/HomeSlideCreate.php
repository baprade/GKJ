<?php

namespace App\Livewire\Cms;

use App\Livewire\Forms\Cms\HomeSlideForm;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.cms')]

class HomeSlideCreate extends Component
{
    use WithFileUploads;

    public HomeSlideForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('message', 'HomeSlide BERHASIL disimpan.');
        session()->flash('theme', 'success');

        $this->redirectRoute('cms-homeslide');
    }

    public function render()
    {
        return view('livewire.cms.homeslide-form', [
            'page_title' => 'Tambah HomeSlide',
        ]);
    }
}
