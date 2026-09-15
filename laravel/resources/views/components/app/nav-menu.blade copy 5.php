<nav class="animated bounceInDown relative w-full max-w-52 min-w-52 my-10">
    <ul class="list-none flex flex-col gap-4">
        <li><a class="uppercase text-black hover:text-black transition border-b border-transparent hover:border-black" href="{{ route('home') }}">Beranda</a></li>
        <li class="sub-menu"><a class="uppercase flex justify-between text-black hover:text-black" >Tentang<span class="text-sm fa fa-angle-down right"></span></a>
            <ul class="flex flex-col gap-2 mt-2">
@foreach ($abouts_array as $abouts_item)
                <li><x-app.sub-menu-a href="{{ url('tentang/'.$abouts_item->slug.'') }}" title="{{ $abouts_item->h1 }}"/></li>
@endforeach
            </ul>
        </li>
        <li class="sub-menu"><a class="flex justify-between uppercase text-black hover:text-black" >Form<span class="text-sm fa fa-angle-down right"></span></a>


            <ul class="flex flex-col gap-2 mt-2">
                <li><x-app.sub-menu-a href="{{ url('form/registrasi') }}" title="Pengajuan Registrasi"/></li>
                <li><x-app.sub-menu-a href="{{ url('form/kelahiran') }}" title="Kelahiran"/></li>
                <li><x-app.sub-menu-a href="{{ url('form/meninggal') }}" title="Meninggal"/></li>
                <li><x-app.sub-menu-a href="{{ url('form/titip-warga') }}" title="Titip Warga"/></li>
                <li><x-app.sub-menu-a href="{{ url('form/atestasi') }}" title="Atestasi"/></li>
                <li><x-app.sub-menu-a href="{{ url('form/pengakuan') }}" title="Pengakuan Dosa"/></li>
                <li><x-app.sub-menu-a href="{{ url('form/pernikahan') }}" title="Pernikahan"/></li>
                <li><x-app.sub-menu-a href="{{ url('form/baptis') }}" title="Baptis Anak"/></li>
                <li><x-app.sub-menu-a href="{{ url('form/sidi') }}" title="Sidi"/></li>
            </ul>
        </li>
        <li class="sub-menu"><a class="flex justify-between uppercase text-black hover:text-black" >Galeri<span class="text-sm fa fa-angle-down right"></span></a>
            <ul class="flex flex-col gap-2 mt-2">
                <li><x-app.sub-menu-a href="{{ url('galeri/foto') }}" title="Galeri Foto"/></li>
                <li><x-app.sub-menu-a href="{{ url('galeri/video') }}" title="Galeri Video"/></li>
            </ul>
        </li>
        <li><a class="uppercase text-black hover:text-black transition border-b border-transparent hover:border-black" href="{{ route('berita') }}">Berita</a></li>
    </ul>
</nav>
