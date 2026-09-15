@props(['created_at'])
<span class="flex items-center gap-1 text-sky-700">
    <i class="fa-regular fa-clock text-sm"></i>
    <span class="text-xs text-start leading-none">{{ \Carbon\Carbon::parse($created_at)->locale('id_ID')->diffForHumans() }}</span>
</span>
