<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('id_format')->default(2);
            $table->integer('id_category')->default(0);
            $table->text('h1')->nullable();
            $table->text('slug')->nullable();
            $table->text('h2')->nullable();
            $table->text('photo_file')->nullable();
            $table->text('photo_grafer')->nullable();
            $table->text('photo_caption')->nullable();
            $table->text('youtube')->nullable();
            $table->text('belly')->nullable();
            $table->text('key_word')->nullable();
            $table->text('key_slug')->nullable();
            $table->integer('views')->default(0);
            $table->integer('comments')->default(0);
            $table->integer('photos')->default(0);
            $table->integer('slide')->default(0);
            $table->integer('onoff')->default(1);
            $table->timestamps();
        });

        Post::create([
            'id_format' => 1,
            'h1' => 'Visi Misi',
            'slug' => 'visi-misi',
        ]);

        Post::create([
            'id_format' => 1,
            'h1' => 'Sejarah',
            'slug' => 'sejarah',
        ]);

        Post::create([
            'id_format' => 1,
            'h1' => 'Pepanthan',
            'slug' => 'pepanthan',
        ]);

        Post::create([
            'id_format' => 1,
            'h1' => 'Majelis',
            'slug' => 'majelis',
        ]);

        Post::create([
            'id_format' => 1,
            'h1' => 'Jemaat',
            'slug' => 'jemaat',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
