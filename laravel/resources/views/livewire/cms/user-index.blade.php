@section('page_title', $page_title)
<div id="users" class="flex items-start justify-center grow lg:p-6">
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
                            <x-cms.th title="Nama" class="text-start"/>
                            <x-cms.th title="NickName" class="text-start"/>
                            <x-cms.th title="EMail" class="text-start"/>
                            <x-cms.th title="Role" class="text-start"/>
                            <x-cms.th title="Status" class=""/>
                            <x-cms.th title="Edit" class=""/>
                            <x-cms.th title="Created" class=""/>
                            <x-cms.th title="Password" class=""/>
                            <x-cms.th title="Hapus" class=""/>
                        </tr>
                    </thead>
                    <tbody>
@if ($items->isNotEmpty())
    @foreach ($items as $item)
                        <tr wire:key="{{ $item->id }}" class="border-t border-slate-200 hover:bg-slate-100 hover:text-black">
                            <td class="text-sm text-center">{{ $loop->index + $items->firstitem() }}</td>
                            <td class="px-2">{{ $item->name }}</td>
                            {{-- <td class="text-center">@if (! empty($item->avatar))
                                <img src="{{ $item->avatar }}" alt="avatar" class="w-8 h-8 mx-auto text-xs rounded-full"/>
                            @endif</td> --}}
                            <td class="px-2 text-sm">{{ $item->nickname }}</td>
                            <td class="px-2 text-sm">{{ $item->email }}</td>
                            <td class="px-2 text-sm">{{ $item->role->title ?? null }}</td>
                            <td class="px-2"><x-cms.onoff onoff="{{ $item->onoff }}"/></td>
                            <td class="text-center"><x-cms.href-edit href="{{ route('cms-users-edit', ['id' => $item->id]) }}"/></td>
                            <td class="w-1 text-xs text-center">{{ $item->created_at }}</td>
                            <td class="text-center"><a class="text-xs font-medium text-red-500 uppercase border-b border-transparent hover:text-red-500 hover:border-red-500" href="{{ route('cms-users-password-reset', ['id' => $item->id]) }}">Reset</a></td>
                            <td class="py-1 text-center"><x-cms.button-delete :item="$item"/></td>
                        </tr>
    @endforeach
@else
                        <tr>
                            <td colspan="11" class="py-5 text-sm font-light text-center border-t border-slate-200">- x -</td>
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
