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
        Schema::create('meninggals', function (Blueprint $table) {
            $table->id();

            $table->text('nama_meninggal')->nullable();
            $table->text('kelompok')->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->text('tanggal_lahir')->nullable();
            $table->text('no_induk_gereja')->nullable();
            $table->text('alamat')->nullable();
            $table->text('pemohon')->nullable();
            $table->text('ketua_kelompok')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meninggals');
    }
};
