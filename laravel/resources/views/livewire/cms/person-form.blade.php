@section('page_title', $page_title)
<div id="post" class="flex items-start justify-center grow lg:p-4 xl:p-6">
    <div class="flex flex-col w-full h-full gap-4 p-0 bg-white lg:p-0 lg:h-auto lg:shadow lg:rounded-md">
    <form wire:submit.prevent="save" class="flex flex-col w-full divide-y divide-slate-200">
        <div class="flex items-center justify-center py-3">
            <x-cms.page-title title="{{ $page_title }}"/>
        </div>
        @csrf
        <div class="grid gap-4 p-4 lg:grid-cols-2 bg-slate-50">
            <div class="flex flex-col self-start h-full gap-4">
                <div><x-cms.label-input-date-form name="sidi" title="Sidi tanggal"/></div>
                <div><x-cms.label-input-text-form name="nikah_by" title="Nikah oleh"/></div>
                <div><x-cms.label-input-date-form name="nikah_date" title="Nikah tanggal"/></div>
                <div><x-cms.label-input-date-form name="passed_date" title="Meninggal tanggal"/></div>
                <div><x-cms.label-input-text-form name="parrent" title="Orang tua"/></div>
            </div>
            <div class="flex flex-col gap-4">
                <div><x-cms.label-input-text-form name="spouse" title="Suami/Istri"/></div>
                <div><x-cms.label-input-number-form name="nia" title="Nomor Induk Anak"/></div>
                <div><x-cms.label-input-text-form name="from" title="Dari"/></div>
                <div><x-cms.label-input-text-form name="to" title="Ke"/></div>
                <div><x-cms.label-textarea-form name="note" title="Keterangan"/></div>
            </div>
        </div>
        <div class="flex items-center justify-between gap-4 p-4">
            <x-cms.href-back href="{{ route('cms-people') }}" title="Jemaat" awesome="fa-solid fa-reply"/>
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
