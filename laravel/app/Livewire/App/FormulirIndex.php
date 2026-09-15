<?php

namespace App\Livewire\App;

use App\Models\Category;
use App\Models\FormulirFormat;
use Illuminate\Support\Str;
use Livewire\Component;

class FormulirIndex extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        if ($formcat = FormulirFormat::where('slug', $this->slug)->firstOrFail()) {
            return view('livewire.app.formulir-form-'.$formcat->id, [
                'formcat' => $formcat,
                'page_title' => $formcat->title,
            ]);
        }
    }

    public function send()
    {
        $this->validate();

        // Menentukan apakah ini untuk update atau create data baru
        $data = [
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
        ];

        // Jika category_id terisi dan lebih dari 0, lakukan update; jika tidak, buat data baru
        if ($this->category_id > 0) {
            Category::where('id', $this->category_id)->update($data);
            session()->flash('message', 'Kategori BERHASIL diedit.');
        } else {
            Category::create($data);
            session()->flash('message', 'Kategori BERHASIL ditambahkan.');
        }

        // session()->flash('message', $this->category_id ? 'Kategori BERHASIL diedit.' : 'Kategori BERHASIL ditambahkan.');

        $this->closeModal();
        $this->resetInputFields();
    }
}
