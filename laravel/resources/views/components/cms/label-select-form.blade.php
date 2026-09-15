@props(['name', 'title', 'options'])

@php
$classes = '
    bg-white
    border
    border-slate-300
    hover:border-slate-400
    focus:border-slate-500
    focus:outline-none
    rounded
    px-2
    py-2
';
@endphp
@error('form.'.$name.'')
@php
$classes = '
    bg-white
    border
    border-red-300
    hover:border-red-400
    focus:border-red-500
    focus:outline-none
    rounded
    px-2
    py-2
';
@endphp
@enderror

<div class="flex flex-col items-start">
<label for="{{ $name }}" class="px-3 text-sm font-semibold cursor-pointer text-start">{{ $title }}</label>
<select id="{{ $name }}" wire:model.live="form.{{ $name }}" {{ $attributes->merge(['class' => $classes]) }}>
    <option value="0">-</option>
    @foreach ($options as $item)
        <option value="{{ $item->id }}">{{ $item->title ?? $item->name ?? $item->number ?? $item->order_list_id ?? $item->description }}</option>
    @endforeach
</select>
@error('form.'.$name.'')
<div class="px-3 text-sm text-left text-red-500">{{ $message }}</div>
@enderror
</div>
