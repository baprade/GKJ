@php
$classes = '
    bg-white
    border
    border-slate-300
    hover:border-slate-400
    focus:border-slate-500
    focus:shadow
    focus:outline-none
    rounded
    px-3
    py-2
';
@endphp
@error('form.onoff')
@php
$classes = '
    bg-red-50
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
<label for="onoff" class="px-3 text-sm font-semibold cursor-pointer text-start">Publish</label>
<select id="onoff" wire:model.blur="form.onoff" {{ $attributes->merge(['class' => $classes]) }}>
    <option value="0">Off</option>
    <option value="1">ONLINE</option>
</select>
@error('form.onoff')
<div class="text-sm text-left text-red-500">{{ $message }}</div>
@enderror
</div>
