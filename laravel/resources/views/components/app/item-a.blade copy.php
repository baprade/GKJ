<a href="{{ url(($item->format->slug ?? null).'/'.$item->id.'/'.$item->slug) }}" wire:navigate class="flex gap-4 sm:gap-6 text-start href-border-h1">
    <span class="w-1/3 md:w-1/4 lg:w-1/3 xl:w-1/4">@if (! empty($item->photo_file))
        <img src="{{ asset('posts/'. substr($item->created_at,0,4) .'/medium/'.$item->photo_file) }}" alt="pic" class="text-xs w-full h-28 md:h-32 object-cover rounded"/>
    @else
        @if (! empty($item->youtube))
            <img src="https://i.ytimg.com/vi/{{ $item->youtube }}/mqdefault.jpg" alt="pic" class="text-xs w-full h-28 md:h-32 object-cover rounded"/>
        @else
            <img src="{{ asset('images/'.config('app.image')) }}" alt="pic" class="text-xs w-full h-28 md:h-32 object-cover rounded"/>
        @endif
    @endif</span>
    <span class="w-2/3 md:w-3/4 lg:w-2/3 xl:w-3/4 flex flex-col gap-1">
        <span class="sm:text-lg lg:text-xl font-semibold leading-tight sm:leading-tight lg:leading-tight h1 pb-2">{{ $item->h1 }}</span>
        @if (! empty($item->h2))
        <span class="text-sm hidden md:block">{{ $item->h2 }}</span>
        @endif
        <span class="flex gap-4 mt-1">
            <x-app.clock created_at="{{ $item->created_at }}"/>
            <x-app.views views="{{ $item->views }}"/>
            <x-app.comments comments="{{ $item->comments }}"/>
        </span>
    </span>
</a>
