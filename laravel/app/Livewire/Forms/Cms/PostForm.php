<?php

namespace App\Livewire\Forms\Cms;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $post;

    public $id = 0;

    #[Rule('not_in:0', message: 'Silakan pilih Format.')]
    public $id_format = 0;

    public $id_category = 0;

    #[Rule('required', message: 'Silakan isi Judul.')]
    public $h1 = '';

    public $slug = '';

    public $h2 = '';

    public $photo_file;

    public $photo_file_post;

    public $photo_grafer = '';

    public $photo_caption = '';

    public $youtube = '';

    public $belly = '';

    public $key_word = '';

    public $key_slug = '';

    public $onoff = 0;

    public $created_at;

    public $image;

    public $photos = 0;

    public function setPost(Post $post)
    {
        $this->post = $post;
        $this->id = $post->id;
        $this->id_format = $post->id_format;
        $this->id_category = $post->id_category;
        $this->h1 = $post->h1;
        $this->slug = $post->slug;
        $this->h2 = $post->h2;
        $this->photo_file = $post->photo_file;
        $this->photo_grafer = $post->photo_grafer;
        $this->photo_caption = $post->photo_caption;
        $this->youtube = $post->youtube;
        $this->belly = $post->belly;
        $this->key_word = $post->key_word;
        $this->photos = $post->photos;
        $this->onoff = $post->onoff;
        $this->created_at = $post->created_at;
    }

    public function update()
    {
        $this->validate();

        if ($this->photo_file_post && $this->photo_file_post->isValid()) {

            $rules = [
                'photo_file_post' => 'image',
                // |max:2100
            ];
            $message = [
                'photo_file_post.image' => 'Unggahlah File Image',
                // 'photo_file_post.max' => 'Ukuran file photo terlalu besar.',
            ];
            $this->validate($rules, $message);

            $photo_file_post = $this->photo_file_post;
            $originalName = $photo_file_post->getClientOriginalName();
            $extension = $photo_file_post->getClientOriginalExtension();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $fileName = str_replace(' ', '_', $fileName);
            $hurufAcak = rand(111, 999);

            // Bikin nama file unik
            $uniqueFileName = $fileName.'_'.$hurufAcak.'.'.$extension;

            // Simpan gambar asli
            $originalPath = $this->photo_file_post->storeAs(path: 'original', name: $uniqueFileName);
            $imagePath = storage_path("app/private/{$originalPath}");

            // Resize gambar dengan lebar 1280 px (menjaga aspect ratio)
            $resizedPath = storage_path('app/private/original/'.pathinfo($originalPath, PATHINFO_FILENAME).'_resized.jpg');
            $this->resizeImage($imagePath, $resizedPath, 1280);
            // Konversi gambar ke WebP
            $webpPath = storage_path('app/private/large/'.pathinfo($originalPath, PATHINFO_FILENAME).'.webp');
            $this->convertToWebP($resizedPath, $webpPath);
            // Hapus file hasil resize setelah konversi
            unlink($resizedPath);

            // Resize gambar dengan lebar 500 px (menjaga aspect ratio)
            $resizedPath = storage_path('app/private/original/'.pathinfo($originalPath, PATHINFO_FILENAME).'_resized.jpg');
            $this->resizeImage($imagePath, $resizedPath, 500);
            // Konversi gambar ke WebP
            $webpPath = storage_path('app/private/medium/'.pathinfo($originalPath, PATHINFO_FILENAME).'.webp');
            $this->convertToWebP($resizedPath, $webpPath);
            // Hapus file hasil resize setelah konversi
            unlink($resizedPath);

            // Resize gambar dengan lebar 150 px (menjaga aspect ratio)
            $resizedPath = storage_path('app/private/original/'.pathinfo($originalPath, PATHINFO_FILENAME).'_resized.jpg');
            $this->resizeImage($imagePath, $resizedPath, 150);
            // Konversi gambar ke WebP
            $webpPath = storage_path('app/private/small/'.pathinfo($originalPath, PATHINFO_FILENAME).'.webp');
            $this->convertToWebP($resizedPath, $webpPath);
            // Hapus file hasil resize setelah konversi
            unlink($resizedPath);

            $this->photo_file_post = pathinfo($webpPath, PATHINFO_BASENAME);

            $del_photo = Post::findOrFail($this->id)->photo_file;

            $this->deleteFilesByNameWithoutExtension($del_photo);
        } else {
            $this->photo_file_post = Post::findOrFail($this->id)->photo_file;
        }

        $key_word = $this->key_word;
        $key_slug = strtolower($key_word);

        $updatePost = [
            'id_format' => $this->id_format,
            'id_category' => $this->id_category,
            'h1' => $this->h1,
            'slug' => Str::slug($this->h1),
            'h2' => $this->h2,
            'photo_file' => $this->photo_file_post,
            'photo_grafer' => $this->photo_grafer,
            'photo_caption' => $this->photo_caption,
            'youtube' => $this->youtube,
            'belly' => $this->belly,
            'key_word' => $this->key_word,
            'key_slug' => $key_slug,
            'onoff' => $this->onoff,
            'created_at' => $this->created_at,
        ];
        Post::findOrFail($this->id)->update($updatePost);

        $this->slug = Str::slug($this->h1);

        $this->photo_file = $this->photo_file_post;

        $this->reset('photo_file_post');
    }

    public function store()
    {
        $this->validate();

        if ($this->photo_file_post && $this->photo_file_post->isValid()) {

            $rules = [
                'photo_file_post' => 'image',
                // |max:2100
            ];
            $message = [
                'photo_file_post.image' => 'Unggahlah File Image',
                // 'photo_file_post.max' => 'Ukuran file photo terlalu besar.',
            ];
            $this->validate($rules, $message);

            $photo_file_post = $this->photo_file_post;
            $originalName = $photo_file_post->getClientOriginalName();
            $extension = $photo_file_post->getClientOriginalExtension();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $fileName = str_replace(' ', '_', $fileName);
            $hurufAcak = rand(111, 999);

            // Bikin nama file unik
            $uniqueFileName = $fileName.'_'.$hurufAcak.'.'.$extension;

            // Simpan gambar asli
            $originalPath = $this->photo_file_post->storeAs(path: 'original', name: $uniqueFileName);
            $imagePath = storage_path("app/private/{$originalPath}");

            // Resize gambar dengan lebar 1280 px (menjaga aspect ratio)
            $resizedPath = storage_path('app/private/original/'.pathinfo($originalPath, PATHINFO_FILENAME).'_resized.jpg');
            $this->resizeImage($imagePath, $resizedPath, 1280);
            // Konversi gambar ke WebP
            $webpPath = storage_path('app/private/large/'.pathinfo($originalPath, PATHINFO_FILENAME).'.webp');
            $this->convertToWebP($resizedPath, $webpPath);
            // Hapus file hasil resize setelah konversi
            unlink($resizedPath);

            // Resize gambar dengan lebar 500 px (menjaga aspect ratio)
            $resizedPath = storage_path('app/private/original/'.pathinfo($originalPath, PATHINFO_FILENAME).'_resized.jpg');
            $this->resizeImage($imagePath, $resizedPath, 500);
            // Konversi gambar ke WebP
            $webpPath = storage_path('app/private/medium/'.pathinfo($originalPath, PATHINFO_FILENAME).'.webp');
            $this->convertToWebP($resizedPath, $webpPath);
            // Hapus file hasil resize setelah konversi
            unlink($resizedPath);

            // Resize gambar dengan lebar 150 px (menjaga aspect ratio)
            $resizedPath = storage_path('app/private/original/'.pathinfo($originalPath, PATHINFO_FILENAME).'_resized.jpg');
            $this->resizeImage($imagePath, $resizedPath, 150);
            // Konversi gambar ke WebP
            $webpPath = storage_path('app/private/small/'.pathinfo($originalPath, PATHINFO_FILENAME).'.webp');
            $this->convertToWebP($resizedPath, $webpPath);
            // Hapus file hasil resize setelah konversi
            unlink($resizedPath);

            $this->photo_file_post = pathinfo($webpPath, PATHINFO_BASENAME);
        }

        $key_word = $this->key_word;
        $key_slug = strtolower($key_word);

        $createPost = [
            'id_format' => $this->id_format,
            'id_category' => $this->id_category,
            'h1' => $this->h1,
            'slug' => Str::slug($this->h1),
            'h2' => $this->h2,
            'photo_file' => $this->photo_file_post,
            'photo_grafer' => $this->photo_grafer,
            'photo_caption' => $this->photo_caption,
            'youtube' => $this->youtube,
            'belly' => $this->belly,
            'key_word' => $this->key_word,
            'key_slug' => $key_slug,
            'onoff' => $this->onoff,
        ];
        Post::create($createPost);

        // $this->reset();
    }

    public function resizeImage($imagePath, $resizedPath, $width)
    {
        // Memuat gambar menggunakan fungsi yang baru dibuat
        $image = $this->loadImageByType($imagePath);

        // Periksa jika gambar berhasil dimuat
        if (! $image) {
            return; // Jika gambar tidak dapat dimuat, keluar dari fungsi
        }

        // Dapatkan informasi ukuran gambar
        [$originalWidth, $originalHeight] = getimagesize($imagePath);

        // Hitung tinggi baru berdasarkan lebar baru (menjaga aspect ratio)
        $height = ($width / $originalWidth) * $originalHeight;

        // Membuat gambar baru dengan dimensi yang telah dihitung
        $resizedImage = imagecreatetruecolor($width, $height);

        // Menyampurkan gambar asli dengan gambar yang baru (resize)
        imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

        // Simpan gambar yang sudah diresize
        imagejpeg($resizedImage, $resizedPath, 100); // Kualitas 90%

        // Hapus gambar dari memori setelah selesai
        imagedestroy($image);
        imagedestroy($resizedImage);
    }

    public function convertToWebP($imagePath, $webpPath)
    {
        // Memuat gambar asli
        $image = imagecreatefromjpeg($imagePath); // Gunakan imagecreatefrompng() untuk PNG

        // Simpan gambar dalam format WebP
        imagewebp($image, $webpPath, 80); // Kualitas 80%

        // Hapus gambar dari memori setelah selesai
        imagedestroy($image);
    }

    public function loadImageByType($imagePath)
    {
        // Mendapatkan informasi gambar untuk menentukan tipe gambar
        $imageInfo = getimagesize($imagePath);
        $imageType = $imageInfo[2];

        // Memilih fungsi pemuatan gambar berdasarkan tipe
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                return imagecreatefromjpeg($imagePath);
            case IMAGETYPE_PNG:
                return imagecreatefrompng($imagePath);
            case IMAGETYPE_GIF:
                return imagecreatefromgif($imagePath);
            case IMAGETYPE_WEBP:
                return imagecreatefromwebp($imagePath);
            case IMAGETYPE_AVIF:
                return imagecreatefromavif($imagePath);
            case IMAGETYPE_BMP:
                return imagecreatefrombmp($imagePath);
            default:
                session()->flash('message', 'Format gambar tidak didukung.');

                return null;
        }
    }

    // Fungsi untuk menghapus file berdasarkan nama tanpa ekstensi di folder 'original' dan 'webp'
    public function deleteFilesByNameWithoutExtension($fileName)
    {
        // Ambil nama file tanpa ekstensi
        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);

        // Daftar ekstensi yang ingin dicari di folder 'original'
        $extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif', 'bmp'];

        // Loop untuk mencoba setiap ekstensi di folder 'original'
        foreach ($extensions as $ext) {
            $filePath = 'original/'.$fileNameWithoutExtension.'.'.$ext;

            if (Storage::exists($filePath)) {
                Storage::delete($filePath); // Hapus file jika ditemukan
                break; // Keluar dari loop setelah file ditemukan dan dihapus
            }
        }

        // Cek dan hapus file di folder 'webp' dengan ekstensi .webp
        $webpFileLarge = 'large/'.$fileNameWithoutExtension.'.webp';
        if (Storage::exists($webpFileLarge)) {
            Storage::delete($webpFileLarge);
        }
        $webpFileMedium = 'medium/'.$fileNameWithoutExtension.'.webp';
        if (Storage::exists($webpFileMedium)) {
            Storage::delete($webpFileMedium);
        }
        $webpFileSmall = 'small/'.$fileNameWithoutExtension.'.webp';
        if (Storage::exists($webpFileSmall)) {
            Storage::delete($webpFileSmall);
        }
    }
}
