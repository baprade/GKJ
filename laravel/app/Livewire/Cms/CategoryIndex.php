<?php

namespace App\Livewire\Cms;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('components.layouts.cms')]

class CategoryIndex extends Component
{
    #[Rule('required', message: 'Silakan isi Kategori.')]
    public $title = '';

    public $description = '';

    public $category_id = 0;

    public $isModalOpen = false;

    public function render()
    {
        $items = Category::get();

        return view('livewire.cms.categories-index', [
            'items' => $items,
            'page_title' => 'Kategori',

            'href_create' => 'cms-categories-create',
            'href_edit' => 'cms-categories-edit',
            'awesome' => 'fa-solid fa-sliders',
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
        $this->category_id = 0;
        $this->title = '';
        $this->description = '';
    }

    public function store()
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
            session()->flash('theme', 'success');
        } else {
            Category::create($data);
            session()->flash('message', 'Kategori BERHASIL ditambahkan.');
            session()->flash('theme', 'success');
        }

        // session()->flash('message', $this->category_id ? 'Kategori BERHASIL diedit.' : 'Kategori BERHASIL ditambahkan.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->title = $category->title;
        $this->description = $category->description;

        $this->openModal();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Kategori BERHASIL Dihapus.');
        session()->flash('theme', 'success');
    }
}
