@section('page_title', $page_title)
<div id="users" class="flex items-center justify-center p-4 grow">
    <div class="flex flex-col items-center justify-center w-full max-w-sm gap-4 bg-white shadow-md rounded-xl">
        <form wire:submit.prevent="update" class="flex flex-col w-full divide-y divide-slate-200">
            <div class="flex items-center justify-center py-3">
                <x-cms.page-title title="{{ $page_title }}"/>
            </div>

            @csrf
            <div class="flex flex-col gap-4 p-4 bg-slate-50">
                <x-cms.label-input-text-disabled name="name" title="Nama"/>
                <x-cms.label-input-text-disabled name="email" title="E-Mail"/>
                <x-cms.label-input-password name="password" title="Password Baru"/>
                <x-cms.label-input-password name="password_confirm" title="Konfirmasi Password Baru"/>
            </div>

            <div class="flex items-center justify-between gap-4 p-4">
                <x-cms.href-back href="{{ route('cms-users') }}" title="Users" awesome="fa-solid fa-reply"/>
                <x-cms.button-reset/>
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
