@section('page_title', $page_title)
<div id="nikah" class="flex flex-col gap-4 p-6 grow sm:p-8 lg:p-10 sm:gap-6">
    <div class="font-semibold uppercase cinzel">
        <div class="text-xl">Formulir</div>
        <div class="text-2xl">{{ $deskripsi }}</div>
    </div>

    <form wire:submit.prevent="send" class="flex flex-col gap-6">
        @csrf
        <div class="grid gap-4 sm:gap-6 sm:grid-cols-2">

            <div class="col-span-2"><x-app.label-input-text name="nama_casu" title="Nama Calon Suami"/></div>
            <x-app.label-input-text name="tempat_lahir_casu" title="Tempat Lahir"/>
            <x-app.label-input-date name="tanggal_nikah_casu" title="Tanggal Lahir"/>
            <x-app.label-input-text name="agama_casu" title="Agama"/>
            <x-app.label-input-date name="sidi_tanggal_casu" title="Sidi Tanggal"/>
            <x-app.label-input-text name="pekerjaan_casu" title="Pekerjaan"/>
            <x-app.label-textarea name="alamat_rumah_casu" title="Alamat Rumah"/>
            <x-app.label-input-text name="anggota_gereja_casu" title="Anggota Gereja"/>
            <x-app.label-input-text name="anggota_kelompok_casu" title="Kelompok/Blok"/>

            <div class="col-span-2"><x-app.label-input-text name="nama_cais" title="Nama Calon Istri"/></div>
            <x-app.label-input-text name="agama_cais" title="Agama"/>
            <x-app.label-input-date name="sidi_tanggal_cais" title="Sidi Tanggal"/>
            <x-app.label-input-text name="pekerjaan_cais" title="Pekerjaan"/>
            <x-app.label-textarea name="alamat_rumah_cais" title="Alamat Rumah"/>
            <x-app.label-input-text name="anggota_gereja_cais" title="Anggota Gereja"/>
            <x-app.label-input-text name="anggota_kelompok_cais" title="Kelompok/Blok"/>

            <x-app.label-input-date name="tanggal_nikah" title="Tanggal Pernikahan"/>
            <x-app.label-input-text name="tempat_nikah" title="Tempat Pernikahan"/>

            <x-app.label-input-text name="ortu_casu" title="Orang Tua Calon mempelai laki-laki"/>
            <x-app.label-input-text name="ortu_cais" title="Orang Tua Calon mempelai perempuan"/>
        </div>
        <div class="flex justify-end"><x-app.button-save title="Kirim"/></div>
    </form>
</div>
