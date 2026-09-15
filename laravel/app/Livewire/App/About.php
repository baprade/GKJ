<?php

namespace App\Livewire\App;

use App\Models\Post;
use Livewire\Component;

class About extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        if ($item = Post::where('slug', $this->slug)->where('id_format', 1)->where('created_at', '<', now())->where('onoff', 1)->firstOrFail()) {
            $item->increment('views');

            return view('livewire.app.post-detail-about', [
                'item' => $item,
            ]);
        }
    }
}
