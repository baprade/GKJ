<?php

namespace App\Livewire\Forms\Cms;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Form;

class HomeSlideForm extends Form
{
    public ?Post $homeslide;

    public $id = 0;

    public $h1 = '';

    public $h2 = '';

    public $photo_file;

    public $photo_file_post;

    public $belly = '';

    public function setHomeSlide(Post $homeslide)
    {
        $this->homeslide = $homeslide;
        $this->id = $homeslide->id;
        $this->h1 = $homeslide->h1;
        $this->h2 = $homeslide->h2;
        $this->photo_file = $homeslide->photo_file;
        $this->belly = $homeslide->belly;
    }

    public function update()
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

            $uniqueFileName = $fileName.'_'.$hurufAcak.'.'.$extension;

            // simpan foto ori
            $this->photo_file_post->storeAs(path: 'homeslide/', name: $uniqueFileName);

            $this->photo_file_post = $uniqueFileName;

            $homeslide_photo = Post::findOrFail($this->id)->photo_file;
            if (Storage::exists('homeslide/'.$homeslide_photo)) {
                Storage::delete('homeslide/'.$homeslide_photo);
            }

        } else {
            $this->photo_file_post = Post::findOrFail($this->id)->photo_file;
        }

        $updatePost = [
            'h1' => $this->h1,
            'h2' => $this->h2,
            'photo_file' => $this->photo_file_post,
            'belly' => $this->belly,
        ];
        Post::findOrFail($this->id)->update($updatePost);

        $this->photo_file = $this->photo_file_post;

        $this->reset('photo_file_post');
    }

    public function store()
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

            $uniqueFileName = $fileName.'_'.$hurufAcak.'.'.$extension;

            $this->photo_file_post->storeAs(path: 'homeslide/', name: $uniqueFileName);

            $this->photo_file_post = $uniqueFileName;
        }

        $createPost = [
            'id_format' => 5,
            'h1' => $this->h1,
            'h2' => $this->h2,
            'photo_file' => $this->photo_file_post,
            'belly' => $this->belly,
        ];
        Post::create($createPost);

        // $this->reset();
    }
}
