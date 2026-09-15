<div id="news" class="grid gap-4 px-6 mx-auto lg:gap-6 lg:px-8 max-w-7xl">
    <div class="text-lg font-semibold text-center text-black uppercase cinzel lg:text-xl">
        <div class="sec-title">Berita</div>
    </div>
    <div class="grid gap-6 lg:gap-8 lg:grid-cols-3 sm:grid-cols-2 img-scale-hover">
@if ($news->isNotEmpty())
    @foreach ($news as $item)
        <div>
            <a class="flex flex-col gap-4 hover:text-black" href="{{ route('berita-detail-slug', ['id' => $item->id, 'slug' => $item->slug]) }}">
                <span class="overflow-hidden rounded-lg aspect-video">

                @if (! empty($item->photo_file))
                    <img class="object-cover w-full text-xs rounded-lg" src="{{ route('images-medium', $item->photo_file) }}" alt="pic"/>
                @else
                    @if (! empty($item->youtube))
                        <img class="object-cover w-full text-xs rounded-lg" src="https://i.ytimg.com/vi/{{ $item->youtube }}/mqdefault.jpg" alt="pic"/>
                    @else
                        <img class="object-cover w-full text-xs rounded-lg" src="{{ asset('images/'.config('app.image')) }}" alt="pic"/>
                    @endif
                @endif

                </span>
                <span class="flex flex-col gap-2">
                    <span class="text-lg font-bold leading-tight">{{ $item->h1 }}</span>
                    <span class="text-xs">{{ $item->h2 }}</span>
                    <span class="text-xs text-start">{{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->diffForHumans() }}</span>
                </span>
            </a>
        </div>
    @endforeach
@endif
    </div>
</div>
