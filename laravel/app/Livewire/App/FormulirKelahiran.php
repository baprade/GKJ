<?php

namespace App\Livewire\App;

use App\Models\FormulirFormat;
use App\Models\Kelahiran;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormulirKelahiran extends Component
{
    #[Rule('required', message: 'Silakan isi Nama Suami.')]
    public $nama_suami = '';

    #[Rule('required', message: 'Silakan isi NIK Suami.')]
    public $nik_suami;

    #[Rule('required', message: 'Silakan isi Nama Istri.')]
    public $nama_istri = '';

    #[Rule('required', message: 'Silakan isi NIK Istri.')]
    public $nik_istri;

    #[Rule('required', message: 'Silakan isi Alamat.')]
    public $alamat = '';

    #[Rule('required', message: 'Silakan isi Pepanthan/Kelompok.')]
    public $kelompok = '';

    #[Rule('required', message: 'Silakan isi Nama Anak.')]
    public $nama_anak = '';

    #[Rule('not_in:0', message: 'Silakan pilih Jenis Kelamin Anak.')]
    public $id_jenis_kelamin_anak = 0;

    #[Rule('required', message: 'Silakan isi Anak ke Berapa.')]
    public $anak_nomor_ke = '';

    #[Rule('required', message: 'Silakan isi Tanggal Lahir Anak.')]
    public $tanggal_lahir_anak = '';

    public $tanggal_lapor_capil = '';

    public $tanggal_lapor_gereja = '';

    public $keterangan_lain = '';

    #[Rule('required', message: 'Silakan isi Nama Pemohon.')]
    public $pemohon;

    public $ketua_kelompok;

    public function render()
    {
        if ($formcat = FormulirFormat::where('slug', 'kelahiran')->firstOrFail()) {
            return view('livewire.app.formulir-form-kelahiran', [
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
            'nama_suami' => $this->nama_suami,
            'nik_suami' => $this->nik_suami,
            'nama_istri' => $this->nama_istri,
            'nik_istri' => $this->nik_istri,
            'alamat' => $this->alamat,
            'kelompok' => $this->kelompok,
            'nama_anak' => $this->nama_anak,
            'id_jenis_kelamin_anak' => $this->id_jenis_kelamin_anak,
            'anak_nomor_ke' => $this->anak_nomor_ke,
            'tanggal_lahir_anak' => $this->tanggal_lahir_anak,
            'tanggal_lapor_capil' => $this->tanggal_lapor_capil,
            'tanggal_lapor_gereja' => $this->tanggal_lapor_gereja,
            'keterangan_lain' => $this->keterangan_lain,
            'pemohon' => $this->pemohon,
            'ketua_kelompok' => $this->ketua_kelompok,
        ];
        Kelahiran::create($data);

        session()->flash('message', 'Formulir BERHASIL dikirim.');
        session()->flash('theme', 'success');

        $this->redirectRoute('form-sent');
    }
}
