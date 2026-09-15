@props(['title', 'amount'])
<div class="flex flex-col justify-center text-black bg-white divide-y rounded shadow-md divide-slate-200">
    <div class="flex justify-between w-full px-3 py-3 bg-slate-50">
        <div class="text-xs font-medium leading-none uppercase">{{ $title }}</div>
        {{-- <span class="text-xs"></span> --}}
    </div>
    <div class="w-full p-3 text-lg font-semibold text-center">{{ number_format($amount, 0, ',', '.') }}</div>
</div>
