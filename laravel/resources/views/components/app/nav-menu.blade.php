<nav class="relative w-full my-10 animated bounceInDown max-w-52 min-w-52">
    <ul class="flex flex-col gap-4 list-none">
        <li><a class="text-black uppercase transition border-b border-transparent hover:text-black hover:border-black" wire:navigate href="{{ route('home') }}">Beranda</a></li>
        <li><span class="flex justify-between text-black uppercase cursor-pointer hover:text-black" uk-toggle="target: #toggle-tentang; animation: uk-animation-slide-top-small;">Tentang<span class="text-sm fa fa-angle-down right"></span></span>
            <ul class="flex flex-col gap-2 mt-2" id="toggle-tentang" hidden>
@foreach ($abouts_array as $abouts_item)
                <li><x-app.sub-menu-a href="{{ url('tentang/'.$abouts_item->slug.'') }}" title="{{ $abouts_item->h1 }}"/></li>
@endforeach
            </ul>
        </li>
        <li><span class="flex justify-between text-black uppercase cursor-pointer hover:text-black" uk-toggle="target: #toggle-form; animation: uk-animation-slide-top-small;">Form<span class="text-sm fa fa-angle-down right"></span></span>
            <ul class="flex flex-col gap-2 mt-2" id="toggle-form" hidden>
@foreach ($formulirformats_array as $formulirformats_item)
                <li><x-app.sub-menu-a href="{{ url('form/'.$formulirformats_item->slug) }}" title="{{ $formulirformats_item->title }}"/></li>
@endforeach
            </ul>
        </li>
        <li><span class="flex justify-between text-black uppercase cursor-pointer hover:text-black" uk-toggle="target: #toggle-galeri; animation: uk-animation-slide-top-small;">Galeri<span class="text-sm fa fa-angle-down right"></span></span>
            <ul class="flex flex-col gap-2 mt-2" id="toggle-galeri" hidden>
                <li><x-app.sub-menu-a href="{{ url('galeri/foto') }}" title="Galeri Foto"/></li>
                <li><x-app.sub-menu-a href="{{ url('galeri/video') }}" title="Galeri Video"/></li>
            </ul>
        </li>
        <li><a class="text-black uppercase transition border-b border-transparent rounded hover:text-black hover:border-black" wire:navigate href="{{ route("berita") }}">Berita</a></li>
    </ul>
</nav>
