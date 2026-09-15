@props(['item_id'])
<button
    wire:click="edit({{ $item_id }})"
    class="
        focus:outline-none
        flex justify-center items-center
        w-8 h-8
        rounded-full
        border border-sky-500
        bg-white hover:bg-sky-500
        text-sky-600 hover:text-white
        mx-auto
    "
><i class="fa-solid fa-pencil"></i></button>
