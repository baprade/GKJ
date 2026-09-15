@props(['name', 'title'])

@php
$classes = '
    w-full
    bg-white
    border
    border-slate-300
    hover:border-slate-400
    focus:border-slate-500
    focus:outline-none
    rounded
    px-3
    py-2
';
@endphp
@error('form.'.$name.'')
@php
$classes = '
    w-full
    bg-white
    border
    border-red-300
    hover:border-red-400
    focus:border-red-500
    focus:outline-none
    rounded
    px-3
    py-2
';
@endphp
@enderror

<div class="flex flex-col items-start">
<label for="{{ $name }}" class="px-3 text-sm font-semibold cursor-pointer text-start">{{ $title }}</label>
<input id="{{ $name }}" type="text" wire:model.blur="form.{{ $name }}" {{ $attributes->merge(['class' => $classes]) }} autocomplete="off" />
@error('form.'.$name.'')
<div class="px-3 text-sm text-left text-red-500">{{ $message }}</div>
@enderror
</div>
