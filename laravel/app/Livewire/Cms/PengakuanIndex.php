<?php

namespace App\Livewire\Cms;

use App\Models\FormulirFormat;
use App\Models\Pengakuan;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class PengakuanIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $formulirformat = FormulirFormat::find(6);

        $items = Pengakuan::query()
            ->when(! empty($this->search), fn ($query) => $query->where(function ($query) {
                $query->where('nama', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat', 'like', '%'.$this->search.'%')
                    ->orWhere('kelompok', 'like', '%'.$this->search.'%')
                    ->orWhere('penjelasan', 'like', '%'.$this->search.'%')
                    ->orWhere('majelis_pembina_kelompok', 'like', '%'.$this->search.'%');
            }))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.pengakuan-index', [
            'page_title' => $formulirformat->title,
            'items' => $items,
            'awesome' => 'fa-solid fa-file-arrow-down',
        ]);
    }

    public function delete($id)
    {
        $deleteForm = Pengakuan::findOrFail($id)->delete();

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
