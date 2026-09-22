<div id="slide" class="uk-position-relative uk-visible-toggle uk-light h-[55vh] sm:h-[60vh] md:h-[68vh] max-h-[640px] min-h-[380px]" tabindex="-1" uk-slideshow="animation: scale; autoplay: true; autoplay-interval: 5000;">

    <div class="uk-slideshow-items h-full">
@if ($homeslide->isNotEmpty())
    @foreach ($homeslide as $item)
        <div>
            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-left">
                <img src="{{ route('images-homeslide', $item->photo_file) }}" alt="{{ $item->h1 ?? config('app.name') }}" loading="{{ $loop->first ? 'eager' : 'lazy' }}" fetchpriority="{{ $loop->first ? 'high' : 'low' }}" decoding="async" uk-cover>
            </div>
            <div class="uk-overlay uk-overlay-primary uk-position-cover bg-gradient-to-t from-black/80 via-black/40 to-black/20 flex items-center justify-center p-6">
                <div class="flex flex-col w-full max-w-3xl gap-3 text-center md:text-left uk-transition-slide-bottom">
                    <div class="text-2xl font-bold tracking-tight text-white sm:text-3xl md:text-4xl lg:text-5xl cinzel drop-shadow-md">{{ $item->h1 }}</div>
                    @if($item->h2)
                        <div class="text-base font-medium text-amber-200/90 sm:text-lg md:text-2xl drop-shadow">{{ $item->h2 }}</div>
                    @endif
                    @if($item->belly)
                        <div class="max-w-2xl text-xs font-light text-neutral-200 sm:text-sm md:text-base drop-shadow-sm line-clamp-2 md:line-clamp-3">{{ $item->belly }}</div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endif
    </div>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>

    <div class="uk-position-bottom-center uk-position-small">
        <ul class="uk-dotnav">
@if ($homeslide->isNotEmpty())
    @foreach ($homeslide as $item)
            <li uk-slideshow-item="{{ $loop->index }}"><a href="#">{{ $loop->index }}</a></li>
    @endforeach
@endif
        </ul>
    </div>
</div>
