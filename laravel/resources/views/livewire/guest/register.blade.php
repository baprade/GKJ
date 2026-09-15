@section('page_title', config('app.name').' | Register')
<div id="register" class="flex items-center justify-center text-center grow">
    <div class="flex flex-col items-center justify-center w-full h-full gap-4 px-8 py-10 text-black md:max-w-sm md:h-auto md:shadow md:rounded-md backdrop-blur bg-white/90">
        <a class="flex items-center justify-center gap-2 hover:text-black" wire:navigate href="{{ route('home') }}">
            <img class="h-12 text-xs" src="{{ asset('images/jdihn.webp') }}" alt="{{ config('app.name') }}"/>
            <img class="h-12 text-xs" src="{{ asset('images/dprd-kota-bandung.webp') }}" alt="{{ config('app.name') }}"/>
        </a>

        <div class="font-semibold tracking-widest uppercase">Register</div>

        <div class="text-sm">Isilah alamat E-Mail yang valid supaya bisa digunakan saat Login dengan Google.</div>

        <form wire:submit="save" class="flex flex-col w-full max-w-xs gap-4">
            @csrf
            <x-cms.label-input-text-form name="name" title="Nama"/>
            <x-cms.label-input-text-form name="email" title="E-Mail"/>
            <x-cms.label-input-password-form name="password" title="Password"/>
            <x-cms.label-input-password-form name="password_confirm" title="Password"/>
            <x-cms.button-register/>
        </form>

        {{-- <div class="flex justify-between w-full">
            <div></div>
            <div><a class="hover:text-black hover:underline" wire:navigate href="{{ route('login') }}">Login</a></div>
        </div> --}}
    </div>
</div>
