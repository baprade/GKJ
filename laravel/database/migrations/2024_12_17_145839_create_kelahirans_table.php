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
        Schema::create('kelahirans', function (Blueprint $table) {
            $table->id();

            $table->text('nama_suami')->nullable();
            $table->text('nik_suami')->nullable();
            $table->text('nama_istri')->nullable();
            $table->text('nik_istri')->nullable();
            $table->text('alamat')->nullable();
            $table->text('kelompok')->nullable();
            $table->text('nama_anak')->nullable();
            $table->integer('id_jenis_kelamin_anak')->default(0);
            $table->integer('anak_nomor_ke')->default(0);
            $table->date('tanggal_lahir_anak')->nullable();
            $table->date('tanggal_lapor_capil')->nullable();
            $table->date('tanggal_lapor_gereja')->nullable();
            $table->text('keterangan_lain')->nullable();
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
        Schema::dropIfExists('kelahirans');
    }
};
