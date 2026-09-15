<div id="gallery" class="grid gap-4 px-6 mx-auto md:gap-6 lg:gap-10 lg:px-8 max-w-7xl md:grid-cols-2">
    <div class="flex flex-col gap-4">
        <div class="text-lg font-semibold text-black uppercase lg:text-xl cinzel">Galeri Foto</div>
        <div class="grid gap-6 sm:grid-cols-2 img-scale-hover">
    @if ($photos->isNotEmpty())
        @foreach ($photos as $item)
            <a class="relative overflow-hidden rounded-lg aspect-square" href="{{ url('galeri-foto', ['id' => $item->id, 'slug' => $item->slug]) }}" wire:navigate>

                @if (! empty($item->photo_file))
                    <img class="object-cover w-full h-full text-xs" src="{{ route('images-medium', $item->photo_file) }}" alt="pic"/>
                @else
                    @if (! empty($item->youtube))
                        <img class="object-cover w-full h-full text-xs" src="https://i.ytimg.com/vi/{{ $item->youtube }}/mqdefault.jpg" alt="pic"/>
                    @else
                        <img class="object-cover w-full h-full text-xs" src="{{ asset('images/'.config('app.image')) }}" alt="pic"/>
                    @endif
                @endif

                <span class="absolute inset-0 flex items-end justify-start bg-gradient-to-b from-black/0 via-black/0 to-black/75">
                    <span class="flex flex-col gap-2 pb-4 text-white ps-4 pe-2 hover:text-white text-shadow">
                        <span class="text-xs text-start">{{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->diffForHumans() }}</span>
                        <span class="font-bold leading-none md:leading-none text-start">{{ $item->h1 }}</span>
                    </span>
                </span>
            </a>
        @endforeach
    @endif
        </div>
    </div>
    <div class="flex flex-col gap-4">
        <div class="text-lg font-semibold text-black uppercase lg:text-xl cinzel">Galeri Video</div>
@if ($videos)
        <a class="flex flex-col gap-4 hover:text-black" href="{{ url('galeri-video', ['id' => $videos->id, 'slug' => $videos->slug]) }}">

            <iframe class="w-full rounded-lg aspect-video" src="https://www.youtube.com/embed/{{ $videos->youtube }}" frameborder="0" allowfullscreen></iframe>

            <span class="flex flex-col gap-2">
                <span class="text-lg font-bold leading-tight">{{ $videos->h1 }}</span>
                <span class="text-xs">{{ $videos->h2 }}</span>
                <span class="text-xs text-start">{{ \Carbon\Carbon::parse($videos->created_at)->locale('id_ID')->diffForHumans() }}</span>
            </span>
        </a>
@endif

    </div>
</div>
