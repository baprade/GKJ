<?php

namespace App\Livewire\App;

use App\Models\FormulirFormat;
use App\Models\Pengakuan;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormulirPengakuan extends Component
{
    #[Rule('required', message: 'Silakan isi Nama.')]
    public $nama = '';

    #[Rule('required', message: 'Silakan isi Umur.')]
    public $umur = '';

    #[Rule('required', message: 'Silakan isi Alamat.')]
    public $alamat = '';

    #[Rule('required', message: 'Silakan isi Kelompok.')]
    public $kelompok = '';

    #[Rule('required', message: 'Silakan isi Penjelasan Pengakuan.')]
    public $penjelasan = '';

    #[Rule('required', message: 'Silakan isi Majelis Pembina Kelompok.')]
    public $majelis_pembina_kelompok = '';

    public function render()
    {
        if ($formcat = FormulirFormat::where('slug', 'pengakuan')->firstOrFail()) {
            return view('livewire.app.formulir-form-pengakuan', [
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
            'umur' => $this->umur,
            'alamat' => $this->alamat,
            'kelompok' => $this->kelompok,
            'penjelasan' => $this->penjelasan,
            'majelis_pembina_kelompok' => $this->majelis_pembina_kelompok,
        ];
        Pengakuan::create($data);

        session()->flash('message', 'Formulir BERHASIL dikirim.');
        session()->flash('theme', 'success');

        $this->redirectRoute('form-sent');
    }
}
