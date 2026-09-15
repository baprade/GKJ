<?php

namespace App\Livewire\App;

use App\Models\FormulirFormat;
use App\Models\Meninggal;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormulirMeninggal extends Component
{
    #[Rule('required', message: 'Silakan isi Nama yang Meninggal.')]
    public $nama_meninggal = '';

    #[Rule('required', message: 'Silakan isi Pepanthan/Kelompok.')]
    public $kelompok = '';

    #[Rule('required', message: 'Silakan isi Tempat Lahir.')]
    public $tempat_lahir = '';

    #[Rule('required', message: 'Silakan isi Tanggal Lahir.')]
    public $tanggal_lahir = '';

    #[Rule('required', message: 'Silakan isi Nomor Induk Gereja.')]
    public $no_induk_gereja = '';

    #[Rule('required', message: 'Silakan isi Alamat.')]
    public $alamat = '';

    #[Rule('required', message: 'Silakan isi Nama Pemohon.')]
    public $pemohon;

    public $ketua_kelompok;

    public function render()
    {
        if ($formcat = FormulirFormat::where('slug', 'meninggal')->firstOrFail()) {
            return view('livewire.app.formulir-form-meninggal', [
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
            'nama_meninggal' => $this->nama_meninggal,
            'kelompok' => $this->kelompok,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'no_induk_gereja' => $this->no_induk_gereja,
            'alamat' => $this->alamat,
            'pemohon' => $this->pemohon,
            'ketua_kelompok' => $this->ketua_kelompok,
        ];
        Meninggal::create($data);

        session()->flash('message', 'Formulir BERHASIL dikirim.');
        session()->flash('theme', 'success');

        $this->redirectRoute('form-sent');
    }
}
