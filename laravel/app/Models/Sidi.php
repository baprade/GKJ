<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sidi extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'id_kelamin',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'tempat_baptis',
        'tanggal_baptis',
        'nama_pendeta_baptis',
        'tempat_nikah',
        'tanggal_nikah',
        'menikah_secara',
        'pendidikan',
        'pekerjaan',
        'alamat_pekerjaan',
        'keterangan_lain',
        'nama_ayah',
        'status_kristen_ayah',
        'anggota_gereja_ayah',
        'nomor_induk_ayah',
        'nama_ibu',
        'status_kristen_ibu',
        'anggota_gereja_ibu',
        'nomor_induk_ibu',
        'alamat_ayah_ibu',
        'nama_tunangan',
        'status_kristen_tunangan',
        'anggota_gereja_tunangan',
        'nomor_induk_tunangan',
        'alamat_tunangan',
        'tempat_tunangan',
        'tanggal_tunangan',
        'nama_pasangan',
        'anggota_gereja_pasangan',
        'keterangan',
        'jumlah_anak',
        'masih_usaha',
        'pengajar_katekasi',
        'lama_katekasi',
        'tempat_katekasi',
        'tanggal_sidi',
        'jam_kebaktian',
        'tempat_gereja',
        'lapor_kelompok',
        'tanggal_melapor',
        'ketua_kelompok',
    ];

    public function jenis_kelamin()
    {
        return $this->belongsTo(Sex::class, 'id_kelamin', 'id');
    }

    public function status_kristenayah()
    {
        return $this->belongsTo(Christian::class, 'status_kristen_ayah', 'id');
    }

    public function status_kristenibu()
    {
        return $this->belongsTo(Christian::class, 'status_kristen_ibu', 'id');
    }

    public function status_kristentunangan()
    {
        return $this->belongsTo(Christian::class, 'status_kristen_tunangan', 'id');
    }
}
