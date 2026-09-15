@props(['comments'])
@if (! empty($comments))
<span class="flex items-center gap-1 text-sky-700">
    <i class="fa-regular fa-comment text-sm"></i>
    <span class="text-xs text-start">{{ $comments }}</span>
</span>
@endif
