@props(['href', 'title', 'active' => false, 'awesome'])

@php
$classes = ($active ?? false)
?
'
rounded
flex items-center gap-2
px-2 py-1
transition
focus:outline-none
text-black hover:text-black
border border-sky-400
bg-sky-100
'
:
'
rounded
flex items-center gap-2
px-2 py-1
transition
focus:outline-none
text-black hover:text-black
border border-slate-300 hover:border-sky-400
hover:bg-sky-100
'
;
@endphp

<a href="{{ $href ?? null }}" wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    <i class="{{ $awesome }} flex justify-center text-sm w-4"></i>
    <span class="text-sm">{{ $title ?? null }}</span>
</a>
