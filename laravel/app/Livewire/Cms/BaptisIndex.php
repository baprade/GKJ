<?php

namespace App\Livewire\Cms;

use App\Models\Baptis;
use App\Models\FormulirFormat;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class BaptisIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $formulirformat = FormulirFormat::find(8);

        $items = Baptis::query()
            ->when(! empty($this->search), fn ($query) => $query->where(function ($query) {
                $query->where('nama_1', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_kelompok_1', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_gereja_1', 'like', '%'.$this->search.'%')
                    ->orWhere('nomor_induk_1', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat_1', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_2', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_kelompok_2', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_gereja_2', 'like', '%'.$this->search.'%')
                    ->orWhere('nomor_induk_2', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat_2', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_anak', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_lahir', 'like', '%'.$this->search.'%')
                    ->orWhere('akta_lahir', 'like', '%'.$this->search.'%')
                    ->orWhere('ketua_kelompok', 'like', '%'.$this->search.'%');
            }))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.baptis-index', [
            'page_title' => $formulirformat->title,
            'items' => $items,
            'awesome' => 'fa-solid fa-file-arrow-down',
        ]);
    }

    public function delete($id)
    {
        $deleteForm = Baptis::findOrFail($id)->delete();

        if ($deleteForm == true) {
            session()->flash('message', 'Formulir BERHASIL dihapus.');
            session()->flash('theme', 'success');
        } elseif ($deleteForm == false) {
            session()->flash('message', 'Formulir GAGAL dihapus.');
            session()->flash('theme', 'danger');
        }

        // $this->redirectRoute('cms-post');
    }
}
