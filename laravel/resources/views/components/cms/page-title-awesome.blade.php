@props(['title', 'awesome'])
<div class="flex items-center gap-2 text-black">
    <i class="{{ $awesome ?? null }} text-xl"></i>
    <span class="text-sm font-semibold tracking-widest uppercase">{{ $title ?? null }}</span>
</div>
