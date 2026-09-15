<?php

namespace App\Livewire\App;

use App\Models\FormulirFormat;
use App\Models\Titipwarga;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormulirTitipwarga extends Component
{
    #[Rule('required', message: 'Silakan isi Nama Lengkap.')]
    public $nama_lengkap = '';

    #[Rule('not_in:0', message: 'Silakan pilih Status Nikah.')]
    public $id_status_nikah = 0;

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

    #[Rule('required', message: 'Silakan isi Alamat Baru.')]
    public $alamat_baru = '';

    public $keterangan_lain = '';

    #[Rule('required', message: 'Silakan isi Sekretaris Kelompok.')]
    public $sekretaris_kelompok = '';

    #[Rule('required', message: 'Silakan isi Ketua Kelompok.')]
    public $ketua_kelompok = '';

    public function render()
    {
        if ($formcat = FormulirFormat::where('slug', 'titip-warga')->firstOrFail()) {
            return view('livewire.app.formulir-form-titipwarga', [
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
            'id_status_nikah' => $this->id_status_nikah,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'pekerjaan' => $this->pekerjaan,
            'tempat_baptis' => $this->tempat_baptis,
            'tanggal_baptis' => $this->tanggal_baptis,
            'tempat_sidi' => $this->tempat_sidi,
            'tanggal_sidi' => $this->tanggal_sidi,
            'alamat_baru' => $this->alamat_baru,
            'keterangan_lain' => $this->keterangan_lain,
            'sekretaris_kelompok' => $this->sekretaris_kelompok,
            'ketua_kelompok' => $this->ketua_kelompok,
        ];
        Titipwarga::create($data);

        session()->flash('message', 'Formulir BERHASIL dikirim.');
        session()->flash('theme', 'success');

        $this->redirectRoute('form-sent');
    }
}
