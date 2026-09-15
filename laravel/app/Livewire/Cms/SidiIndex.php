<?php

namespace App\Livewire\Cms;

use App\Models\FormulirFormat;
use App\Models\Sidi;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class SidiIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $formulirformat = FormulirFormat::find(9);

        $items = Sidi::query()
            ->when(! empty($this->search), fn ($query) => $query->where(function ($query) {
                $query->where('nama_lengkap', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_lahir', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_baptis', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_pendeta_baptis', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_nikah', 'like', '%'.$this->search.'%')
                    ->orWhere('menikah_secara', 'like', '%'.$this->search.'%')
                    ->orWhere('pendidikan', 'like', '%'.$this->search.'%')
                    ->orWhere('pekerjaan', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat_pekerjaan', 'like', '%'.$this->search.'%')
                    ->orWhere('keterangan_lain', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_ayah', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_gereja_ayah', 'like', '%'.$this->search.'%')
                    ->orWhere('nomor_induk_ayah', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_ibu', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_gereja_ibu', 'like', '%'.$this->search.'%')
                    ->orWhere('nomor_induk_ibu', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat_ayah_ibu', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_tunangan', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_gereja_tunangan', 'like', '%'.$this->search.'%')
                    ->orWhere('nomor_induk_tunangan', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat_tunangan', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_tunangan', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_pasangan', 'like', '%'.$this->search.'%')
                    ->orWhere('anggota_gereja_pasangan', 'like', '%'.$this->search.'%')
                    ->orWhere('keterangan', 'like', '%'.$this->search.'%')
                    ->orWhere('pengajar_katekasi', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_katekasi', 'like', '%'.$this->search.'%')
                    ->orWhere('jam_kebaktian', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_gereja', 'like', '%'.$this->search.'%')
                    ->orWhere('lapor_kelompok', 'like', '%'.$this->search.'%')
                    ->orWhere('ketua_kelompok', 'like', '%'.$this->search.'%');
            }))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.sidi-index', [
            'page_title' => $formulirformat->title,
            'items' => $items,
            'awesome' => 'fa-solid fa-file-arrow-down',
        ]);
    }

    public function delete($id)
    {
        $deleteForm = Sidi::findOrFail($id)->delete();

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
