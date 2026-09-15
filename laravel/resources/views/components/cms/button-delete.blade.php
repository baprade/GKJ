@props(['item'])
<button
    wire:click="delete({{ $item->id }})"
    wire:confirm="Hapus?\n{{ $item->name ?? $item->purchase_list_id }}"
    class="flex items-center justify-center w-8 h-8 mx-auto text-red-600 bg-white rounded-full focus:outline-none hover:bg-red-500 hover:text-white"
><i class="fa-regular fa-trash-can"></i></button>
