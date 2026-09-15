<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    protected $fillable = [

        'nama_suami',
        'nik_suami',
        'nama_istri',
        'nik_istri',
        'alamat',
        'kelompok',
        'nama_anak',
        'id_jenis_kelamin_anak',
        'anak_nomor_ke',
        'tanggal_lahir_anak',
        'tanggal_lapor_capil',
        'tanggal_lapor_gereja',
        'keterangan_lain',
        'pemohon',
        'ketua_kelompok',

    ];

    public function jenis_kelamin_anak()
    {
        return $this->belongsTo(Sex::class, 'id_jenis_kelamin_anak', 'id');
    }
}
