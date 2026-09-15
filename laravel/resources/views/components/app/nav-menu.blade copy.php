<x-app.nav-menu-a href="{{ route('home') }}" title="Beranda"/>

<a class="transition border-b border-transparent hover:text-black hover:border-black" href="#" title="Tentang Kami">Tentang <i class="fa-solid fa-chevron-down text-xs"></i></a>
<div uk-drop="animation: slide-top; animate-out: true; duration: 500; delay-hide: 500; offset: 3; pos: bottom-center;" class="p-4 rounded-b-lg shadow uk-dropbar">
    <div class="flex flex-col items-start gap-1">
@foreach ($abouts_array as $abouts_item)
        <x-app.nav-menu-a href="{{ url('tentang/'.$abouts_item->slug.'') }}" title="{{ $abouts_item->h1 }}"/>
@endforeach
    </div>
</div>

{{-- <x-app.nav-menu-a href="{{ route('baptisan') }}" title="Baptisan"/>
<x-app.nav-menu-a href="{{ route('atestasi') }}" title="Atestasi / Perpindahan Jemaat"/>
<x-app.nav-menu-a href="{{ route('pemberkatan') }}" title="Pemberkatan Pernikahan"/> --}}
<x-app.nav-menu-a href="{{ route('form') }}" title="Form"/>
<x-app.nav-menu-a href="{{ route('galeri') }}" title="Galeri"/>
<x-app.nav-menu-a href="{{ route('berita') }}" title="Berita"/>
<ul class="max-w-60 w-full bg-red-500" uk-accordion="multiple: true">
    <li>
        <a class="uk-accordion-title text-base text-black font-bold w-full" href>Tentang</a>
        <div class="uk-accordion-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title" href>Menu</a>
        <div class="uk-accordion-content">
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit.</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title" href>Galeri</a>
        <div class="uk-accordion-content">
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
        </div>
    </li>
    <li>
        <a class="text-xl" href="{{ route('berita') }}">Berita</a>
    </li>
</ul>
<div class="flex h-screen">
  <!-- Sidenav -->
  <nav class="bg-gray-800 w-64 space-y-2 p-4 text-white">
    <div>
      <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">
        Home
      </a>
    </div>
    <div class="dropdown">
      <button class="dropdown-toggle w-full text-left py-2 px-4 flex items-center justify-between rounded hover:bg-gray-700">
        Dropdown
        <svg class="w-4 h-4 transition-transform transform rotate-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
      <div class="dropdown-menu hidden mt-2 space-y-1 pl-4">
        <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">
          Submenu 1
        </a>
        <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">
          Submenu 2
        </a>
        <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">
          Submenu 3
        </a>
      </div>
    </div>
    <div>
      <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">
        About
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="flex-1 p-4">
    <h1 class="text-xl">Main Content</h1>
  </main>
</div>
<style>
  .dropdown-menu {
    transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $('.dropdown-toggle').on('click', function () {
      // Toggle dropdown visibility
      $(this).next('.dropdown-menu').toggleClass('hidden');
      // Rotate arrow icon
      $(this).find('svg').toggleClass('rotate-180');
    });
  });
</script>
