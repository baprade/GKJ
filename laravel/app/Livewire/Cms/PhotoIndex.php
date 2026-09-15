<?php

namespace App\Livewire\Cms;

use App\Models\Photo;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.cms')]

class PhotoIndex extends Component
{
    use WithFileUploads;

    public $post_id = 0;

    public $id = 0;

    public $h1 = '';

    public $photo_file;

    public $photo_file_post;

    public function mount()
    {
        $product = Post::findOrFail($this->post_id);
        $this->post_id = $product->id;
        $this->h1 = $product->h1;
        $this->photo_file = $product->photo_file;
    }

    public function render()
    {
        return view('livewire.cms.photo-index', [
            'page_title' => 'Foto Galeri',
            'items' => Photo::where('id_post', $this->post_id)->get(),
        ]);
    }

    public function save()
    {
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
        $createPhoto = [
            'id_post' => $this->post_id,
            'photo_file' => $this->photo_file_post,
        ];
        Photo::create($createPhoto);
        $post_detail = Post::where('id', $this->post_id)->firstOrFail();
        $post_detail->increment('photos');

        // $this->reset();
        $this->photo_file_post = '';

        session()->flash('message', 'Foto BERHASIL ditambahkan.');
        session()->flash('theme', 'success');
    }

    public function deleteFoto($id)
    {
        $del_photo = Photo::findOrFail($id)->photo_file;
        $this->deleteFilesByNameWithoutExtension($del_photo);

        $deletePostphoto_file = Photo::findOrFail($id)->delete();
        $post_detail = Post::where('id', $this->post_id)->firstOrFail();
        $post_detail->decrement('photos');

        if ($deletePostphoto_file == true) {
            session()->flash('message', 'Foto BERHASIL dihapus.');
            session()->flash('theme', 'success');
        } elseif ($deletePostphoto_file == false) {
            session()->flash('message', 'Foto GAGAL dihapus.');
            session()->flash('theme', 'danger');
        }
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
