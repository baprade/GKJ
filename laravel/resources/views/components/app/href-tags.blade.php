@props(['href', 'active' => false, 'title'])

<a href="{{ $href }}" wire:navigate
    class="
        px-3 py-2 rounded
        border border-sky-600 hover:border-sky-600
        bg-white hover:bg-sky-600
        flex justify-center items-center
        font-semibold text-sm text-sky-700 hover:text-white
    "
>{{ $title }}</a>
