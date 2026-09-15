@props(['message'])

<div class="flex items-center gap-2 py-2 pl-3 pr-5 transition border-l-4 rounded bg-emerald-100 border-emerald-500 text-emerald-500" role="alert">
    <i class="text-xl fa-solid fa-circle-check text-emerald-500"></i>
    <span class="text-sm leading-tight text-left text-emerald-700">{{ $message }}</span>
</div>
