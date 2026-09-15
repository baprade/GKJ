@section('page_title', $page_title)
<div id="formulir" class="flex flex-col items-center grow">
    <x-cms.menu-form/>
    <div class="w-full grow lg:p-4 xl:p-6">

        <div class="flex flex-col w-full h-full gap-4 p-0 bg-white lg:p-0 lg:h-auto lg:shadow lg:rounded-md">
            <div class="flex flex-col divide-y divide-slate-200">
                <div class="flex items-center justify-between p-1 ps-4">
                    <x-cms.page-title-awesome title="{{ $page_title }}" awesome="{{ $awesome }}"/>
                    {{-- <x-cms.href-create-min href="{{ route($href_create) }}"/> --}}
                </div>

                <div class="flex items-center justify-between p-1">
                    <div class="flex gap-1">
                    </div>
                    <x-cms.input-search/>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <x-cms.th title="No" class=""/>
                                <x-cms.th title="Nama Calon Suami" class="text-start"/>
                                <x-cms.th title="Tempat Lahir" class="text-start"/>
                                <x-cms.th title="Tanggal Lahir" class="text-start"/>
                                <x-cms.th title="Agama" class="text-start"/>
                                <x-cms.th title="Sidi Tanggal" class="text-start"/>
                                <x-cms.th title="Pekerjaan" class="text-start"/>
                                <x-cms.th title="Alamat Rumah" class="text-start"/>
                                <x-cms.th title="Anggota Gereja" class="text-start"/>
                                <x-cms.th title="Kelompok/Blok" class="text-start"/>
                                <x-cms.th title="Nama Calon Istri" class="text-start"/>
                                <x-cms.th title="Agama" class="text-start"/>
                                <x-cms.th title="Sidi Tanggal" class="text-start"/>
                                <x-cms.th title="Pekerjaan" class="text-start"/>
                                <x-cms.th title="Alamat Rumah" class="text-start"/>
                                <x-cms.th title="Anggota Gereja" class="text-start"/>
                                <x-cms.th title="Kelompok/Blok" class="text-start"/>
                                <x-cms.th title="Tanggal Pernikahan" class="text-start"/>
                                <x-cms.th title="Tempat Pernikahan" class="text-start"/>
                                <x-cms.th title="Orang Tua Calon mempelai laki-laki" class="text-start"/>
                                <x-cms.th title="Orang Tua Calon mempelai perempuan" class="text-start"/>
                                <x-cms.th title="Created" class=""/>
                                <x-cms.th title="Hapus" class=""/>
                            </tr>
                        </thead>
                        <tbody>
    @if ($items->isNotEmpty())
        @foreach ($items as $item)
                            <tr wire:key="{{ $item->id }}" class="border-t border-slate-200 hover:bg-slate-100 hover:text-black">
                                <td class="px-2 text-sm text-center">{{ $items->total() - ($loop->index + $items->firstItem() - 1) }}</td>
                                <td class="px-2 text-sm">{{ $item->nama_casu }}</td>
                                <td class="px-2 text-sm">{{ $item->tempat_lahir_casu }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->tanggal_nikah_casu }}</td>
                                <td class="px-2 text-sm">{{ $item->agama_casu }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->sidi_tanggal_casu }}</td>
                                <td class="px-2 text-sm">{{ $item->pekerjaan_casu }}</td>
                                <td class="px-2 text-sm">{{ $item->alamat_rumah_casu }}</td>
                                <td class="px-2 text-sm">{{ $item->anggota_gereja_casu }}</td>
                                <td class="px-2 text-sm">{{ $item->anggota_kelompok_casu }}</td>
                                <td class="px-2 text-sm">{{ $item->nama_cais }}</td>
                                <td class="px-2 text-sm">{{ $item->agama_cais }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->sidi_tanggal_cais }}</td>
                                <td class="px-2 text-sm">{{ $item->pekerjaan_cais }}</td>
                                <td class="px-2 text-sm">{{ $item->alamat_rumah_cais }}</td>
                                <td class="px-2 text-sm">{{ $item->anggota_gereja_cais }}</td>
                                <td class="px-2 text-sm">{{ $item->anggota_kelompok_cais }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->tanggal_nikah }}</td>
                                <td class="px-2 text-sm">{{ $item->tempat_nikah }}</td>
                                <td class="px-2 text-sm">{{ $item->ortu_casu }}</td>
                                <td class="px-2 text-sm">{{ $item->ortu_cais }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->created_at }}</td>
                                <td class="w-1 py-1 text-center"><x-cms.button-delete :item="$item"/></td>
                            </tr>
        @endforeach
    @else
                            <tr>
                                <td colspan="9" class="py-5 text-sm font-light text-center border-t border-slate-200">- x -</td>
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
