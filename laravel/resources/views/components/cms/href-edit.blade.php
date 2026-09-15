@props(['href'])
<a href="{{ $href }}"
    wire:navigate
    class="flex items-center justify-center w-8 h-8 mx-auto bg-white border rounded-full focus:outline-none border-sky-400 hover:border-sky-500 hover:bg-sky-500 text-sky-600 hover:text-white"
><i class="fa-solid fa-pencil"></i></a>
