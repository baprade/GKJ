<?php

namespace App\Livewire\Cms;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.cms')]

class UserIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        $deleteUser = User::findOrFail($id)->delete();

        if ($deleteUser == true) {
            session()->flash('message', 'User BERHASIL dihapus.');
            session()->flash('theme', 'success');
        } elseif ($deleteUser == false) {
            session()->flash('message', 'User GAGAL dihapus.');
            session()->flash('theme', 'danger');
        }

        // $this->redirectRoute('cms-users');
    }

    public function render()
    {
        $users = User::query()
            ->when(! empty($this->search), function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('nickname', 'like', '%'.$this->search.'%')
                        ->orWhere('email', 'like', '%'.$this->search.'%');
                });
            })
            ->where('id', '!=', Auth()->user()->id)
            ->where('id', '!=', 1)
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.cms.user-index', [
            'page_title' => 'Users',
            'items' => $users,
            'href_create' => 'cms-users-create',
            'href_edit' => 'cms-users-edit',
            'awesome' => 'fa-solid fa-user-group',
        ]);
    }

    public function clearInputSearch()
    {
        $this->search = '';
    }
}
