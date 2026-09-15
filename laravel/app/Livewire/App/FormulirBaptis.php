<?php

namespace App\Livewire\App;

use App\Models\Baptis;
use App\Models\FormulirFormat;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormulirBaptis extends Component
{
    #[Rule('required', message: 'Silakan isi Nama I.')]
    public $nama_1 = '';

    #[Rule('required', message: 'Silakan isi Anggota Kelompok.')]
    public $anggota_kelompok_1 = '';

    #[Rule('required', message: 'Silakan isi Anggota Gereja.')]
    public $anggota_gereja_1 = '';

    #[Rule('required', message: 'Silakan isi Nomor Induk.')]
    public $nomor_induk_1 = '';

    #[Rule('required', message: 'Silakan isi Alamat Lengkap.')]
    public $alamat_1 = '';

    #[Rule('required', message: 'Silakan isi Nama II.')]
    public $nama_2 = '';

    #[Rule('required', message: 'Silakan isi Anggota Kelompok.')]
    public $anggota_kelompok_2 = '';

    #[Rule('required', message: 'Silakan isi Anggota Gereja.')]
    public $anggota_gereja_2 = '';

    #[Rule('required', message: 'Silakan isi Nomor Induk.')]
    public $nomor_induk_2 = '';

    #[Rule('required', message: 'Silakan isi Alamat Lengkap.')]
    public $alamat_2 = '';

    #[Rule('required', message: 'Silakan isi Nama Anak.')]
    public $nama_anak = '';

    #[Rule('not_in:0', message: 'Silakan pilih Jenis Kelamin.')]
    public $id_kelamin_anak = 0;

    #[Rule('required', message: 'Silakan isi Tempat Lahir.')]
    public $tempat_lahir = '';

    #[Rule('required', message: 'Silakan isi Tanggal Lahir.')]
    public $tanggal_lahir = '';

    #[Rule('required', message: 'Silakan isi Tanggal Melapor ke Catatan Sipil.')]
    public $tanggal_lapor_capil = '';

    #[Rule('required', message: 'Silakan isi Akta Kelahiran.')]
    public $akta_lahir = '';

    #[Rule('required', message: 'Silakan isi Telah melapor di Kelompok.')]
    public $lapor_kelompok = '';

    #[Rule('required', message: 'Silakan isi Tanggal Melapor.')]
    public $tanggal_melapor = '';

    #[Rule('required', message: 'Silakan isi Ketua Kelompok.')]
    public $ketua_kelompok = '';

    public function render()
    {
        if ($formcat = FormulirFormat::where('slug', 'baptis')->firstOrFail()) {
            return view('livewire.app.formulir-form-baptis', [
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
            'nama_1' => $this->nama_1,
            'anggota_kelompok_1' => $this->anggota_kelompok_1,
            'anggota_gereja_1' => $this->anggota_gereja_1,
            'nomor_induk_1' => $this->nomor_induk_1,
            'alamat_1' => $this->alamat_1,
            'nama_2' => $this->nama_2,
            'anggota_kelompok_2' => $this->anggota_kelompok_2,
            'anggota_gereja_2' => $this->anggota_gereja_2,
            'nomor_induk_2' => $this->nomor_induk_2,
            'alamat_2' => $this->alamat_2,
            'nama_anak' => $this->nama_anak,
            'id_kelamin_anak' => $this->id_kelamin_anak,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tanggal_lapor_capil' => $this->tanggal_lapor_capil,
            'akta_lahir' => $this->akta_lahir,
            'lapor_kelompok' => $this->lapor_kelompok,
            'tanggal_melapor' => $this->tanggal_melapor,
            'ketua_kelompok' => $this->ketua_kelompok,
        ];
        Baptis::create($data);

        session()->flash('message', 'Formulir BERHASIL dikirim.');
        session()->flash('theme', 'success');

        $this->redirectRoute('form-sent');
    }
}
