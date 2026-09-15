@props(['name', 'title', 'options'])

@php
$classes = '
    w-full
    bg-white
    border
    border-slate-300
    hover:border-slate-400
    focus:border-slate-500
    focus:shadow
    focus:outline-none
    rounded-md
    px-3
    py-2
    text-sm
';
@endphp

<div class="flex flex-col items-start">
{{-- <label for="{{ $name }}" class="text-sm leading-tight cursor-pointer text-start ps-2">{{ $title }}</label> --}}
<select id="{{ $name }}" wire:model.live="{{ $name }}" {{ $attributes->merge(['class' => $classes]) }}>
    <option value="0">Semua {{ $title }}</option>
    @foreach ($options as $item)
        <option value="{{ $item->id }}">{{ $item->title ?? $item->name ?? $item->number }}</option>
    @endforeach
</select>
</div>
