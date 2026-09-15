<?php

namespace App\Livewire\App;

use App\Models\FormulirFormat;
use App\Models\Sidi;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormulirSidi extends Component
{
    #[Rule('required', message: 'Silakan isi Nama Lengkap.')]
    public $nama_lengkap = '';

    #[Rule('not_in:0', message: 'Silakan pilih Jenis Kelamin.')]
    public $id_kelamin = 0;

    #[Rule('required', message: 'Silakan isi Alamat.')]
    public $alamat = '';

    #[Rule('required', message: 'Silakan isi Tempat Lahir.')]
    public $tempat_lahir = '';

    #[Rule('required', message: 'Silakan isi Tanggal Lahir.')]
    public $tanggal_lahir = '';

    #[Rule('required', message: 'Silakan isi Tempat Baptis.')]
    public $tempat_baptis = '';

    #[Rule('required', message: 'Silakan isi Tanggal Baptis.')]
    public $tanggal_baptis = '';

    #[Rule('required', message: 'Silakan isi Nama Pendeta.')]
    public $nama_pendeta_baptis = '';

    #[Rule('required', message: 'Silakan isi Tempat Nikah.')]
    public $tempat_nikah = '';

    #[Rule('required', message: 'Silakan isi Tanggal Nikah.')]
    public $tanggal_nikah = '';

    #[Rule('required', message: 'Silakan isi Menikah secara.')]
    public $menikah_secara = '';

    #[Rule('required', message: 'Silakan isi Pendidikan.')]
    public $pendidikan = '';

    #[Rule('required', message: 'Silakan isi Pekerjaan.')]
    public $pekerjaan = '';

    #[Rule('required', message: 'Silakan isi Alamat Pekerjaan.')]
    public $alamat_pekerjaan = '';

    // #[Rule('required', message: 'Silakan isi Keterangan lain.')]
    public $keterangan_lain = '';

    #[Rule('required', message: 'Silakan isi Nama Lengkap Ayah.')]
    public $nama_ayah = '';

    #[Rule('not_in:0', message: 'Silakan pilih Status Kristen Ayah.')]
    public $status_kristen_ayah = 0;

    #[Rule('required', message: 'Silakan isi Anggota Gereja Ayah.')]
    public $anggota_gereja_ayah = '';

    #[Rule('required', message: 'Silakan isi Nomor Induk Ayah.')]
    public $nomor_induk_ayah = '';

    #[Rule('required', message: 'Silakan isi Nama Lengkap Ibu.')]
    public $nama_ibu = '';

    #[Rule('not_in:0', message: 'Silakan pilih Status Kristen Ibu.')]
    public $status_kristen_ibu = 0;

    #[Rule('required', message: 'Silakan isi Anggota Gereja Ibu.')]
    public $anggota_gereja_ibu = '';

    #[Rule('required', message: 'Silakan isi Nomor Induk Ibu.')]
    public $nomor_induk_ibu = '';

    #[Rule('required', message: 'Silakan isi Alamat Ayah Ibu.')]
    public $alamat_ayah_ibu = '';

    #[Rule('required', message: 'Silakan isi Nama Tunangan.')]
    public $nama_tunangan = '';

    #[Rule('not_in:0', message: 'Silakan pilih Status Kristen Tunangan.')]
    public $status_kristen_tunangan = 0;

    #[Rule('required', message: 'Silakan isi Anggota Gereja Tunangan.')]
    public $anggota_gereja_tunangan = '';

    #[Rule('required', message: 'Silakan isi Nomor Induk Tunangan.')]
    public $nomor_induk_tunangan = '';

    #[Rule('required', message: 'Silakan isi Alamat Tunangan.')]
    public $alamat_tunangan = '';

    #[Rule('required', message: 'Silakan isi Tempat Bertunangan.')]
    public $tempat_tunangan = '';

    #[Rule('required', message: 'Silakan isi Tanggal Bertunangan.')]
    public $tanggal_tunangan = '';

    #[Rule('required', message: 'Silakan isi Nama Suami/Istri.')]
    public $nama_pasangan = '';

    #[Rule('required', message: 'Silakan isi Anggota Gereja.')]
    public $anggota_gereja_pasangan = '';

    #[Rule('required', message: 'Silakan isi Keterangan Pasangan.')]
    public $keterangan = '';

    #[Rule('required', message: 'Silakan isi Jumlah Anak.')]
    public $jumlah_anak = '';

    #[Rule('required', message: 'Silakan isi Masih dalam usaha.')]
    public $masih_usaha = '';

    #[Rule('required', message: 'Silakan isi Pengajar Katekasi.')]
    public $pengajar_katekasi = '';

    #[Rule('required', message: 'Silakan isi Selama Katekasi.')]
    public $lama_katekasi = '';

    #[Rule('required', message: 'Silakan isi Tempat Katekasi.')]
    public $tempat_katekasi = '';

    #[Rule('required', message: 'Silakan isi Tanggal SIDI.')]
    public $tanggal_sidi = '';

    #[Rule('required', message: 'Silakan isi Kebaktian Jam.')]
    public $jam_kebaktian = '';

    #[Rule('required', message: 'Silakan isi Bertempat di Gereja.')]
    public $tempat_gereja = '';

    #[Rule('required', message: 'Silakan isi Telah melapor di Kelompok.')]
    public $lapor_kelompok = '';

    #[Rule('required', message: 'Silakan isi Tanggal Melapor.')]
    public $tanggal_melapor = '';

    #[Rule('required', message: 'Silakan isi Ketua Kelompok.')]
    public $ketua_kelompok = '';

    public function render()
    {
        if ($formcat = FormulirFormat::where('slug', 'sidi')->firstOrFail()) {
            return view('livewire.app.formulir-form-sidi', [
                'formcat' => $formcat,
                'page_title' => $formcat->title,
                'deskripsi' => $formcat->description,
            ]);
        }
    }

    public function send()
    {
        $this->validate();

        $data = [
            'nama_lengkap' => $this->nama_lengkap,
            'id_kelamin' => $this->id_kelamin,
            'alamat' => $this->alamat,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tempat_baptis' => $this->tempat_baptis,
            'tanggal_baptis' => $this->tanggal_baptis,
            'nama_pendeta_baptis' => $this->nama_pendeta_baptis,
            'tempat_nikah' => $this->tempat_nikah,
            'tanggal_nikah' => $this->tanggal_nikah,
            'menikah_secara' => $this->menikah_secara,
            'pendidikan' => $this->pendidikan,
            'pekerjaan' => $this->pekerjaan,
            'alamat_pekerjaan' => $this->alamat_pekerjaan,
            'keterangan_lain' => $this->keterangan_lain,
            'nama_ayah' => $this->nama_ayah,
            'status_kristen_ayah' => $this->status_kristen_ayah,
            'anggota_gereja_ayah' => $this->anggota_gereja_ayah,
            'nomor_induk_ayah' => $this->nomor_induk_ayah,
            'nama_ibu' => $this->nama_ibu,
            'status_kristen_ibu' => $this->status_kristen_ibu,
            'anggota_gereja_ibu' => $this->anggota_gereja_ibu,
            'nomor_induk_ibu' => $this->nomor_induk_ibu,
            'alamat_ayah_ibu' => $this->alamat_ayah_ibu,
            'nama_tunangan' => $this->nama_tunangan,
            'status_kristen_tunangan' => $this->status_kristen_tunangan,
            'anggota_gereja_tunangan' => $this->anggota_gereja_tunangan,
            'nomor_induk_tunangan' => $this->nomor_induk_tunangan,
            'alamat_tunangan' => $this->alamat_tunangan,
            'tempat_tunangan' => $this->tempat_tunangan,
            'tanggal_tunangan' => $this->tanggal_tunangan,
            'nama_pasangan' => $this->nama_pasangan,
            'anggota_gereja_pasangan' => $this->anggota_gereja_pasangan,
            'keterangan' => $this->keterangan,
            'jumlah_anak' => $this->jumlah_anak,
            'masih_usaha' => $this->masih_usaha,
            'pengajar_katekasi' => $this->pengajar_katekasi,
            'lama_katekasi' => $this->lama_katekasi,
            'tempat_katekasi' => $this->tempat_katekasi,
            'tanggal_sidi' => $this->tanggal_sidi,
            'jam_kebaktian' => $this->jam_kebaktian,
            'tempat_gereja' => $this->tempat_gereja,
            'lapor_kelompok' => $this->lapor_kelompok,
            'tanggal_melapor' => $this->tanggal_melapor,
            'ketua_kelompok' => $this->ketua_kelompok,
        ];
        Sidi::create($data);

        session()->flash('message', 'Formulir BERHASIL dikirim.');
        session()->flash('theme', 'success');

        $this->redirectRoute('form-sent');
    }
}
