<?php

use App\Models\FormulirFormat;
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
        Schema::create('formulir_formats', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('title_long')->nullable();
            $table->text('slug')->nullable();
            $table->text('description')->nullable();
            $table->integer('onoff')->default(0);
            $table->timestamps();
        });

        FormulirFormat::create([
            'title' => 'Pengajuan Registrasi',
            'slug' => 'registrasi',
            'description' => 'Permohonan Menjadi Warga Gereja',
        ]);

        FormulirFormat::create([
            'title' => 'Kelahiran',
            'slug' => 'kelahiran',
            'description' => 'Lapor Kelahiran',
        ]);

        FormulirFormat::create([
            'title' => 'Meninggal',
            'slug' => 'meninggal',
            'description' => 'Lapor Kematian',
        ]);

        FormulirFormat::create([
            'title' => 'Titip Warga',
            'slug' => 'titip-warga',
            'description' => 'Permohonan Titip Warga',
        ]);

        FormulirFormat::create([
            'title' => 'Atestasi',
            'slug' => 'atestasi',
            'description' => 'Permohonan Surat Pindah (Atestasi)',
        ]);

        FormulirFormat::create([
            'title' => 'Pengakuan Dosa',
            'slug' => 'pengakuan',
            'description' => 'Permohonan Pengakuan Dosa',
        ]);

        FormulirFormat::create([
            'title' => 'Pernikahan',
            'slug' => 'pernikahan',
            'description' => 'Permohonan Pelayanan Perkawinan',
        ]);

        FormulirFormat::create([
            'title' => 'Baptis Anak',
            'slug' => 'baptis',
            'description' => 'Permohonan Baptis Anak',
        ]);

        FormulirFormat::create([
            'title' => 'Sidi',
            'slug' => 'sidi',
            'description' => 'Permohonan Sidi / Pengakuan Percaya / Baptis Dewasa',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir_formats');
    }
};
