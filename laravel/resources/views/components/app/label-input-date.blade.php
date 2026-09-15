@props(['name', 'title'])

@php
$classes = '
    bg-white
    border
    border-slate-300
    hover:border-slate-400
    focus:border-slate-500
    focus:outline-none
    rounded-md
    px-3
    py-2
';
@endphp
@error($name)
@php
$classes = '
    bg-white
    border
    border-red-300
    hover:border-red-400
    focus:border-red-500
    focus:outline-none
    rounded-md
    px-3
    py-2
';
@endphp
@enderror

<div class="flex flex-col items-start">
<label for="{{ $name }}" class="px-3 text-sm font-semibold cursor-pointer text-start">{{ $title }}</label>
<input id="{{ $name }}" type="date" wire:model.blur="{{ $name }}" {{ $attributes->merge(['class' => $classes]) }} autocomplete="off" />
@error($name)
<div class="px-3 text-sm text-left text-red-500">{{ $message }}</div>
@enderror
</div>
