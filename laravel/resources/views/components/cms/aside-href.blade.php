@props(['href', 'title', 'active' => false, 'awesome'])

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
'
;
@endphp

<a href="{{ $href ?? null }}" wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    <i class="{{ $awesome ?? null }} w-3 lg:w-5 flex justify-center"></i>
    <span class="text-sm">{{ $title ?? null }}</span>
</a>
