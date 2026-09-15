<?php

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
        Schema::create('pengakuans', function (Blueprint $table) {
            $table->id();

            $table->text('nama')->nullable();
            $table->text('umur')->nullable();
            $table->text('alamat')->nullable();
            $table->text('kelompok')->nullable();
            $table->text('penjelasan')->nullable();
            $table->text('majelis_pembina_kelompok')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengakuans');
    }
};
