@section('page_title', $page_title)
<div class="flex flex-col gap-4 p-6 grow sm:p-10 sm:gap-6">
    <div class="text-3xl font-medium uppercase cinzel">{{ $page_title }}</div>

    <div class="flex items-center gap-4">
        <div class="text-xl font-semibold">#{{ $tags }}</div>
    </div>

    <div class="flex flex-col gap-4">
@foreach ($items as $item)
        <a href="{{ url($item->format->slug.'/'.$item->id.'/'.$item->slug) }}" wire:navigate class="flex gap-4 text-start href-border-h1">
            <span class="min-w-16 max-w-16">@if (! empty($item->photo_file))
                <img src="{{ asset('posts/'.substr($item->created_at,0,4).'/thumb/'.$item->photo_file) }}" alt="pic" class="object-cover w-16 h-12 text-xs rounded"/>
            @else
                @if (! empty($item->youtube))
                    <img src="https://i.ytimg.com/vi/{{ $item->youtube }}/mqdefault.jpg" alt="pic" class="object-cover w-16 h-12 text-xs rounded"/>
                @else
                    <img src="{{ asset('images/'.config('app.image')) }}" alt="pic" class="object-cover w-16 h-12 text-xs rounded"/>
                @endif
            @endif</span>
            <span class="flex flex-col gap-1">
                <span class="pb-1 font-semibold leading-tight h1">{{ $item->h1 }}</span>
                <span class="flex gap-4">
                    <x-app.clock created_at="{{ $item->created_at }}"/>
                    <x-app.views views="{{ $item->views }}"/>
                    <x-app.comments comments="{{ $item->comments }}"/>
                </span>
            </span>
        </a>
@endforeach
    </div>

    <div class="w-full">{{ $items->links() }}</div>
</div>
