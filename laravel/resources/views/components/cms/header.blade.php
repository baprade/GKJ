<header class="sticky top-0 z-10 flex items-center justify-between px-4 py-1 bg-white shadow">
    <a class="md:hidden" href="{{ route('dashboard') }}" wire:navigate>
        <img class="h-6 text-xs" src="{{ route('images', config('app.logo')) }}" alt="{{ config('app.name') }}"/>
    </a>
    <div></div>
@auth
    <div class="flex items-center gap-4 sm:gap-6">
        <div class="flex items-center gap-2 cursor-pointer uk-navbar-toggle-animate md:hidden">
            <span uk-navbar-toggle-icon></span>
            <span class="text-sm text-black">Menu</span>
        </div>
        <div class="p-3 rounded-b-lg shadow uk-dropbar" uk-drop="animation: slide-top; animate-out: true; duration: 500; delay-hide: 500; offset: 8; pos: bottom-center;">
            <div class="flex flex-wrap justify-center gap-1">
                <x-cms.side-menu-list/>
            </div>
        </div>

        <div class="flex items-center gap-2 cursor-pointer">
            {{-- <img src="{{ Auth()->user()->avatar ?? null }}" alt="avatar" class="rounded-full w-7 h-7"> --}}
            <i class="text-2xl fa-regular fa-face-grin text-sky-600"></i>
            <div class="text-sm text-black">Hi, {{ explode(' ', Auth()->user()->name)[0] }}</div>
            <i class="text-xs fa-solid fa-chevron-down"></i>
        </div>
        <div uk-drop="animation: slide-top; animate-out: true; duration: 500; delay-hide: 500; offset: 3; pos: bottom-center;" class="p-3 rounded-b-lg shadow uk-dropbar">
            <div class="flex flex-col gap-1">
                {{-- <x-cms.header-drop-href href="{{ route('home') }}" title="Beranda" awesome="fa-solid fa-house" :active="request()->routeIs('home')"/> --}}
                <x-cms.header-drop-href href="{{ route('cms-account-edit') }}" title="Edit Akun" awesome="fa-solid fa-user" :active="request()->routeIs('cms-account-edit')"/>
                <x-cms.header-drop-href href="{{ route('cms-account-password-reset') }}" title="Reset Password" awesome="fa-solid fa-key" :active="request()->routeIs('cms-account-password-reset')"/>
                <x-cms.header-drop-href href="{{ route('logout') }}" title="Keluar" awesome="fa-solid fa-arrow-right-from-bracket" :active="request()->routeIs('logout')"/>
            </div>
        </div>
    </div>
@endauth
</header>
