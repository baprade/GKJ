<?php

namespace App\Livewire\Cms;

use App\Models\FormulirFormat;
use App\Models\Kelahiran;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class KelahiranIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $formulirformat = FormulirFormat::find(2);

        $items = Kelahiran::query()
            ->when(! empty($this->search), fn ($query) => $query->where(function ($query) {
                $query->where('nama_suami', 'like', '%'.$this->search.'%')
                    ->orWhere('nik_suami', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_istri', 'like', '%'.$this->search.'%')
                    ->orWhere('nik_istri', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat', 'like', '%'.$this->search.'%')
                    ->orWhere('kelompok', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_anak', 'like', '%'.$this->search.'%')
                    ->orWhere('keterangan_lain', 'like', '%'.$this->search.'%')
                    ->orWhere('pemohon', 'like', '%'.$this->search.'%')
                    ->orWhere('ketua_kelompok', 'like', '%'.$this->search.'%');
            }))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.kelahiran-index', [
            'page_title' => $formulirformat->title,
            'items' => $items,
            'awesome' => 'fa-solid fa-file-arrow-down',
        ]);
    }

    public function delete($id)
    {
        $deleteForm = Kelahiran::findOrFail($id)->delete();

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
