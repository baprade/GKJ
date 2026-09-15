{{-- BEGIN: Title Block --}}
<div class="flex flex-col gap-5 px-6 sm:px-8 lg:px-0">
    <div class="flex flex-col items-center gap-4">
        <h1 class="text-2xl md:text-3xl font-bold text-black leading-tight md:leading-tight">{{ $item->h1 }}</h1>
        @section('page_title', $item->h1 ?? config('app.title'))

        {{-- H2 --}}
        @if(! empty($item->h2))
        <h2 class="text-xl leading-snug font-semibold">{{ $item->h2 }}</h2>
        @section('page_description', $item->h2 ?? config('app.description'))
        @endif
    </div>

    {{-- Date Views Comments --}}
    @if ($item->id_format != 11)
    <span class="flex gap-4">
        <span class="flex items-center gap-1 text-sky-700">
            <i class="fa-regular fa-clock text-sm"></i>
            <span class="text-xs text-start">{{ $item->created_at->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}</span>
        </span>
        <x-app.views views="{{ $item->views }}"/>
        <x-app.comments comments="{{ $item->comments }}"/>
    </span>
    @endif
</div>
{{-- END: Title Block --}}
