<?php

namespace App\Livewire\App;

use App\Models\Post;
use Livewire\Component;

class BeritaIndex extends Component
{
    public function render()
    {
        return view('livewire.app.post-index', [
            'items' => Post::where('id_format', 2)
                ->where('created_at', '<', now())
                ->where('onoff', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(6),
            'page_title' => 'Berita',
        ]);
    }
}
