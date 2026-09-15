<?php

namespace App\Livewire\App;

use App\Models\Post;
use Livewire\Component;

class GaleriIndex extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        if ($this->slug === 'foto') {
            return view('livewire.app.post-index', [
                'items' => Post::where('id_format', 3)
                    ->where('created_at', '<', now())
                    ->where('onoff', 1)
                    ->orderBy('created_at', 'desc')
                    ->paginate(6),
                'page_title' => 'Galeri Foto',
            ]);
        } elseif ($this->slug === 'video') {
            return view('livewire.app.post-index', [
                'items' => Post::where('id_format', 4)
                    ->where('created_at', '<', now())
                    ->where('onoff', 1)
                    ->orderBy('created_at', 'desc')
                    ->paginate(6),
                'page_title' => 'Galeri Video',
            ]);
        }

        abort(404);
    }
}
