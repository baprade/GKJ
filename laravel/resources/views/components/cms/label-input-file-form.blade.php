@props(['name', 'title'])

<div class="flex flex-col items-start gap-1">
<label for="{{ $name }}" class="px-3 text-sm font-semibold cursor-pointer text-start">{{ $title }}</label>
<input id="{{ $name }}" type="file" wire:model.blur="form.{{ $name }}" autocomplete="off" class="text-sm"/>
<div class="px-3 text-xs text-sky-600 text-start">Ukuran File Maximal 2MB</div>
</div>
