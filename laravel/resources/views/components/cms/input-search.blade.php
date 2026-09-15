<div class="relative">
    <input wire:model.live.debounce.500ms="search" placeholder="Pencarian.."
        class="w-full py-2 text-sm text-black bg-white border rounded ps-7 border-slate-300 hover:border-slate-400 focus:border-slate-500 focus:outline-none"
    />
    <div class="absolute top-2 left-2"><i class="fa-solid fa-magnifying-glass text-slate-500"></i></div>
    <button type="button" wire:click="clearInputSearch"
        class="absolute top-0 bottom-0 right-0 px-2 py-0 bg-transparent border-0 cursor-pointer focus:outline-none"
    ><i class="fa-regular fa-circle-xmark text-slate-400"></i></button>
</div>
