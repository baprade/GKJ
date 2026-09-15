<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Titipwarga extends Model
{
    protected $fillable = [

        'nama_lengkap',
        'id_status_nikah',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'pekerjaan',
        'tempat_baptis',
        'tanggal_baptis',
        'tempat_sidi',
        'tanggal_sidi',
        'alamat_baru',
        'keterangan_lain',
        'sekretaris_kelompok',
        'ketua_kelompok',

    ];

    public function status_nikah()
    {
        return $this->belongsTo(Married::class, 'id_status_nikah', 'id');
    }
}
