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

<div class="relative inline-block text-left">
  <!-- Trigger Button -->
  <button
    type="button"
    class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    id="menu-button"
    aria-expanded="true"
    aria-haspopup="true">
    Options
    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.233l3.71-3.992a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
    </svg>
  </button>

  <!-- Dropdown menu -->
  <div
    class="absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
    role="menu"
    aria-orientation="vertical"
    aria-labelledby="menu-button"
    tabindex="-1"
    id="dropdown-menu">
    <div class="py-1" role="none">
      <!-- Menu items -->
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Edit</a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Duplicate</a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Delete</a>
    </div>
  </div>
</div>
