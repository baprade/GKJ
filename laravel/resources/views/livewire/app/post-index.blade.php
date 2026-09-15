@section('page_title', $page_title)
<div class="flex flex-col gap-4 p-6 grow sm:p-10 sm:gap-6">
    <div class="text-3xl font-medium uppercase cinzel">{{ $page_title }}</div>

    <div class="grid gap-6 sm:grid-cols-2 2xl:grid-cols-3 sm:gap-10">
@foreach ($items as $item)
        <x-app.item-a :item="$item"/>
@endforeach
    </div>

    <div class="w-full">{{ $items->links() }}</div>
</div>
