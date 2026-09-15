@props(['title'])
<button type="submit" class="flex items-center justify-center w-32 h-10 gap-2 text-white transition rounded bg-sky-500 hover:bg-sky-600">
    <i wire:loading.remove class="text-xl fa-solid fa-check-to-slot"></i>
    <span wire:loading.remove class="text-sm font-semibold uppercase">{{ $title }}</span>
    <i wire:loading class="text-xl fa-solid fa-spinner fa-spin"></i>
</button>
