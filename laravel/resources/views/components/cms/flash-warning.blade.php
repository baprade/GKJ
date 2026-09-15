@props(['message'])

<div class="flex items-center gap-2 py-2 pl-3 pr-5 transition bg-yellow-100 border-l-4 border-yellow-500 rounded" role="alert">
    <i class="text-xl text-yellow-500 fa-solid fa-triangle-exclamation"></i>
    <span class="text-sm leading-tight text-left text-yellow-700">{{ $message }}</span>
</div>
