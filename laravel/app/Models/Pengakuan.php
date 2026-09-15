<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengakuan extends Model
{
    protected $fillable = [
        'nama',
        'umur',
        'alamat',
        'kelompok',
        'penjelasan',
        'majelis_pembina_kelompok',
    ];
}
