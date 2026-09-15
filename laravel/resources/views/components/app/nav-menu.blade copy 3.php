<x-app.nav-menu-a href="{{ route('home') }}" title="Beranda"/>

<x-app.nav-menu-span title="Tentang +"/>
<div uk-drop="animation: slide-top; animate-out: true; duration: 500; delay-hide: 500; offset: 3; pos: bottom-center;" class="p-3 rounded-b-lg shadow uk-dropbar">
    <div class="flex flex-col items-center gap-2">
@foreach ($abouts_array as $abouts_item)
        <x-app.nav-menu-a-drop href="{{ url('tentang/'.$abouts_item->slug.'') }}" title="{{ $abouts_item->h1 }}"/>
@endforeach
    </div>
</div>

<x-app.nav-menu-span title="Form +"/>
<div uk-drop="animation: slide-top; animate-out: true; duration: 500; delay-hide: 500; offset: 3; pos: bottom-center;" class="p-3 rounded-b-lg shadow uk-dropbar">
    <div class="flex flex-col items-center gap-2">
        <x-app.form-menu-a href="{{ url('form/registrasi') }}" title="Pengajuan Registrasi"/>
        <x-app.form-menu-a href="{{ url('form/kelahiran') }}" title="Kelahiran"/>
        <x-app.form-menu-a href="{{ url('form/meninggal') }}" title="Meninggal"/>
        <x-app.form-menu-a href="{{ url('form/titip-warga') }}" title="Titip Warga"/>
        <x-app.form-menu-a href="{{ url('form/atestasi') }}" title="Atestasi"/>
        <x-app.form-menu-a href="{{ url('form/pengakuan') }}" title="Pengakuan Dosa"/>
        <x-app.form-menu-a href="{{ url('form/pernikahan') }}" title="Pernikahan"/>
        <x-app.form-menu-a href="{{ url('form/baptis') }}" title="Baptis Anak"/>
        <x-app.form-menu-a href="{{ url('form/sidi') }}" title="Sidi"/>
    </div>
</div>

<x-app.nav-menu-span title="Galeri +"/>
<div uk-drop="animation: slide-top; animate-out: true; duration: 500; delay-hide: 500; offset: 3; pos: bottom-center;" class="p-3 rounded-b-lg shadow uk-dropbar">
    <div class="flex flex-col items-center gap-2">
        <x-app.nav-menu-a-drop href="{{ url('galeri/foto') }}" title="Galeri Foto"/>
        <x-app.nav-menu-a-drop href="{{ url('galeri/video') }}" title="Galeri Video"/>
    </div>
</div>

<x-app.nav-menu-a href="{{ route('berita') }}" title="Berita"/>
