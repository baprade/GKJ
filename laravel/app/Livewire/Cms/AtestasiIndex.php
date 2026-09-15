<?php

namespace App\Livewire\Cms;

use App\Models\Atestasi;
use App\Models\FormulirFormat;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class AtestasiIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $formulirformat = FormulirFormat::find(5);

        $items = Atestasi::query()
            ->when(! empty($this->search), fn ($query) => $query->where(function ($query) {
                $query->where('nama_lengkap', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_lahir', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat', 'like', '%'.$this->search.'%')
                    ->orWhere('pekerjaan', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_baptis', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_sidi', 'like', '%'.$this->search.'%')
                    ->orWhere('kelompok', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_gereja_baru', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat_gereja_baru', 'like', '%'.$this->search.'%')
                    ->orWhere('alasan_pindah', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat_baru', 'like', '%'.$this->search.'%')
                    ->orWhere('pengikut', 'like', '%'.$this->search.'%')
                    ->orWhere('majelis_pembina_kelompok', 'like', '%'.$this->search.'%');
            }))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.atestasi-index', [
            'page_title' => $formulirformat->title,
            'items' => $items,
            'awesome' => 'fa-solid fa-file-arrow-down',
        ]);
    }

    public function delete($id)
    {
        $deleteForm = Atestasi::findOrFail($id)->delete();

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
