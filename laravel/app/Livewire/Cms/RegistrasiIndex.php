<?php

namespace App\Livewire\Cms;

use App\Models\FormulirFormat;
use App\Models\Registrasi;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class RegistrasiIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $formulirformat = FormulirFormat::find(1);

        $items = Registrasi::query()
            ->when(! empty($this->search), fn ($query) => $query->where(function ($query) {
                $query->where('nama', 'like', '%'.$this->search.'%')
                    ->orWhere('kelompok', 'like', '%'.$this->search.'%')
                    ->orWhere('tempat_lahir', 'like', '%'.$this->search.'%')
                    ->orWhere('pekerjaan', 'like', '%'.$this->search.'%')
                    ->orWhere('alamat', 'like', '%'.$this->search.'%');
            }))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.registrasi-index', [
            'page_title' => $formulirformat->title,
            'items' => $items,
            'awesome' => 'fa-solid fa-file-arrow-down',
        ]);
    }

    public function delete($id)
    {
        $deleteForm = Registrasi::findOrFail($id)->delete();

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
