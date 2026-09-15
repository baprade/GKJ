<?php

namespace App\Livewire\Cms;

use App\Models\Atestasi;
use App\Models\Baptis;
use App\Models\Kelahiran;
use App\Models\Meninggal;
use App\Models\Pengakuan;
use App\Models\Pernikahan;
use App\Models\Registrasi;
use App\Models\Sidi;
use App\Models\Titipwarga;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.cms')]

class FormulirIndex extends Component
{
    public function render()
    {
        return view('livewire.cms.formulir-index', [
            'page_title' => 'Formulir',
            'href_create' => 'cms-forms-create',
            'href_edit' => 'cms-forms-edit',
            'awesome' => 'fa-solid fa-file-arrow-down',
            'AtestasiCount' => Atestasi::count(),
            'BaptisCount' => Baptis::count(),
            'KelahiranCount' => Kelahiran::count(),
            'MeninggalCount' => Meninggal::count(),
            'PengakuanCount' => Pengakuan::count(),
            'PernikahanCount' => Pernikahan::count(),
            'RegistrasiCount' => Registrasi::count(),
            'SidiCount' => Sidi::count(),
            'TitipwargaCount' => Titipwarga::count(),
        ]);
    }
}
