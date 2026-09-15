<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    protected $fillable = [

        'nama_meninggal',
        'kelompok',
        'tempat_lahir',
        'tanggal_lahir',
        'no_induk_gereja',
        'alamat',
        'pemohon',
        'ketua_kelompok',

    ];
}
