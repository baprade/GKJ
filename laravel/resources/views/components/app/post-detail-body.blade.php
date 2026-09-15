{{-- BEGIN: Propery 1 Block --}}
<div>
    {{-- Youtube --}}
    @if(! empty($item->youtube))
        @foreach (explode(',', $item->youtube) as $itemyoutube)
            <iframe class="w-full lg:rounded aspect-video" src="https://www.youtube.com/embed/{{ $itemyoutube }}" frameborder="0" allowfullscreen></iframe>
        @endforeach
    @else

        {{-- Photo --}}
        @if(! empty($item->photo_file))
        <div>
            @if (Storage::exists('large/'.$item->photo_file))
                <img src="{{ route('images-large', $item->photo_file) }}" alt="{{ config('app.name') }}" class="w-full text-xs height-unset lg:rounded" />
                @section('page_image', route('images-large', $item->photo_file))
            @endif
            <div class="pt-2 mx-4 text-xs text-end sm:mx-5 lg:mx-0">{{ $item->photo_grafer }}</div>
            <div class="pt-2 pb-4 mx-4 leading-tight border-b text-start sm:mx-5 lg:mx-0 border-slate-300">{{ $item->photo_caption }}</div>
        </div>
        @endif
        @if(! empty($item->youtube))
        @section('page_image', 'https://i.ytimg.com/vi/'.explode(',', $item->youtube)[0].'/maxresdefault.jpg')
        @endif
    @endif
</div>
{{-- END: Propery 1 Block --}}

{{-- BEGIN: Content Block --}}
<div class="px-6 sm:px-8 lg:px-0">

@php
$pages_array = explode('<div class="page-break"></div>', $item->belly);
@endphp

@if (count($pages_array) == 1)
    <div class="text-lg belly">{!! $item->belly !!}</div>
@else
    @empty($_GET["page"])
        @php $page = 1; @endphp
        <div class="text-lg belly">{!! $pages_array[0] !!}</div>
    @else
        @php $page = $_GET["page"]; @endphp
        @if ($_GET["page"] <= count($pages_array))
            <div class="text-lg belly">{!! $pages_array[$_GET["page"] - 1] !!}</div>
        @endif
    @endempty

    <div class="inline-flex flex-wrap items-center justify-center gap-1 px-3 py-2 bg-white border rounded border-slate-300">
        <span class="font-semibold ps-1 pe-2">Halaman </span>
        @if ($page > 1)
            <a class="flex items-center justify-center text-xs bg-white border rounded-full border-sky-600 hover:bg-sky-600 w-9 h-9 text-sky-700 hover:text-white" href="{{ url()->current() }}?page={{ $page - 1 }}" wire:navigate><i class="fa-solid fa-chevron-left "></i></a>
        @endif

        @for ($i = 1; $i <= count($pages_array); $i++)
            @if ($i == $page)
                <span class="flex items-center justify-center font-bold text-white border rounded-full bg-sky-600 border-sky-600 w-9 h-9">{{ $i }}</span>
            @else
                <a class="flex items-center justify-center font-bold bg-white border rounded-full border-sky-600 hover:bg-sky-600 w-9 h-9 text-sky-700 hover:text-white" href="{{ url()->current() }}?page={{ $i }}" wire:navigate>{{ $i }}</a>
            @endif
        @endfor

        @if ($page < count($pages_array))
            <a class="flex items-center justify-center text-xs bg-white border rounded-full border-sky-600 hover:bg-sky-600 w-9 h-9 text-sky-700 hover:text-white" href="{{ url()->current() }}?page={{ $page + 1 }}" wire:navigate><i class="fa-solid fa-chevron-right"></i></a>
        @endif
    </div>
@endif

{{-- <div class="text-lg belly text-start">{!! $item->belly !!}</div> --}}

</div>
{{-- END: Content Block --}}

@if(! empty($item->photos))
<div class="uk-position-relative uk-visible-toggle uk-dark" tabindex="-1" uk-slideshow="animation: pull; autoplay: true; ratio: 1:1;">
    <div class="uk-slideshow-items">
@if ($photos->isNotEmpty())
    @foreach ($photos as $photo)
        <div>
            <img class="object-contain w-full h-full rounded-lg" src="{{ route('images-large', $photo->photo_file) }}" alt="{{ config('app.name') }}">
        </div>
    @endforeach
@endif
    </div>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>

    {{-- <div class="uk-position-bottom-center uk-position-small"> --}}
    <div class="flex justify-center">
        <ul class="gap-2 uk-thumbnav uk-grid-collapse">

    @if(! empty($item->photo_file))
        @if (Storage::exists('product/'.$item->photo_file))
            <li uk-slideshow-item="0"><a href="#"><img class="object-contain w-12 h-12 rounded-lg" src="{{ route('images-product', $item->photo_file) }}" alt="{{ config('app.name') }}"></a></li>
        @endif
    @endif

    @if ($photos->isNotEmpty())
        @foreach ($photos as $photo)
            <li uk-slideshow-item="{{ $loop->index + 1 }}"><a href="#"><img class="object-contain w-12 h-12 rounded-lg" src="{{ route('images-large', $photo->photo_file) }}" alt="{{ config('app.name') }}"></a></li>
        @endforeach
    @endif
        </ul>
    </div>


    </div>
@endif

{{-- BEGIN: Propery 2 Block --}}
<div>

{{-- Youtube --}}
@if(! empty($item->youtube))

    {{-- Photo --}}
    @if(! empty($item->photo_file))
    <div>
        @if (Storage::exists('posts/'.substr($item->created_at,0,4).'/'.$item->photo_file))
            <img src="{{ route('photo-ori', [substr($item->created_at,0,4), $item->photo_file]) }}" alt="{{ config('app.name') }}" class="w-full text-xs height-unset lg:rounded" />
            @section('page_image', route('photo-ori', [substr($item->created_at,0,4), $item->photo_file]))
        @else
            <img src="{{ asset('posts/'. substr($item->created_at,0,4) .'/big/'.$item->photo_file) }}" alt="{{ config('app.name') }}" class="w-full text-xs lg:rounded" />
            @section('page_image', asset('posts/'. substr($item->created_at,0,4) .'/big/'.$item->photo_file))
        @endif
    <div class="pt-2 mx-4 text-xs text-end sm:mx-5 lg:mx-0">{{ $item->photo_grafer }}</div>
    <div class="pt-2 pb-4 mx-4 leading-tight border-b text-start sm:mx-5 lg:mx-0 border-slate-300">{{ $item->photo_caption }}</div>
    </div>
    @endif
    @if(! empty($item->youtube))
    @section('page_image', 'https://i.ytimg.com/vi/'.explode(',', $item->youtube)[0].'/maxresdefault.jpg')
    @endif

@endif

</div>
{{-- END: Content Block --}}

{{-- BEGIN: Tags --}}
@if(! empty($item->key_word))
<div class="px-6 sm:px-8 lg:px-0">
    <div class="flex flex-col gap-2">
        <x-app.title-modul title="Tags"/>
        <div class="flex flex-wrap items-center gap-1">
            @foreach (explode(',', $item->key_word) as $item_key_word)
                <x-app.href-tags
                    href="{{ route('tags', ['slug' => strtolower(str_replace(' ', '-', trim($item_key_word)))]) }}"
                    :active="request()->is($item_key_word)"
                    title="{{ strtolower(trim($item_key_word)) }}"
                />
            @endforeach
        </div>
    </div>

    {{-- <div class="px-6 font-semibold text-start sm:px-8 lg:px-0">Editor:
        @if($item->id_editor == 0)
            @if($item->id_reporter != 0)
                @if ($item->reporter->nickname == '')
                    {{ $item->reporter->name }}
                @else
                    {{ $item->reporter->nickname }}
                @endif
            @endif
        @else
            @if($item->id_editor != 0)
                @if ($item->editor->nickname == '')
                    {{ $item->editor->name }}
                @else
                    {{ $item->editor->nickname }}
                @endif
            @endif
        @endif
    </div> --}}

</div>
@endif
{{-- END: Tags --}}
