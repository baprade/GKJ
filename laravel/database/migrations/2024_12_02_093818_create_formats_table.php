<?php

use App\Models\Format;
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
        Schema::create('formats', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('description')->nullable();
            $table->integer('onoff')->default(0);
            $table->timestamps();
        });

        Format::create([
            'title' => 'Tentang',
            'slug' => 'tentang',
        ]);

        Format::create([
            'title' => 'Berita',
            'slug' => 'berita',
        ]);

        Format::create([
            'title' => 'Galeri Foto',
            'slug' => 'galeri-foto',
        ]);

        Format::create([
            'title' => 'Galeri Video',
            'slug' => 'galeri-video',
        ]);

        Format::create([
            'title' => 'Slide',
            'slug' => 'slide',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formats');
    }
};
