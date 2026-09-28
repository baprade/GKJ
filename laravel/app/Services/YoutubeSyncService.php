<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class YoutubeSyncService
{
    /**
     * Channel ID resmi @GKJWONOGIRI
     */
    const CHANNEL_ID = 'UCWhrbuUjdR09a5Q6sSr_xDQ';

    /**
     * Sinkronisasi video terbaru dari RSS Feed YouTube @GKJWONOGIRI.
     * Menggunakan cache 30 menit agar halaman tetap instan tanpa throttling / kuota API.
     */
    public static function syncLatestVideos(int $limit = 6): void
    {
        // Jalankan fetch maksimal sekali tiap 30 menit
        Cache::remember('gkj_youtube_rss_sync', 1800, function () use ($limit) {
            try {
                $rssUrl = 'https://www.youtube.com/feeds/videos.xml?channel_id=' . self::CHANNEL_ID;

                $ctx = stream_context_create([
                    'http' => [
                        'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                        'timeout' => 4,
                    ],
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ]
                ]);

                $xmlString = @file_get_contents($rssUrl, false, $ctx);
                if (! $xmlString) {
                    return false;
                }

                $xml = @simplexml_load_string($xmlString);
                if (! $xml || empty($xml->entry)) {
                    return false;
                }

                $xml->registerXPathNamespace('yt', 'http://www.youtube.com/xml/schemas/2015');
                $xml->registerXPathNamespace('media', 'http://search.yahoo.com/mrss/');

                $count = 0;
                foreach ($xml->entry as $entry) {
                    if ($count >= $limit) {
                        break;
                    }

                    $ytId = (string)$entry->children('http://www.youtube.com/xml/schemas/2015')->videoId;
                    $title = trim((string)$entry->title);
                    $published = (string)$entry->published;
                    $media = $entry->children('http://search.yahoo.com/mrss/')->group;
                    $description = (string)($media->description ?? '');

                    if (empty($ytId) || empty($title)) {
                        continue;
                    }

                    $createdAt = date('Y-m-d H:i:s', strtotime($published));
                    $slug = Str::slug($title);

                    // Simpan ke database jika belum ada
                    Post::firstOrCreate(
                        ['youtube' => $ytId],
                        [
                            'id_format' => 4, // Format Galeri Video
                            'id_category' => 2,
                            'h1' => $title,
                            'slug' => $slug ?: 'video-' . $ytId,
                            'h2' => Str::limit(strip_tags($description), 150),
                            'belly' => '<p>' . nl2br(e($description ?: $title)) . '</p>',
                            'onoff' => 1,
                            'created_at' => $createdAt,
                            'updated_at' => $createdAt,
                        ]
                    );

                    $count++;
                }

                return true;
            } catch (\Throwable $e) {
                Log::warning('YouTube RSS Sync warning: ' . $e->getMessage());
                return false;
            }
        });
    }
}
