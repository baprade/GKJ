@section('page_title', $page_title)
<div id="nikah" class="flex flex-col gap-4 p-6 grow sm:p-8 lg:p-10 sm:gap-6">
    <div class="font-semibold uppercase cinzel">
        <div class="text-xl">Formulir</div>
        <div class="text-2xl">{{ $deskripsi }}</div>
    </div>

    <form wire:submit.prevent="send" class="flex flex-col gap-6">
        @csrf
        <div class="grid gap-4 sm:gap-6 sm:grid-cols-2">

            <div class="col-span-2"><x-app.label-input-text name="nama_lengkap" title="Nama Lengkap"/></div>
            <x-app.label-input-text name="tempat_lahir" title="Tempat Lahir"/>
            <x-app.label-input-date name="tanggal_lahir" title="Tanggal Lahir"/>
            <x-app.label-textarea name="alamat" title="Alamat"/>
            <x-app.label-input-text name="pekerjaan" title="Pekerjaan"/>
            <x-app.label-input-text name="tempat_baptis" title="Tempat Baptis"/>
            <x-app.label-input-date name="tanggal_baptis" title="Tanggal Baptis"/>
            <x-app.label-input-text name="tempat_sidi" title="Tempat Sidi"/>
            <x-app.label-input-date name="tanggal_sidi" title="Tanggal Sidi"/>
            <div class="col-span-2"><x-app.label-select name="id_status_nikah" title="Status Nikah" :options="$marrieds_array"/></div>
            <div class="col-span-2"><x-app.label-input-text name="kelompok" title="Anggota Kelompok"/></div>

            <x-app.label-input-text name="anggota_gereja_baru" title="Anggota Gereja Baru"/>
            <x-app.label-textarea name="alamat_gereja_baru" title="Alamat Gereja Baru"/>
            <x-app.label-textarea name="alasan_pindah" title="Sebab/Alasan Pindah"/>
            <x-app.label-textarea name="alamat_baru" title="Alamat (Tempat Tinggal) Baru"/>

            <x-app.label-input-text name="pengikut" title="Pengikut"/>

            <x-app.label-input-text name="majelis_pembina_kelompok" title="Majelis Pembina Kelompok"/>

        </div>
        <div class="flex justify-end"><x-app.button-save title="Kirim"/></div>
    </form>
</div>
