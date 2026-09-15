@props(['href', 'icon'])
<a href="{{ $href }}" target="_blank" aria-label="{{ $icon }}"
    class="flex items-center justify-center text-black transition border border-transparent rounded-full w-9 h-9 hover:border-sky-300 hover:bg-white hover:text-black"
><span uk-icon="icon: {{ $icon }}; ratio: .75" alt="{{ $icon }}"></span></a>
