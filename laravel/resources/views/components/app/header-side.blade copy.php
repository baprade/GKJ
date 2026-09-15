<div id="header-side" class="px-5 py-3 border-b lg:border-r lg:border-b-0 lg:p-8 lg:h-full bg-neutral-100 border-neutral-200 min-w-80 overflow-auto">
    <div class="flex items-center justify-between lg:flex-col lg:h-full">
        <div>
            <a class="flex items-center gap-2 lg:gap-4" wire:navigate href="{{ route('home') }}">
                <img class="h-10 lg:h-14" src="{{ route('images', config('app.logo')) }}" alt="{{ config('app.name') }}">
                <span class="text-xl font-semibold cinzel">{{ config('app.name') }}</span>
            </a>

            <div class="hidden lg:block">
                <div class="flex flex-col items-center gap-y-6">
                    <x-app.nav-menu-pc/>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-2 text-black cursor-pointer uk-navbar-toggle-animate lg:hidden">
            <span uk-navbar-toggle-icon></span>
            <span class="hidden text-sm sm:block">Menu</span>
        </div>
        <div class="p-4 bg-white shadow-md uk-dropbar backdrop-blur"
            uk-drop="animation: slide-top; animate-out: true; duration: 500; delay-hide: 500; offset: 20; pos: bottom-center;">
            <div class="flex flex-wrap items-start justify-center gap-x-5 gap-y-2">
                <x-app.nav-menu-mb/>
            </div>
        </div>

        <div class="hidden lg:block">
            <x-app.footer/>
        </div>
    </div>
</div>
