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
        Schema::create('titipwargas', function (Blueprint $table) {
            $table->id();

            $table->text('nama_lengkap')->nullable();
            $table->integer('id_status_nikah')->default(0);
            $table->text('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->text('pekerjaan')->nullable();
            $table->text('tempat_baptis')->nullable();
            $table->date('tanggal_baptis')->nullable();
            $table->text('tempat_sidi')->nullable();
            $table->date('tanggal_sidi')->nullable();
            $table->text('alamat_baru')->nullable();
            $table->text('keterangan_lain')->nullable();
            $table->text('sekretaris_kelompok')->nullable();
            $table->text('ketua_kelompok')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titipwargas');
    }
};
