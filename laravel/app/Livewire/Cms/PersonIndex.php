<?php

namespace App\Livewire\Cms;

use App\Models\Person;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class PersonIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        $deletePerson = Person::findOrFail($id)->delete();

        if ($deletePerson == true) {
            session()->flash('message', 'Jemaat BERHASIL dihapus.');
            session()->flash('theme', 'success');
        } elseif ($deletePerson == false) {
            session()->flash('message', 'Jemaat GAGAL dihapus.');
            session()->flash('theme', 'danger');
        }

        // $this->redirectRoute('cms-people');
    }

    public function render()
    {
        $people = Person::query()
            ->when(! empty($this->search), function ($query) {
                $query->where(function ($query) {
                    $query->where('nikah_by', 'like', '%'.$this->search.'%')
                        ->orWhere('parrent', 'like', '%'.$this->search.'%')
                        ->orWhere('spouse', 'like', '%'.$this->search.'%')
                        ->orWhere('nia', 'like', '%'.$this->search.'%')
                        ->orWhere('from', 'like', '%'.$this->search.'%')
                        ->orWhere('to', 'like', '%'.$this->search.'%')
                        ->orWhere('note', 'like', '%'.$this->search.'%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.person-index', [
            'page_title' => 'Jemaat',
            'items' => $people,
            'href_create' => 'cms-people-create',
            'href_edit' => 'cms-people-edit',
            'awesome' => 'fa-solid fa-users',
        ]);
    }

    public function clearInputSearch()
    {
        $this->search = '';
    }
}
