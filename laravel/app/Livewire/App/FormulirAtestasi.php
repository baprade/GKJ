<?php

namespace App\Livewire\App;

use App\Models\Atestasi;
use App\Models\FormulirFormat;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormulirAtestasi extends Component
{
    #[Rule('required', message: 'Silakan isi Nama Lengkap.')]
    public $nama_lengkap = '';

    #[Rule('required', message: 'Silakan isi Tempat Lahir.')]
    public $tempat_lahir = '';

    #[Rule('required', message: 'Silakan isi Tanggal Lahir.')]
    public $tanggal_lahir = '';

    #[Rule('required', message: 'Silakan isi Alamat.')]
    public $alamat = '';

    #[Rule('required', message: 'Silakan isi Pekerjaan.')]
    public $pekerjaan = '';

    #[Rule('required', message: 'Silakan isi Tempat Baptis.')]
    public $tempat_baptis = '';

    #[Rule('required', message: 'Silakan isi Tanggal Baptis.')]
    public $tanggal_baptis = '';

    #[Rule('required', message: 'Silakan isi Tempat Sidi.')]
    public $tempat_sidi = '';

    #[Rule('required', message: 'Silakan isi Tanggal Sidi.')]
    public $tanggal_sidi = '';

    #[Rule('not_in:0', message: 'Silakan pilih Status Nikah.')]
    public $id_status_nikah = 0;

    #[Rule('required', message: 'Silakan isi Anggota Kelompok.')]
    public $kelompok = '';

    #[Rule('required', message: 'Silakan isi Anggota Gereja Baru.')]
    public $anggota_gereja_baru = '';

    #[Rule('required', message: 'Silakan isi Alamat Gereja Baru.')]
    public $alamat_gereja_baru = '';

    #[Rule('required', message: 'Silakan isi Sebab/Alasan Pindah.')]
    public $alasan_pindah = '';

    #[Rule('required', message: 'Silakan isi Alamat (Tempat Tinggal) Baru.')]
    public $alamat_baru = '';

    #[Rule('required', message: 'Silakan isi Pengikut.')]
    public $pengikut = '';

    #[Rule('required', message: 'Silakan isi Majelis Pembina Kelompok.')]
    public $majelis_pembina_kelompok = '';

    public function render()
    {
        if ($formcat = FormulirFormat::where('slug', 'atestasi')->firstOrFail()) {
            return view('livewire.app.formulir-form-atestasi', [
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
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'pekerjaan' => $this->pekerjaan,
            'tempat_baptis' => $this->tempat_baptis,
            'tanggal_baptis' => $this->tanggal_baptis,
            'tempat_sidi' => $this->tempat_sidi,
            'tanggal_sidi' => $this->tanggal_sidi,
            'id_status_nikah' => $this->id_status_nikah,
            'kelompok' => $this->kelompok,
            'anggota_gereja_baru' => $this->anggota_gereja_baru,
            'alamat_gereja_baru' => $this->alamat_gereja_baru,
            'alasan_pindah' => $this->alasan_pindah,
            'alamat_baru' => $this->alamat_baru,
            'pengikut' => $this->pengikut,
            'majelis_pembina_kelompok' => $this->majelis_pembina_kelompok,
        ];
        Atestasi::create($data);

        session()->flash('message', 'Formulir BERHASIL dikirim.');
        session()->flash('theme', 'success');

        $this->redirectRoute('form-sent');
    }
}
