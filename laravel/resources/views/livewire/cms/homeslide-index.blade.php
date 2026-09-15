@section('page_title', config('app.name').' | '.$page_title)
<div id="homeslide" class="flex items-start justify-center grow lg:p-4 xl:p-6">
    <div class="flex flex-col w-full h-full gap-4 p-0 bg-white lg:p-0 lg:w-auto lg:h-auto lg:shadow-md lg:rounded-xl">
        <div class="flex flex-col divide-y divide-slate-200">
            <div class="flex items-center justify-between py-2 ps-4 sm:ps-5 pe-3">
                <x-cms.page-title-awesome title="{{ $page_title }}" awesome="{{ $awesome }}"/>
                <x-cms.href-create-min href="{{ route($href_create) }}"/>
            </div>

            <div class="flex items-center justify-between gap-2 p-1 ps-3">
                <div></div>
                <x-cms.input-search/>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <x-cms.th title="ID" class=""/>
                            <x-cms.th title="Judul" class="text-start"/>
                            <x-cms.th title="Sub Judul" class="text-start"/>
                            <x-cms.th title="Paragraf" class="text-start"/>
                            <x-cms.th title="Photo" class="text-start"/>
                            <x-cms.th title="Edit" class=""/>
                            <x-cms.th title="Hapus" class=""/>
                        </tr>
                    </thead>
                    <tbody>
@if ($items->isNotEmpty())
    @foreach ($items as $item)
                        <tr wire:key="{{ $item->id }}" class="border-t border-slate-200 hover:bg-slate-100 hover:text-black">
                            <td class="text-center">{{ $loop->index + $items->firstitem() }}</td>
                            <td class="px-2 text-sm">{{ $item->h1 }}</td>
                            <td class="px-2 text-xs">{{ $item->h2 }}</td>
                            <td class="px-2 text-xs">{{ $item->belly }}</td>
                            <td class="w-1">@if (! empty($item->photo_file))
                                <a href="{{ route('images-homeslide', $item->photo_file) }}" target="_blank">
                                    <img src="{{ route('images-homeslide', $item->photo_file) }}" alt="{{ $item->photo_file }}"
                                        class="object-cover w-8 h-8 mx-auto text-xs rounded"
                                    />
                                </a>
                            @endif</td>
                            <td class="w-1 text-center"><x-cms.href-edit href="{{ route('cms-homeslide-edit', ['id' => $item->id]) }}"/></td>
                            <td class="w-1 py-1 text-center"><x-cms.button-delete :item="$item"/></td>
                        </tr>
    @endforeach
@else
                        <tr>
                            <td colspan="7" class="py-5 text-sm font-light text-center border-t border-slate-200">- x -</td>
                        </tr>
@endif
                    </tbody>
                </table>
            </div>

            <div class="py-1 ps-3 pe-1">
                @if ($items->hasPages())
                {{ $items->links() }}
                @endif
            </div>
        </div>
    </div>

@if (session()->has('message'))
    @if (session('theme') == 'warning')
        <x-cms.notif-warning message="{{ session('message') }}"/>
    @endif
    @if (session('theme') == 'success')
        <x-cms.notif-success message="{{ session('message') }}"/>
    @endif
@endif

</div>
