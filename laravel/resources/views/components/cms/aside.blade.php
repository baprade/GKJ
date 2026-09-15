<aside id="aside" class="z-10 flex-col hidden gap-4 px-2 py-4 overflow-y-auto bg-white shadow lg:px-3 md:flex min-w-36 lg:min-w-40 xl:min-w-44">
    <a class="flex flex-col items-center justify-center gap-2 hover:text-black" wire:navigate href="{{ route('dashboard') }}">
        <span class="flex items-center gap-2">
            <img class="h-10 lg:h-14" src="{{ route('images', config('app.logo')) }}" alt="{{ config('app.name') }}">
        </span>
        <span class="font-bold">{{ config('app.name') }}</span>
    </a>

    <div class="flex flex-col gap-1"><x-cms.side-menu-list/></div>
</aside>
