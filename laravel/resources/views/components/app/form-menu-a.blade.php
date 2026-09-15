@props(['href', 'title'])
<a class="transition border-b border-transparent hover:text-black text-black hover:border-black" wire:navigate href="{{ $href }}">{{ $title }}</a>
