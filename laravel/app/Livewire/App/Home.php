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

        // Ensure recent Sunday service videos from @GKJWONOGIRI exist
        $latestSundayVideo = Post::where('id_format', 4)->where('youtube', 'rXjbIaxTL24')->first();
        if (! $latestSundayVideo) {
            $defaultVideos = [
                [
                    'id_format' => 4,
                    'id_category' => 2,
                    'h1' => 'GKJ Wonogiri - Ibadah Minggu - Minggu, 20 September 2026 (07.00)',
                    'slug' => 'gkj-wonogiri-ibadah-minggu-20-september-2026',
                    'h2' => 'Ibadah Minggu Pagi Gedung Induk GKJ Wonogiri',
                    'youtube' => 'rXjbIaxTL24',
                    'belly' => '<p>Ibadah Minggu Gedung Induk GKJ Wonogiri, 20 September 2026 pukul 07.00 WIB.</p>',
                    'onoff' => 1,
                    'created_at' => '2026-09-20 07:00:00',
                    'updated_at' => '2026-09-20 07:00:00',
                ],
                [
                    'id_format' => 4,
                    'id_category' => 2,
                    'h1' => 'GKJ Wonogiri - Ibadah Minggu - Minggu, 13 September 2026 (07.00)',
                    'slug' => 'gkj-wonogiri-ibadah-minggu-13-september-2026',
                    'h2' => 'Ibadah Minggu Pagi Gedung Induk GKJ Wonogiri',
                    'youtube' => 'nDn7WpnvuNo',
                    'belly' => '<p>Ibadah Minggu Gedung Induk GKJ Wonogiri, 13 September 2026 pukul 07.00 WIB.</p>',
                    'onoff' => 1,
                    'created_at' => '2026-09-13 07:00:00',
                    'updated_at' => '2026-09-13 07:00:00',
                ],
                [
                    'id_format' => 4,
                    'id_category' => 2,
                    'h1' => 'GKJ Wonogiri - Ibadah Minggu - Minggu, 6 September 2026 (16.30)',
                    'slug' => 'gkj-wonogiri-ibadah-minggu-sore-6-september-2026',
                    'h2' => 'Ibadah Minggu Sore Gedung Induk GKJ Wonogiri',
                    'youtube' => 'XnnhO2vvui0',
                    'belly' => '<p>Ibadah Minggu Sore Gedung Induk GKJ Wonogiri, 6 September 2026 pukul 16.30 WIB.</p>',
                    'onoff' => 1,
                    'created_at' => '2026-09-06 16:30:00',
                    'updated_at' => '2026-09-06 16:30:00',
                ],
                [
                    'id_format' => 4,
                    'id_category' => 2,
                    'h1' => 'GKJ Wonogiri - Ibadah Minggu - Minggu, 6 September 2026 (07.00)',
                    'slug' => 'gkj-wonogiri-ibadah-minggu-pagi-6-september-2026',
                    'h2' => 'Ibadah Minggu Pagi Gedung Induk GKJ Wonogiri',
                    'youtube' => 'dKyFCCew7V4',
                    'belly' => '<p>Ibadah Minggu Pagi Gedung Induk GKJ Wonogiri, 6 September 2026 pukul 07.00 WIB.</p>',
                    'onoff' => 1,
                    'created_at' => '2026-09-06 07:00:00',
                    'updated_at' => '2026-09-06 07:00:00',
                ],
            ];

            foreach ($defaultVideos as $v) {
                Post::firstOrCreate(['youtube' => $v['youtube']], $v);
            }
        }

        $videos = Post::where('id_format', 4)
            ->whereNotNull('youtube')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

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
