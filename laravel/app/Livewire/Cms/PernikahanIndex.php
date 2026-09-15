<?php

namespace App\Livewire\Cms;

use App\Models\FormulirFormat;
use App\Models\Pernikahan;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class PernikahanIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $formulirformat = FormulirFormat::find(7);

        $items = Pernikahan::query()
            ->when(! empty($this->search), fn ($query) => $query->where(function ($query) {
                $query->where('nama_casu', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_lahir_casu', 'like', '%'.$this->search.'%')
                    ->orWhere('agama_casu', 'like', '%'.$this->search.'%')
                    ->orWhere('pekerjaan_casu', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat_rumah_casu', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_gereja_casu', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_kelompok_casu', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_cais', 'like', '%'.$this->search.'%')
                    ->orWhere('agama_cais', 'like', '%'.$this->search.'%')
                    ->orWhere('pekerjaan_cais', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat_rumah_cais', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_gereja_cais', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_kelompok_cais', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_nikah', 'like', '%'.$this->search.'%')
                    ->orWhere('ortu_casu', 'like', '%'.$this->search.'%')
                    ->orWhere('ortu_cais', 'like', '%'.$this->search.'%');
            }))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.pernikahan-index', [
            'page_title' => $formulirformat->title,
            'items' => $items,
            'awesome' => 'fa-solid fa-file-arrow-down',
        ]);
    }

    public function delete($id)
    {
        $deleteForm = Pernikahan::findOrFail($id)->delete();

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
