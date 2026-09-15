<?php

use App\Models\Role;
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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Role::create([
            'title' => 'Super Admin',
            'slug' => 'Mengelola semua fitur situs web.',
        ]);

        Role::create([
            'title' => 'Editor',
            'slug' => 'Mengelola konten, Entry/Edit & Publish.',
        ]);

        Role::create([
            'title' => 'Reporter',
            'slug' => 'Mengelola konten, Entry/Edit.',
        ]);

        Role::create([
            'title' => 'Internship',
            'slug' => 'Mengelola konten.',
        ]);

        Role::create([
            'title' => 'Visitor',
            'slug' => 'Pengunjung situs web.',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
