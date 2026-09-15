<?php

namespace App\Livewire\App;

use App\Models\FormulirFormat;
use App\Models\Registrasi;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormulirRegistrasi extends Component
{
    #[Rule('required', message: 'Silakan isi Nama.')]
    public $nama = '';

    #[Rule('required', message: 'Silakan isi Pepanthan/Kelompok.')]
    public $kelompok = '';

    #[Rule('required', message: 'Silakan isi Tempat Lahir.')]
    public $tempat_lahir = '';

    #[Rule('required', message: 'Silakan isi Tanggal Lahir.')]
    public $tanggal_lahir = '';

    #[Rule('required', message: 'Silakan isi Pekerjaan.')]
    public $pekerjaan = '';

    #[Rule('required', message: 'Silakan isi Alamat.')]
    public $alamat = '';

    public function render()
    {
        if ($formcat = FormulirFormat::where('slug', 'registrasi')->firstOrFail()) {
            return view('livewire.app.formulir-form-registrasi', [
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
            'nama' => $this->nama,
            'kelompok' => $this->kelompok,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
        ];
        Registrasi::create($data);

        session()->flash('message', 'Formulir BERHASIL dikirim.');
        session()->flash('theme', 'success');

        $this->redirectRoute('form-sent');
    }
}
