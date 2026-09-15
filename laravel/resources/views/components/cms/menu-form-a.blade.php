@props(['href', 'title', 'active' => false])

@php
$classes = ($active ?? false)
?
'
rounded
px-3 py-2
flex items-center gap-2
transition
focus:outline-none
text-black hover:text-black
border border-sky-400
bg-sky-100
text-sm
'
:
'
rounded
px-3 py-2
flex items-center gap-2
transition
focus:outline-none
text-black hover:text-black
border border-slate-300 hover:border-sky-400
hover:bg-sky-100
text-sm
'
;
@endphp

<a href="{{ $href ?? null }}" wire:navigate {{ $attributes->merge(['class' => $classes]) }}>{{ $title ?? null }}</a>
