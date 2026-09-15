<?php

namespace App\Livewire\App;

use App\Models\Photo;
use App\Models\Post;
use Livewire\Component;

class PostDetail extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $item = Post::where('id', $this->id)->where('created_at', '<', now())->where('onoff', 1)->firstOrFail();
        $item->increment('views');

        return view('livewire.app.post-detail', [
            'item' => $item,
            'photos' => Photo::where('id_post', $this->id)->get(),
        ]);
    }
}
