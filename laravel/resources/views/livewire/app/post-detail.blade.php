<div id="detail" class="flex flex-col gap-4 p-6 sm:gap-6 sm:p-10 grow">
    <div class="text-2xl font-semibold uppercase cinzel">{{ $item->format->title ?? '-' }}</div>
    <x-app.post-detail-head :item="$item"/>
    <x-app.post-detail-body :item="$item" :photos="$photos"/>
</div>
