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
        Schema::create('baptis', function (Blueprint $table) {
            $table->id();

            $table->text('nama_1')->nullable();
            $table->text('anggota_kelompok_1')->nullable();
            $table->text('anggota_gereja_1')->nullable();
            $table->text('nomor_induk_1')->nullable();
            $table->text('alamat_1')->nullable();

            $table->text('nama_2')->nullable();
            $table->text('anggota_kelompok_2')->nullable();
            $table->text('anggota_gereja_2')->nullable();
            $table->text('nomor_induk_2')->nullable();
            $table->text('alamat_2')->nullable();

            $table->text('nama_anak')->nullable();
            $table->integer('id_kelamin_anak')->default(0);
            $table->text('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->date('tanggal_lapor_capil')->nullable();
            $table->text('akta_lahir')->nullable();

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
        Schema::dropIfExists('baptis');
    }
};
