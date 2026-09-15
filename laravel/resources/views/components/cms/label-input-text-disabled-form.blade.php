@props(['name', 'title'])

@php
$classes = '
    w-full
    bg-slate-100
    text-slate-500
    font-light
    text-sm
    border border-slate-300
    rounded
    px-3
    py-2
';
@endphp

<div class="flex flex-col items-start">
<label for="{{ $name }}" class="px-3 text-sm font-semibold cursor-pointer text-start">{{ $title }}</label>
<input id="{{ $name }}" type="text" disabled wire:model="form.{{ $name }}" {{ $attributes->merge(['class' => $classes]) }} autocomplete="off" />
</div>
