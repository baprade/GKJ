@section('page_title', $page_title)
<div id="registrasi" class="flex flex-col gap-4 p-6 grow sm:p-8 lg:p-10 sm:gap-6">
    <div class="font-semibold uppercase cinzel">
        <div class="text-xl">Formulir</div>
        <div class="text-2xl">{{ $page_title }}</div>
    </div>

    <form wire:submit.prevent="send" class="flex flex-col gap-6">
        @csrf
        <div class="grid gap-4 sm:gap-6 sm:grid-cols-2">
            <x-app.label-input-text name="nama_meninggal" title="Nama yang Meninggal"/>
            <x-app.label-input-text name="kelompok" title="Pepanthan/Kelompok"/>
            <x-app.label-input-text name="tempat_lahir" title="Tempat Lahir"/>
            <x-app.label-input-date name="tanggal_lahir" title="Tanggal Lahir"/>
            <x-app.label-input-text name="no_induk_gereja" title="Nomor Induk Gereja"/>
            <x-app.label-textarea name="alamat" title="Alamat"/>
            <x-app.label-input-text name="pemohon" title="Pemohon"/>
            <x-app.label-input-text name="ketua_kelompok" title="Ketua Kelompok"/>
        </div>
        <div class="flex justify-end"><x-app.button-save title="Kirim"/></div>
    </form>
</div>
