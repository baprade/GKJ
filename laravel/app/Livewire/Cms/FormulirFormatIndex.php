<?php

namespace App\Livewire\Cms;

use App\Models\FormulirFormat;
// use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('components.layouts.cms')]

class FormulirFormatIndex extends Component
{
    #[Rule('required', message: 'Silakan isi Format Form.')]
    public $title = '';

    #[Rule('required', message: 'Silakan isi Slug Format Form.')]
    public $slug = '';

    public $description = '';

    public $formformat_id = 0;

    public $isModalOpen = false;

    public function render()
    {
        $items = FormulirFormat::get();

        return view('livewire.cms.formformats-index', [
            'items' => $items,
            'page_title' => 'Format Form',

            'href_create' => 'cms-formformats-create',
            'href_edit' => 'cms-formformats-edit',
            'awesome' => 'fa-solid fa-folder-closed',
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetValidation();
    }

    private function resetInputFields()
    {
        $this->formformat_id = 0;
        $this->title = '';
        $this->slug = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate();

        // Menentukan apakah ini untuk update atau create data baru
        $data = [
            'title' => $this->title,
            // 'slug' => Str::slug($this->title),
            'slug' => $this->slug,
            'description' => $this->description,
        ];

        // Jika formformat_id terisi dan lebih dari 0, lakukan update; jika tidak, buat data baru
        if ($this->formformat_id > 0) {
            FormulirFormat::where('id', $this->formformat_id)->update($data);
            session()->flash('message', 'Format Form BERHASIL diedit.');
            session()->flash('theme', 'success');
        } else {
            FormulirFormat::create($data);
            session()->flash('message', 'Format Form BERHASIL ditambahkan.');
            session()->flash('theme', 'success');
        }

        // session()->flash('message', $this->formformat_id ? 'Format Form BERHASIL diedit.' : 'Format Form BERHASIL ditambahkan.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $formformat = FormulirFormat::findOrFail($id);
        $this->formformat_id = $formformat->id;
        $this->title = $formformat->title;
        $this->slug = $formformat->slug;
        $this->description = $formformat->description;

        $this->openModal();
    }

    public function delete($id)
    {
        FormulirFormat::find($id)->delete();
        session()->flash('message', 'Format Form BERHASIL Dihapus.');
        session()->flash('theme', 'success');

    }
}
