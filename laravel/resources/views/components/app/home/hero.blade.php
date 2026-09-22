<div id="slide" class="uk-position-relative uk-visible-toggle uk-light uk-height-viewport" tabindex="-1" uk-slideshow="animation: scale; autoplay: true;">

    <div class="uk-slideshow-items uk-height-viewport">
@if ($homeslide->isNotEmpty())
    @foreach ($homeslide as $item)
        <div>
            <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-left"><img src="{{ route('images-homeslide', $item->photo_file) }}" alt="{{ $item->h1 ?? config('app.name') }}" loading="{{ $loop->first ? 'eager' : 'lazy' }}" fetchpriority="{{ $loop->first ? 'high' : 'low' }}" decoding="async" uk-cover></div>
            <div class="flex flex-col w-full max-w-3xl gap-6 bg-transparent rounded uk-overlay uk-overlay-primary uk-position-center text-start uk-transition-slide-bottom">
                <div class="text-3xl font-bold text-white md:text-4xl lg:text-5xl text-shadow-10">{{ $item->h1 }}</div>
                <div class="text-2xl text-white lg:text-3xl text-shadow-10">{{ $item->h2 }}</div>
                <div class="font-light text-white lg:text-lg text-shadow-10">{{ $item->belly }}</div>
            </div>
        </div>
    @endforeach
@endif
    </div>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>

    <div class="uk-position-bottom-center uk-position-medium">
        <ul class="uk-dotnav">
@if ($homeslide->isNotEmpty())
    @foreach ($homeslide as $item)
            <li uk-slideshow-item="{{ $loop->index }}"><a href="#">{{ $loop->index }}</a></li>
    @endforeach
@endif
        </ul>
    </div>
</div>
