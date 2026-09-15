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

<nav class='animated bounceInDown relative w-full max-w-80'>
    <ul class=" list-none">
        <li><a href="{{ route('home') }}">Beranda</a></li>
        <li class='sub-menu'><a href="">Tentang<div class='fa fa-angle-down right'></div></a>
            <ul>
                <li><a href="">Account</a></li>
                <li><a href="">Profile</a></li>
                <li><a href="">Secruity &amp; Privacy</a></li>
                <li><a href="">Password</a></li>
                <li><a href="">Notification</a></li>
            </ul>
        </li>
        <li class='sub-menu'><a href="">Form<div class='fa fa-angle-down right'></div></a>
            <ul>
                <li><a href="">FAQ's</a></li>
                <li><a href="">Submit a Ticket</a></li>
                <li><a href="">Network Status</a></li>
            </ul>
        </li>
        <li class='sub-menu'><a href="">Galeri<div class='fa fa-angle-down right'></div></a>
            <ul>
                <li><a href="">Submit a Ticket</a></li>
                <li><a href="">Network Status</a></li>
            </ul>
        </li>
        <li><a href="{{ route('berita') }}">Berita</a></li>
    </ul>
</nav>
<style>
nav {
    /* position: relative; */
    /* margin: 50px; */
    /* width: 360px; */
}
nav ul {
    /* list-style: none; */
    /* margin: 0; */
    /* padding: 0; */
}
nav ul li {
/* Sub Menu */
}
nav ul li a {
    display: block;
    background: #ebebeb;
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
    -webkit-transition: 0.2s linear;
    -moz-transition: 0.2s linear;
    -ms-transition: 0.2s linear;
    -o-transition: 0.2s linear;
    transition: 0.2s linear;
}
nav ul li a:hover {
    background: #f8f8f8;
    color: #515151;
}
nav ul li a .fa {
    width: 16px;
    text-align: center;
    margin-right: 5px;
    float:right;
}
nav ul ul {
    background-color:#ebebeb;
}
nav ul li ul li a {
    background: #f8f8f8;
    border-left: 4px solid transparent;
    padding: 10px 20px;
}
nav ul li ul li a:hover {
    background: #ebebeb;
    border-left: 4px solid #3498db;
}
</style>
<script>
$('.sub-menu ul').hide();
$(".sub-menu a").click(function () {
    $(this).parent(".sub-menu").children("ul").slideToggle("100");
    $(this).find(".right").toggleClass("fa-angle-up fa-angle-down");
});
</script>
