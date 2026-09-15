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
                                <x-cms.th title="Nama Lengkap" class="text-start"/>
                                <x-cms.th title="Jenis Kelamin" class="text-start"/>
                                <x-cms.th title="Alamat" class="text-start"/>
                                <x-cms.th title="Tempat Lahir" class="text-start"/>
                                <x-cms.th title="Tanggal Lahir" class="text-start"/>
                                <x-cms.th title="Tempat Baptis" class="text-start"/>
                                <x-cms.th title="Tanggal Baptis" class="text-start"/>
                                <x-cms.th title="Pendeta yang melayani (baptis)" class="text-start"/>
                                <x-cms.th title="Tempat Nikah" class="text-start"/>
                                <x-cms.th title="Tanggal Nikah" class="text-start"/>
                                <x-cms.th title="Menikah secara" class="text-start"/>
                                <x-cms.th title="Pendidikan" class="text-start"/>
                                <x-cms.th title="Pekerjaan" class="text-start"/>
                                <x-cms.th title="Alamat Pekerjaan" class="text-start"/>
                                <x-cms.th title="Keterangan lain" class="text-start"/>
                                <x-cms.th title="Nama Lengkap Ayah" class="text-start"/>
                                <x-cms.th title="Status Kristen Ayah" class="text-start"/>
                                <x-cms.th title="Anggota Gereja Ayah" class="text-start"/>
                                <x-cms.th title="Nomor Induk Ayah" class="text-start"/>
                                <x-cms.th title="Nama Lengkap Ibu" class="text-start"/>
                                <x-cms.th title="Status Kristen Ibu" class="text-start"/>
                                <x-cms.th title="Anggota Gereja Ibu" class="text-start"/>
                                <x-cms.th title="Nomor Induk Ibu" class="text-start"/>
                                <x-cms.th title="Alamat Ayah Ibu" class="text-start"/>
                                <x-cms.th title="Nama Tunangan" class="text-start"/>
                                <x-cms.th title="Status Kristen Tunangan" class="text-start"/>
                                <x-cms.th title="Anggota Gereja Tunangan" class="text-start"/>
                                <x-cms.th title="Nomor Induk Tunangan" class="text-start"/>
                                <x-cms.th title="Alamat Tunangan" class="text-start"/>
                                <x-cms.th title="Tempat Bertunangan" class="text-start"/>
                                <x-cms.th title="Tanggal Bertunangan" class="text-start"/>
                                <x-cms.th title="Nama Suami/Istri" class="text-start"/>
                                <x-cms.th title="Anggota Gereja" class="text-start"/>
                                <x-cms.th title="Keterangan Pasangan" class="text-start"/>
                                <x-cms.th title="Jumlah Anak" class="text-start"/>
                                <x-cms.th title="Masih dalam usaha" class="text-start"/>
                                <x-cms.th title="Pengajar Katekasi" class="text-start"/>
                                <x-cms.th title="Selama Katekasi" class="text-start"/>
                                <x-cms.th title="Tempat Katekasi" class="text-start"/>
                                <x-cms.th title="Tanggal SIDI" class="text-start"/>
                                <x-cms.th title="Kebaktian Jam" class="text-start"/>
                                <x-cms.th title="Bertempat di Gereja" class="text-start"/>
                                <x-cms.th title="Telah melapor di Kelompok" class="text-start"/>
                                <x-cms.th title="Tanggal Melapor" class="text-start"/>
                                <x-cms.th title="Ketua Kelompok" class="text-start"/>
                                <x-cms.th title="Created" class=""/>
                                <x-cms.th title="Hapus" class=""/>
                            </tr>
                        </thead>
                        <tbody>
    @if ($items->isNotEmpty())
        @foreach ($items as $item)
                            <tr wire:key="{{ $item->id }}" class="border-t border-slate-200 hover:bg-slate-100 hover:text-black">
                                <td class="px-2 text-sm text-center">{{ $items->total() - ($loop->index + $items->firstItem() - 1) }}</td>
                                <td class="px-2 text-sm">{{ $item->nama_lengkap }}</td>
                                <td class="px-2 text-sm">{{ $item->jenis_kelamin->title ?? '-' }}</td>
                                <td class="px-2 text-sm">{{ $item->alamat }}</td>
                                <td class="px-2 text-sm">{{ $item->tempat_lahir }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->tanggal_lahir }}</td>
                                <td class="px-2 text-sm">{{ $item->tempat_baptis }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->tanggal_baptis }}</td>
                                <td class="px-2 text-sm">{{ $item->nama_pendeta_baptis }}</td>
                                <td class="px-2 text-sm">{{ $item->tempat_nikah }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->tanggal_nikah }}</td>
                                <td class="px-2 text-sm">{{ $item->menikah_secara }}</td>
                                <td class="px-2 text-sm">{{ $item->pendidikan }}</td>
                                <td class="px-2 text-sm">{{ $item->pekerjaan }}</td>
                                <td class="px-2 text-sm">{{ $item->alamat_pekerjaan }}</td>
                                <td class="px-2 text-sm">{{ $item->keterangan_lain }}</td>
                                <td class="px-2 text-sm">{{ $item->nama_ayah }}</td>
                                <td class="px-2 text-sm">{{ $item->status_kristenayah->title ?? '-' }}</td>
                                <td class="px-2 text-sm">{{ $item->anggota_gereja_ayah }}</td>
                                <td class="px-2 text-sm">{{ $item->nomor_induk_ayah }}</td>
                                <td class="px-2 text-sm">{{ $item->nama_ibu }}</td>
                                <td class="px-2 text-sm">{{ $item->status_kristenibu->title ?? '-' }}</td>
                                <td class="px-2 text-sm">{{ $item->anggota_gereja_ibu }}</td>
                                <td class="px-2 text-sm">{{ $item->nomor_induk_ibu }}</td>
                                <td class="px-2 text-sm">{{ $item->alamat_ayah_ibu }}</td>
                                <td class="px-2 text-sm">{{ $item->nama_tunangan }}</td>
                                <td class="px-2 text-sm">{{ $item->status_kristentunangan->title ?? '-' }}</td>
                                <td class="px-2 text-sm">{{ $item->anggota_gereja_tunangan }}</td>
                                <td class="px-2 text-sm">{{ $item->nomor_induk_tunangan }}</td>
                                <td class="px-2 text-sm">{{ $item->alamat_tunangan }}</td>
                                <td class="px-2 text-sm">{{ $item->tempat_tunangan }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->tanggal_tunangan }}</td>
                                <td class="px-2 text-sm">{{ $item->nama_pasangan }}</td>
                                <td class="px-2 text-sm">{{ $item->anggota_gereja_pasangan }}</td>
                                <td class="px-2 text-sm">{{ $item->keterangan }}</td>
                                <td class="px-2 text-sm">{{ $item->jumlah_anak }}</td>
                                <td class="px-2 text-sm">{{ $item->masih_usaha }}</td>
                                <td class="px-2 text-sm">{{ $item->pengajar_katekasi }}</td>
                                <td class="px-2 text-sm">{{ $item->lama_katekasi }}</td>
                                <td class="px-2 text-sm">{{ $item->tempat_katekasi }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->tanggal_sidi }}</td>
                                <td class="px-2 text-sm">{{ $item->jam_kebaktian }}</td>
                                <td class="px-2 text-sm">{{ $item->tempat_gereja }}</td>
                                <td class="px-2 text-sm">{{ $item->lapor_kelompok }}</td>
                                <td class="text-xs text-center max-w-20 min-w-20">{{ $item->tanggal_melapor }}</td>
                                <td class="px-2 text-sm">{{ $item->ketua_kelompok }}</td>
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
