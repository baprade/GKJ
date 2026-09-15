@props(['href', 'title', 'awesome'])
<a
    wire:navigate
    href="{{ $href }}"
    class="flex items-center justify-center gap-2 px-3 py-1 text-black transition border rounded hover:text-white border-slate-300 hover:border-sky-500 hover:bg-sky-500 focus:outline-none"
>
    <i class="{{ $awesome }} text-sm"></i>
    <span class="text-xs uppercase">{{ $title }}</span>
</a>
