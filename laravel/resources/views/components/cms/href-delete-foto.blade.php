@props(['item'])

<span
    wire:click="deleteFoto({{ $item->id }})"
    wire:confirm="Hapus Foto Ini?"
    class="inline-flex items-center justify-center text-red-600 bg-white border border-red-500 rounded-full cursor-pointer  w-7 h-7 hover:bg-red-500 hover:text-white"
><i class="fa-regular fa-trash-can"></i></span>
