<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atestasi extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'pekerjaan',
        'tempat_baptis',
        'tanggal_baptis',
        'tempat_sidi',
        'tanggal_sidi',
        'id_status_nikah',
        'kelompok',
        'anggota_gereja_baru',
        'alamat_gereja_baru',
        'alasan_pindah',
        'alamat_baru',
        'pengikut',
        'majelis_pembina_kelompok',
    ];

    public function status_nikah()
    {
        return $this->belongsTo(Married::class, 'id_status_nikah', 'id');
    }
}
