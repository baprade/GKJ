<?php

namespace App\Livewire\App;

use App\Models\FormulirFormat;
use App\Models\Pernikahan;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormulirNikah extends Component
{
    #[Rule('required', message: 'Silakan isi Nama Calon Suami.')]
    public $nama_casu = '';

    #[Rule('required', message: 'Silakan isi Tempat Lahir.')]
    public $tempat_lahir_casu = '';

    #[Rule('required', message: 'Silakan isi Tanggal Lahir.')]
    public $tanggal_nikah_casu = '';

    #[Rule('required', message: 'Silakan isi Agama.')]
    public $agama_casu = '';

    #[Rule('required', message: 'Silakan isi Sidi Tanggal.')]
    public $sidi_tanggal_casu = '';

    #[Rule('required', message: 'Silakan isi Pekerjaan.')]
    public $pekerjaan_casu = '';

    #[Rule('required', message: 'Silakan isi Alamat Rumah.')]
    public $alamat_rumah_casu = '';

    #[Rule('required', message: 'Silakan isi Anggota Gereja.')]
    public $anggota_gereja_casu = '';

    #[Rule('required', message: 'Silakan isi Kelompok/Blok.')]
    public $anggota_kelompok_casu = '';

    #[Rule('required', message: 'Silakan isi Nama Calon Istri.')]
    public $nama_cais = '';

    #[Rule('required', message: 'Silakan isi Agama.')]
    public $agama_cais = '';

    #[Rule('required', message: 'Silakan isi Sidi Tanggal.')]
    public $sidi_tanggal_cais = '';

    #[Rule('required', message: 'Silakan isi Pekerjaan.')]
    public $pekerjaan_cais = '';

    #[Rule('required', message: 'Silakan isi Alamat Rumah.')]
    public $alamat_rumah_cais = '';

    #[Rule('required', message: 'Silakan isi Anggota Gereja.')]
    public $anggota_gereja_cais = '';

    #[Rule('required', message: 'Silakan isi Kelompok/Blok.')]
    public $anggota_kelompok_cais = '';

    #[Rule('required', message: 'Silakan isi Tanggal Pernikahan.')]
    public $tanggal_nikah = '';

    #[Rule('required', message: 'Silakan isi Tempat Pernikahan.')]
    public $tempat_nikah = '';

    #[Rule('required', message: 'Silakan isi Orang Tua Calon mempelai laki-laki.')]
    public $ortu_casu = '';

    #[Rule('required', message: 'Silakan isi Orang Tua Calon mempelai perempuan.')]
    public $ortu_cais = '';

    public function render()
    {
        if ($formcat = FormulirFormat::where('slug', 'pernikahan')->firstOrFail()) {
            return view('livewire.app.formulir-form-nikah', [
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
            'nama_casu' => $this->nama_casu,
            'tempat_lahir_casu' => $this->tempat_lahir_casu,
            'tanggal_nikah_casu' => $this->tanggal_nikah_casu,
            'agama_casu' => $this->agama_casu,
            'sidi_tanggal_casu' => $this->sidi_tanggal_casu,
            'pekerjaan_casu' => $this->pekerjaan_casu,
            'alamat_rumah_casu' => $this->alamat_rumah_casu,
            'anggota_gereja_casu' => $this->anggota_gereja_casu,
            'anggota_kelompok_casu' => $this->anggota_kelompok_casu,

            'nama_cais' => $this->nama_cais,
            'agama_cais' => $this->agama_cais,
            'sidi_tanggal_cais' => $this->sidi_tanggal_cais,
            'pekerjaan_cais' => $this->pekerjaan_cais,
            'alamat_rumah_cais' => $this->alamat_rumah_cais,
            'anggota_gereja_cais' => $this->anggota_gereja_cais,
            'anggota_kelompok_cais' => $this->anggota_kelompok_cais,

            'tanggal_nikah' => $this->tanggal_nikah,
            'tempat_nikah' => $this->tempat_nikah,

            'ortu_casu' => $this->ortu_casu,
            'ortu_cais' => $this->ortu_cais,
        ];
        Pernikahan::create($data);

        session()->flash('message', 'Formulir BERHASIL dikirim.');
        session()->flash('theme', 'success');

        $this->redirectRoute('form-sent');
    }
}
