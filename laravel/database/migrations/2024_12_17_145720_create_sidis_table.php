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
        Schema::create('sidis', function (Blueprint $table) {
            $table->id();

            // 1 //
            $table->text('nama_lengkap')->nullable();
            $table->integer('id_kelamin')->default(0);

            // 2 //
            $table->text('alamat')->nullable();

            // 3 //
            $table->text('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('tempat_baptis')->nullable();
            $table->date('tanggal_baptis')->nullable();
            $table->text('nama_pendeta_baptis')->nullable();
            $table->text('tempat_nikah')->nullable();
            $table->date('tanggal_nikah')->nullable();
            $table->text('menikah_secara')->nullable();

            // 4 //
            $table->text('pendidikan')->nullable();
            $table->text('pekerjaan')->nullable();
            $table->text('alamat_pekerjaan')->nullable();
            $table->text('keterangan_lain')->nullable();

            // 5 //
            $table->text('nama_ayah')->nullable();
            $table->integer('status_kristen_ayah')->default(0);
            $table->text('anggota_gereja_ayah')->nullable();
            $table->text('nomor_induk_ayah')->nullable();
            $table->text('nama_ibu')->nullable();
            $table->integer('status_kristen_ibu')->default(0);
            $table->text('anggota_gereja_ibu')->nullable();
            $table->text('nomor_induk_ibu')->nullable();
            $table->text('alamat_ayah_ibu')->nullable();

            // 6 //
            $table->text('nama_tunangan')->nullable();
            $table->integer('status_kristen_tunangan')->default(0);
            $table->text('anggota_gereja_tunangan')->nullable();
            $table->text('nomor_induk_tunangan')->nullable();
            $table->text('alamat_tunangan')->nullable();

            // 6 //
            $table->text('tempat_tunangan')->nullable();
            $table->date('tanggal_tunangan')->nullable();

            // 7 //
            $table->text('nama_pasangan')->nullable();
            $table->text('anggota_gereja_pasangan')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('jumlah_anak')->nullable();
            $table->text('masih_usaha')->nullable();

            // 8 //
            $table->text('pengajar_katekasi')->nullable();
            $table->text('lama_katekasi')->nullable();
            $table->text('tempat_katekasi')->nullable();

            // 9 //
            $table->date('tanggal_sidi')->nullable();
            $table->text('jam_kebaktian')->nullable();
            $table->text('tempat_gereja')->nullable();

            // 10 //
            $table->text('lapor_kelompok')->nullable();
            $table->date('tanggal_melapor')->nullable();
            $table->text('ketua_kelompok')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sidis');
    }
};
