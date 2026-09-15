<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $fillable = [

        'nama',
        'kelompok',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'alamat',

    ];
}
