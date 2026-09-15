@section('page_title', config('app.name').' | Login')
<div id="login" class="flex items-center justify-center text-center grow">
    <div class="flex flex-col items-center justify-center w-full h-full gap-4 px-8 py-10 text-black md:max-w-sm md:h-auto md:shadow md:rounded-md backdrop-blur bg-white/90">
        <a class="flex items-center gap-2 lg:gap-4" wire:navigate href="{{ route('home') }}">
            <img class="h-10 lg:h-14" src="{{ route('images', config('app.logo')) }}" alt="{{ config('app.name') }}">
            <span class="text-xl font-semibold">{{ config('app.name') }}</span>
        </a>

        <div class="font-semibold tracking-widest uppercase">Login</div>

        @error('noemail')
        <div class="w-full max-w-xs p-3 text-sm text-red-500 bg-white border border-red-400 rounded">
        {{ $message }}
        </div>
        @enderror

        @if (session()->has('message'))
        <div class="w-full max-w-xs">
            @if (session('theme') == 'warning')
                <x-cms.flash-warning message="{{ session('message') }}"/>
            @endif
            @if (session('theme') == 'success')
                <x-cms.flash-success message="{{ session('message') }}"/>
            @endif
        </div>
        @endif

        <div class="text-sm">Silakan ketik E-Mail dan Password.</div>

        <form wire:submit="login" class="flex flex-col w-full max-w-xs gap-4">
            @csrf
            <x-cms.label-input-text-form name="email" title="E-Mail"/>
            <x-cms.label-input-password-form name="password" title="Password"/>
            <div class="flex items-center gap-2">
                <input type="checkbox" wire:model="remember" class="w-5 h-5 cursor-pointer" name="remember" id="remember"/>
                <label for="remember" class="text-sm cursor-pointer">Ingat saya</label>
            </div>
            <x-cms.button-login/>
        </form>

        {{-- <div class="flex justify-between w-full">
            <div>
                Lupa Password
            </div>
            <div><a class="hover:text-black hover:underline" wire:navigate href="{{ route('register') }}">Register</a></div>
        </div> --}}
    </div>
</div>
