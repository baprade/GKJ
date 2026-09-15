@props(['views'])
@if (! empty($views))
<span class="flex items-center gap-1 text-sky-700">
    <i class="fa-regular fa-eye text-sm"></i>
    <span class="text-xs text-start">{{ $views }}</span>
</span>
@endif
