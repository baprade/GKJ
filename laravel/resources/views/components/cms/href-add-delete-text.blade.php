@props(['href', 'title'])
<a
    wire:navigate
    href="{{ $href }}"
    class="flex items-center justify-center gap-2 px-3 py-1 transition bg-white border rounded-md border-sky-400 hover:border-sky-500 hover:bg-sky-500 text-sky-600 hover:text-white focus:outline-none"
>
    <i class="text-xl fa-solid fa-plus-minus"></i>
    <span class="text-sm font-medium">{{ $title }}</span>
</a>
