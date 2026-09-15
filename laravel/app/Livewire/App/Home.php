<?php

namespace App\Livewire\App;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $homeslide = Post::where('id_format', 5)->get();

        $photos = Post::where('id_format', 3)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get();

        $videos = Post::where('id_format', 4)
            ->whereNotNull('youtube')
            ->orderBy('created_at', 'desc')
            ->first();

        $news = Post::where('id_format', 2)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('livewire.app.home', [
            'homeslide' => $homeslide,
            'photos' => $photos,
            'videos' => $videos,
            'news' => $news,
        ]);
    }
}
