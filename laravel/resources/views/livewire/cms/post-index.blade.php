@section('page_title', $page_title)
<div id="post" class="flex items-start justify-center grow lg:p-4 xl:p-6">
    <div class="flex flex-col w-full h-full gap-4 p-0 bg-white lg:p-0 lg:h-auto lg:shadow lg:rounded-md">
        <div class="flex flex-col divide-y divide-slate-200">
            <div class="flex items-center justify-between p-1 ps-4">
                <x-cms.page-title-awesome title="{{ $page_title }}" awesome="{{ $awesome }}"/>
                <x-cms.href-create-min href="{{ route($href_create) }}"/>
            </div>

            <div class="flex items-center justify-between p-1">
                <div class="flex gap-1">
                    <x-cms.label-select-post-index name="id_format" title="Format" :options="$formats_array"/>
                    <x-cms.label-select-post-index name="id_category" title="Kategori" :options="$categories_array"/>
                </div>
                <x-cms.input-search/>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <x-cms.th title="No" class=""/>
                            <x-cms.th title="Format" class="text-start"/>
                            <x-cms.th title="Kategori" class="text-start"/>
                            <x-cms.th title="Judul / H1" class="text-start"/>
                            <x-cms.th title="Sub Judul / H2" class="text-start"/>
                            <x-cms.th title="Photo" class="text-start"/>
                            <x-cms.th title="Youtube" class="text-start"/>
                            <x-cms.th title="Galeri" class="text-start"/>
                            <x-cms.th title="On/Off" class="text-start"/>
                            <x-cms.th title="Edit" class=""/>
                            <x-cms.th title="View" class=""/>
                            <x-cms.th title="Visit" class=""/>
                            <x-cms.th title="Created" class=""/>
                            <x-cms.th title="Hapus" class=""/>
                        </tr>
                    </thead>
                    <tbody>
@if ($items->isNotEmpty())
    @foreach ($items as $item)
                        <tr wire:key="{{ $item->id }}" class="border-t border-slate-200 hover:bg-slate-100 hover:text-black">
                            <td class="px-2 text-sm text-center">{{ $items->total() - ($loop->index + $items->firstItem() - 1) }}</td>
                            <td class="px-2 text-xs leading-none uppercase">{{ $item->format->title ?? '-' }}</td>
                            <td class="px-2 text-xs leading-none uppercase">{{ $item->category->title ?? '-' }}</td>
                            <td class="px-2 text-sm">{{ $item->h1 }}</td>
                            <td class="px-2 text-xs">{{ $item->h2 }}</td>
                            <td class="w-1">@if (! empty($item->photo_file))
                                <a href="{{ route('images-large', $item->photo_file) }}" target="_blank">
                                    <img src="{{ route('images-small', $item->photo_file) }}" alt="{{ $item->photo_file }}"
                                        class="object-cover w-8 h-8 mx-auto text-xs rounded"
                                    />
                                </a>
                            @endif</td>
                            <td class="w-1">@if (! empty($item->youtube))
                    <a href="https://www.youtube.com/watch?v={{ explode(',', $item->youtube)[0] }}" target="_blank">
                        <img src="https://i.ytimg.com/vi/{{ explode(',', $item->youtube)[0] }}/mqdefault.jpg" alt="{{ explode(',', $item->youtube)[0] }}"
                            class="object-cover w-8 h-8 mx-auto text-xs rounded"
                        />
                    </a>
                @endif</td>
                            <td class="w-1 text-sm text-center">{{ $item->photos }}</td>
                            <td class="w-1 px-2"><x-cms.onoff onoff="{{ $item->onoff }}"/></td>
                            <td class="w-1 text-center"><x-cms.href-edit href="{{ route('cms-posts-edit', ['id' => $item->id]) }}"/></td>
                            <td class="w-1 text-center"><x-cms.href-view href="{{ url($item->format->slug.'/'.$item->id.'/'.$item->slug) }}"/></td>
                            <td class="w-1 text-sm text-center">{{ $item->views }}</td>
                            <td class="w-1 text-xs text-center">{{ $item->created_at }}</td>
                            <td class="w-1 py-1 text-center"><x-cms.button-delete :item="$item"/></td>
                        </tr>
    @endforeach
@else
                        <tr>
                            <td colspan="14" class="py-5 text-sm font-light text-center border-t border-slate-200">- x -</td>
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
