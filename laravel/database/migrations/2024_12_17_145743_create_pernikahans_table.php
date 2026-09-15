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
        Schema::create('pernikahans', function (Blueprint $table) {
            $table->id();

            $table->text('nama_casu')->nullable();
            $table->text('tempat_lahir_casu')->nullable();
            $table->date('tanggal_nikah_casu')->nullable();
            $table->text('agama_casu')->nullable();
            $table->date('sidi_tanggal_casu')->nullable();
            $table->text('pekerjaan_casu')->nullable();
            $table->text('alamat_rumah_casu')->nullable();
            $table->text('anggota_gereja_casu')->nullable();
            $table->text('anggota_kelompok_casu')->nullable();

            $table->text('nama_cais')->nullable();
            $table->text('agama_cais')->nullable();
            $table->date('sidi_tanggal_cais')->nullable();
            $table->text('pekerjaan_cais')->nullable();
            $table->text('alamat_rumah_cais')->nullable();
            $table->text('anggota_gereja_cais')->nullable();
            $table->text('anggota_kelompok_cais')->nullable();

            $table->date('tanggal_nikah')->nullable();
            $table->text('tempat_nikah')->nullable();

            $table->text('ortu_casu')->nullable();
            $table->text('ortu_cais')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pernikahans');
    }
};
