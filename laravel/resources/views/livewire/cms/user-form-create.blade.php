@section('page_title', $page_title)
<div id="users" class="flex items-center justify-center p-4 grow">
    <div class="flex flex-col items-center justify-center w-full max-w-sm gap-4 bg-white rounded-md shadow">
        <form wire:submit.prevent="save" class="flex flex-col w-full divide-y divide-slate-200">
            <div class="flex items-center justify-center py-3">
                <x-cms.page-title title="{{ $page_title }}"/>
            </div>

            @csrf
            <div class="flex flex-col gap-4 p-4 bg-slate-50">
                <x-cms.label-input-text-form name="name" title="Nama"/>
                <x-cms.label-input-text-form name="nickname" title="NickName"/>
                <x-cms.label-select-form name="id_role" title="Role" :options="$roles_array"/>
                <x-cms.label-input-text-form name="email" title="E-Mail"/>
                <x-cms.label-input-password-form name="password" title="Password"/>
                <x-cms.label-input-password-form name="password_confirm" title="Konfirmasi Password"/>
            </div>

            <div class="flex items-center justify-between gap-4 p-4">
                <x-cms.href-back href="{{ route('cms-users') }}" title="Users" awesome="fa-solid fa-reply"/>
                <x-cms.button-save title="Simpan"/>
            </div>
        </form>
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
