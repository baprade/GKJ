<?php

namespace App\Livewire\Cms;

use App\Models\Atestasi;
use App\Models\Baptis;
use App\Models\Kelahiran;
use App\Models\Meninggal;
use App\Models\Pengakuan;
use App\Models\Pernikahan;
use App\Models\Person;
use App\Models\Post;
use App\Models\Registrasi;
use App\Models\Sidi;
use App\Models\Titipwarga;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.cms')]

class Dashboard extends Component
{
    public function render()
    {
        $formulirCount = Atestasi::count() + Baptis::count() + Kelahiran::count() + Meninggal::count() + Pengakuan::count() + Pernikahan::count() + Registrasi::count() + Sidi::count() + Titipwarga::count();

        return view('livewire.cms.dashboard', [
            'page_title' => 'Dashboard',

            'beritaCount' => Post::where('id_format', 2)->where('onoff', 1)->count(),
            'galfotoCount' => Post::where('id_format', 3)->where('onoff', 1)->count(),
            'galvideoCount' => Post::where('id_format', 4)->where('onoff', 1)->count(),
            'jemaatCount' => Person::count(),
            'formulirCount' => $formulirCount,

        ]);
    }
}
