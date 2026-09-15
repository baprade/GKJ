@section('page_title', $page_title)
<div id="categories" class="flex items-start justify-center grow lg:p-6">
    <div class="flex flex-col w-full h-full gap-4 p-0 bg-white lg:p-0 lg:w-auto lg:h-auto lg:shadow lg:rounded-md">
        <div class="flex flex-col divide-y divide-slate-200">
            <div class="flex items-center justify-between p-1 ps-4">
                <x-cms.page-title-awesome title="{{ $page_title }}" awesome="{{ $awesome }}"/>
                <x-cms.button-create/>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <x-cms.th title="No" class=""/>
                            <x-cms.th title="Nama Kategori" class="text-start"/>
                            <x-cms.th title="Slug" class="text-start"/>
                            <x-cms.th title="Deskripsi" class="text-start"/>
                            <x-cms.th title="Edit" class=""/>
                            <x-cms.th title="Hapus" class=""/>
                        </tr>
                    </thead>
                    <tbody>
@if ($items->isNotEmpty())
@foreach ($items as $item)
                        <tr wire:key="{{ $item->id }}" class="border-t hover:bg-slate-100 border-slate-200">
                            <td class="text-sm text-center">{{ $loop->index + 1 }}</td>
                            <td class="px-2">{{ $item->title }}</td>
                            <td class="px-2 text-sm">{{ $item->slug }}</td>
                            <td class="px-2 text-xs">{{ $item->description }}</td>
                            <td><x-cms.button-edit item_id="{{ $item->id }}"/></td>
                            <td><x-cms.button-delete :item="$item"/></td>
                        </tr>
@endforeach
@else
                        <tr>
                            <td colspan="10" class="py-5 text-sm font-light text-center border-t border-slate-200">- x -</td>
                        </tr>
@endif
                    </tbody>
                </table>
            </div>

            <div class="py-1 ps-3 pe-1"></div>
        </div>
    </div>

@if($isModalOpen)
    @include('livewire.cms.categories-form')
@endif

@if (session()->has('message'))
    @if (session('theme') == 'warning')
        <x-cms.notif-warning message="{{ session('message') }}"/>
    @endif
    @if (session('theme') == 'success')
        <x-cms.notif-success message="{{ session('message') }}"/>
    @endif
@endif

</div>
