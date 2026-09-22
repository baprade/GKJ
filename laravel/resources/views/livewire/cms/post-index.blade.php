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
                            <x-cms.th title="Judul" class="text-start"/>
                            <x-cms.th title="Media" class=""/>
                            <x-cms.th title="Status" class=""/>
                            <x-cms.th title="Views" class=""/>
                            <x-cms.th title="Tanggal" class=""/>
                            <x-cms.th title="Aksi" class=""/>
                        </tr>
                    </thead>
                    <tbody>
@if ($items->isNotEmpty())
    @foreach ($items as $item)
                        <tr wire:key="{{ $item->id }}" class="border-t border-slate-200 hover:bg-slate-50">
                            <td class="px-2 text-sm text-center text-slate-500">{{ $items->total() - ($loop->index + $items->firstItem() - 1) }}</td>
                            <td class="px-2 text-xs font-medium uppercase text-slate-600">{{ $item->format->title ?? '-' }}</td>
                            <td class="px-2 text-xs font-medium uppercase text-slate-600">{{ $item->category->title ?? '-' }}</td>
                            <td class="px-2 py-2">
                                <div class="text-sm font-medium text-slate-800">{{ $item->h1 }}</div>
                                @if (!empty($item->h2))
                                    <div class="text-xs text-slate-400 line-clamp-1">{{ $item->h2 }}</div>
                                @endif
                            </td>
                            <td class="w-1 px-2 text-center">
                                @if (! empty($item->photo_file))
                                    <a href="{{ route('images-large', $item->photo_file) }}" target="_blank" title="Lihat Foto">
                                        <img src="{{ route('images-small', $item->photo_file) }}" alt="{{ $item->photo_file }}"
                                            class="object-cover w-9 h-9 mx-auto text-xs rounded shadow-sm hover:opacity-80 transition"
                                        />
                                    </a>
                                @elseif (! empty($item->youtube))
                                    <a href="https://www.youtube.com/watch?v={{ explode(',', $item->youtube)[0] }}" target="_blank" title="Lihat Youtube">
                                        <img src="https://i.ytimg.com/vi/{{ explode(',', $item->youtube)[0] }}/mqdefault.jpg" alt="youtube"
                                            class="object-cover w-9 h-9 mx-auto text-xs rounded shadow-sm hover:opacity-80 transition"
                                        />
                                    </a>
                                @else
                                    <span class="text-xs text-slate-300">-</span>
                                @endif
                            </td>
                            <td class="w-1 px-2 text-center"><x-cms.onoff onoff="{{ $item->onoff }}"/></td>
                            <td class="w-1 px-2 text-sm text-center text-slate-600">{{ number_format($item->views ?? 0, 0, ',', '.') }}</td>
                            <td class="w-1 px-2 text-xs text-center text-slate-500 whitespace-nowrap">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</td>
                            <td class="w-1 px-2 py-1 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center gap-1">
                                    <x-cms.href-view href="{{ url($item->format->slug.'/'.$item->id.'/'.$item->slug) }}" title="Lihat"/>
                                    <x-cms.href-edit href="{{ route('cms-posts-edit', ['id' => $item->id]) }}" title="Edit"/>
                                    <x-cms.button-delete :item="$item"/>
                                </div>
                            </td>
                        </tr>
    @endforeach
@else
                        <tr>
                            <td colspan="9" class="py-8 text-sm font-light text-center border-t text-slate-400 border-slate-200">Tidak ada postingan ditemukan.</td>
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
