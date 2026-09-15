@section('page_title', $page_title)
<div id="nikah" class="flex flex-col gap-4 p-6 grow sm:p-8 lg:p-10 sm:gap-6">
    <div class="font-semibold uppercase cinzel">
        <div class="text-xl">Formulir</div>
        <div class="text-2xl">{{ $deskripsi }}</div>
    </div>

    <form wire:submit.prevent="send" class="flex flex-col gap-6">
        @csrf
        <div class="grid gap-4 sm:gap-6 sm:grid-cols-2">

            <x-app.label-input-text name="nama" title="Nama"/>
            <x-app.label-input-text name="umur" title="Umur"/>
            <x-app.label-textarea name="alamat" title="Alamat"/>
            <x-app.label-input-text name="kelompok" title="Kelompok"/>
            <div class="col-span-2"><x-app.label-textarea name="penjelasan" title="Penjelasan Pengakuan"/></div>
            <x-app.label-input-text name="majelis_pembina_kelompok" title="Majelis Pembina Kelompok"/>

        </div>
        <div class="flex justify-end"><x-app.button-save title="Kirim"/></div>
    </form>
</div>
