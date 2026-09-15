<?php

namespace App\Livewire\App;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Tag extends Component
{
    use WithPagination;

    public $slug = '';

    public function render()
    {
        $this->slug = str_replace('-', ' ', trim($this->slug));

        $items = empty($this->slug)
            ? Post::whereIn('id_format', [2, 3, 4])
                ->where('created_at', '<', now())
                ->where('onoff', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(10)
            : Post::where(function ($query) {
                    $query->where('eyebrow', 'like', '%' . $this->slug . '%')
                        ->orWhere('h1', 'like', '%' . $this->slug . '%')
                        ->orWhere('h2', 'like', '%' . $this->slug . '%')
                        ->orWhere('belly', 'like', '%' . $this->slug . '%')
                        ->orWhere('key_word', 'like', '%' . $this->slug . '%')
                        ->orWhere('key_slug', 'like', '%' . $this->slug . '%');
                })
                ->whereIn('id_format', [2, 3, 4])
                ->where('created_at', '<', now())
                ->where('onoff', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(10);


        return view('livewire.app.tags', [
            'items' => $items,
            'tags' => $this->slug,
            'page_title' => 'Tagar',
        ]);
    }
}
