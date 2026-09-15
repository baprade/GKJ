@props(['href', 'title'])
<a class="transition border-b border-transparent hover:text-black text-black hover:border-black ms-6" wire:navigate href="{{ $href }}">{{ $title }}</a>
