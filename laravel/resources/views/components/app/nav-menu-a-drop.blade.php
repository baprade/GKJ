@props(['href', 'title'])
<a class="transition border-b font-semibold border-transparent hover:text-black text-black hover:border-black" wire:navigate href="{{ $href }}">{{ $title }}</a>
