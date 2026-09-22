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
        <div class="flex items-center justify-between">
            <div class="text-lg font-semibold text-black uppercase lg:text-xl cinzel">Galeri Video</div>
            <a href="https://www.youtube.com/@GKJWONOGIRI" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-medium text-rose-700 hover:text-rose-800 transition">
                <i class="fa-brands fa-youtube text-base text-rose-600"></i>
                <span>@GKJWONOGIRI</span>
            </a>
        </div>

@if ($videos instanceof \Illuminate\Support\Collection && $videos->isNotEmpty())
    @php
        $mainVideo = $videos->first();
        $subVideos = $videos->slice(1);
    @endphp

        <!-- Video Utama -->
        <a class="flex flex-col gap-3 group text-neutral-900 hover:text-neutral-900" href="{{ url('galeri-video', ['id' => $mainVideo->id, 'slug' => $mainVideo->slug]) }}" wire:navigate>
            <div class="relative w-full rounded-xl overflow-hidden aspect-video bg-neutral-900 group-hover:shadow-md transition">
                <img class="object-cover w-full h-full group-hover:scale-105 transition duration-300" src="https://i.ytimg.com/vi/{{ $mainVideo->youtube }}/mqdefault.jpg" alt="{{ $mainVideo->h1 }}" loading="lazy"/>
                <div class="absolute inset-0 bg-black/25 flex items-center justify-center group-hover:bg-black/15 transition">
                    <div class="w-12 h-12 rounded-full bg-rose-600/90 text-white flex items-center justify-center text-lg shadow-lg group-hover:scale-110 transition">
                        <i class="fa-solid fa-play ml-0.5"></i>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-base font-bold leading-snug group-hover:text-amber-900 transition line-clamp-2">{{ $mainVideo->h1 }}</span>
                <span class="text-xs text-neutral-500 flex items-center gap-2">
                    <i class="fa-regular fa-clock text-[11px]"></i>
                    <span>{{ \Carbon\Carbon::parse($mainVideo->created_at)->locale('id_ID')->diffForHumans() }}</span>
                </span>
            </div>
        </a>

        <!-- Thumbnail Video Terkini Lainnya -->
    @if ($subVideos->isNotEmpty())
        <div class="grid grid-cols-3 gap-2.5 pt-2 border-t border-neutral-200/80">
        @foreach ($subVideos as $sub)
            <a class="flex flex-col gap-1.5 group text-neutral-800 hover:text-neutral-900" href="{{ url('galeri-video', ['id' => $sub->id, 'slug' => $sub->slug]) }}" wire:navigate title="{{ $sub->h1 }}">
                <div class="relative w-full rounded-lg overflow-hidden aspect-video bg-neutral-900">
                    <img class="object-cover w-full h-full group-hover:scale-105 transition duration-300" src="https://i.ytimg.com/vi/{{ $sub->youtube }}/mqdefault.jpg" alt="{{ $sub->h1 }}" loading="lazy"/>
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                        <div class="w-6 h-6 rounded-full bg-black/60 text-white flex items-center justify-center text-[10px]">
                            <i class="fa-solid fa-play ml-0.5"></i>
                        </div>
                    </div>
                </div>
                <div class="text-[11px] font-medium leading-tight line-clamp-2 group-hover:text-amber-900 transition">{{ $sub->h1 }}</div>
            </a>
        @endforeach
        </div>
    @endif
@elseif (!empty($videos))
        <!-- Fallback single video -->
        <a class="flex flex-col gap-4 hover:text-black" href="{{ url('galeri-video', ['id' => $videos->id, 'slug' => $videos->slug]) }}">
            <div class="relative w-full rounded-lg overflow-hidden aspect-video bg-neutral-900">
                <img class="object-cover w-full h-full" src="https://i.ytimg.com/vi/{{ $videos->youtube }}/mqdefault.jpg" alt="{{ $videos->h1 }}"/>
            </div>
            <span class="flex flex-col gap-2">
                <span class="text-lg font-bold leading-tight">{{ $videos->h1 }}</span>
                <span class="text-xs text-neutral-500">{{ \Carbon\Carbon::parse($videos->created_at)->locale('id_ID')->diffForHumans() }}</span>
            </span>
        </a>
@endif
    </div>
</div>
