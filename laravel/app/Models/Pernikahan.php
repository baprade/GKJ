<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pernikahan extends Model
{
    protected $fillable = [

        'nama_casu',
        'tempat_lahir_casu',
        'tanggal_nikah_casu',
        'agama_casu',
        'sidi_tanggal_casu',
        'pekerjaan_casu',
        'alamat_rumah_casu',
        'anggota_gereja_casu',
        'anggota_kelompok_casu',

        'nama_cais',
        'agama_cais',
        'sidi_tanggal_cais',
        'pekerjaan_cais',
        'alamat_rumah_cais',
        'anggota_gereja_cais',
        'anggota_kelompok_cais',

        'tanggal_nikah',
        'tempat_nikah',

        'ortu_casu',
        'ortu_cais',

    ];
}
