@props(['closeModal'])
<button type="button" wire:click="{{ $closeModal }}()"
    class="flex items-center justify-center gap-2 px-3 py-1 text-black transition border rounded hover:text-white border-slate-300 hover:border-sky-500 hover:bg-sky-500 focus:outline-none"
>
    <span class="text-sm">Batal</span>
</button>
