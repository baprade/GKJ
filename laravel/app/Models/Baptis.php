<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baptis extends Model
{
    protected $fillable = [
        'nama_1',
        'anggota_kelompok_1',
        'anggota_gereja_1',
        'nomor_induk_1',
        'alamat_1',
        'nama_2',
        'anggota_kelompok_2',
        'anggota_gereja_2',
        'nomor_induk_2',
        'alamat_2',
        'nama_anak',
        'id_kelamin_anak',
        'tempat_lahir',
        'tanggal_lahir',
        'tanggal_lapor_capil',
        'akta_lahir',
        'lapor_kelompok',
        'tanggal_melapor',
        'ketua_kelompok',
    ];

    public function jenis_kelamin_anak()
    {
        return $this->belongsTo(Sex::class, 'id_kelamin_anak', 'id');
    }
}
