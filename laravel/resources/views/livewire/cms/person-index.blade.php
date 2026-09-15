@section('page_title', $page_title)
<div id="people" class="flex items-start justify-center grow lg:p-6">
    <div class="flex flex-col w-full h-full gap-4 p-0 bg-white lg:p-0 lg:w-auto lg:h-auto lg:shadow lg:rounded-md">
        <div class="flex flex-col divide-y divide-slate-200">
            <div class="flex items-center justify-between p-1 ps-4">
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
                            <x-cms.th title="No" class=""/>
                            <x-cms.th title="Sidi Tanggal" class="text-start"/>
                            <x-cms.th title="Nikah oleh" class="text-start"/>
                            <x-cms.th title="Nikah Tanggal" class="text-start"/>
                            <x-cms.th title="Meninggal" class=""/>
                            <x-cms.th title="Orang tua" class="text-start"/>
                            <x-cms.th title="Suami/Isteri" class="text-start"/>
                            <x-cms.th title="Nomor Induk Anak" class="text-start"/>
                            <x-cms.th title="Dari" class="text-start"/>
                            <x-cms.th title="Ke" class="text-start"/>
                            {{-- <x-cms.th title="Keterangan" class="text-start"/> --}}
                            <x-cms.th title="Edit" class=""/>
                            <x-cms.th title="Created" class=""/>
                            <x-cms.th title="Hapus" class=""/>
                        </tr>
                    </thead>
                    <tbody>
@if ($items->isNotEmpty())
    @foreach ($items as $item)
                        <tr wire:key="{{ $item->id }}" class="border-t border-slate-200 hover:bg-slate-100 hover:text-black">
                            <td class="px-2 text-sm text-center leading-none">{{ $items->total() - ($loop->index + $items->firstItem() - 1) }}</td>
                            <td class="px-2 text-xs text-center leading-none">{{ $item->sidi }}</td>
                            <td class="px-2 text-sm leading-none">{{ $item->nikah_by }}</td>
                            <td class="px-2 text-xs text-center leading-none">{{ $item->nikah_date }}</td>
                            <td class="px-2 text-xs text-center leading-none">{{ $item->passed_date }}</td>
                            <td class="px-2 text-sm leading-none">{{ $item->parrent }}</td>
                            <td class="px-2 text-sm leading-none">{{ $item->spouse }}</td>
                            <td class="px-2 text-sm leading-none">{{ $item->nia }}</td>
                            <td class="px-2 text-sm leading-none">{{ $item->from }}</td>
                            <td class="px-2 text-sm leading-none">{{ $item->to }}</td>
                            {{-- <td class="px-2 text-xs leading-none">{{ $item->note }}</td> --}}
                            <td class="text-center"><x-cms.href-edit href="{{ route('cms-people-edit', ['id' => $item->id]) }}"/></td>
                            <td class="w-1 text-xs text-center leading-none">{{ $item->created_at }}</td>
                            <td class="py-1 text-center"><x-cms.button-delete :item="$item"/></td>
                        </tr>
    @endforeach
@else
                        <tr>
                            <td colspan="13" class="py-5 text-sm font-light text-center border-t border-slate-200">- x -</td>
                        </tr>
@endif
                    </tbody>
                </table>
            </div>

            <div class="py-1 ps-3 pe-1">{{ $items->links() }}</div>
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
