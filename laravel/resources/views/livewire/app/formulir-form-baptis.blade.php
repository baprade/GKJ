@section('page_title', $page_title)
<div id="titip-warga" class="flex flex-col gap-4 p-6 grow sm:p-8 lg:p-10 sm:gap-6">
    <div class="font-semibold uppercase cinzel">
        <div class="text-xl">Formulir</div>
        <div class="text-2xl">{{ $deskripsi }}</div>
    </div>

    <form wire:submit.prevent="send" class="flex flex-col gap-6">
        @csrf
        <div class="grid gap-4 sm:gap-6 sm:grid-cols-2">
            {{-- nama 1 --}}
            <x-app.label-input-text name="nama_1" title="Nama I"/>
            <x-app.label-input-text name="anggota_kelompok_1" title="Anggota Kelompok"/>
            <x-app.label-input-text name="anggota_gereja_1" title="Anggota Gereja"/>
            <x-app.label-input-text name="nomor_induk_1" title="Nomor Induk"/>
            <div class="col-span-2"><x-app.label-textarea name="alamat_1" title="Alamat Lengkap"/></div>

            {{-- nama 2 --}}
            <x-app.label-input-text name="nama_2" title="Nama II"/>
            <x-app.label-input-text name="anggota_kelompok_2" title="Anggota Kelompok"/>
            <x-app.label-input-text name="anggota_gereja_2" title="Anggota Gereja"/>
            <x-app.label-input-text name="nomor_induk_2" title="Nomor Induk"/>
            <div class="col-span-2"><x-app.label-textarea name="alamat_2" title="Alamat Lengkap"/></div>

            {{-- nama anak --}}
            <x-app.label-input-text name="nama_anak" title="Nama Anak"/>
            <x-app.label-select name="id_kelamin_anak" title="Jenis Kelamin" :options="$sexes_array"/>
            <x-app.label-input-text name="tempat_lahir" title="Tempat Lahir"/>
            <x-app.label-input-date name="tanggal_lahir" title="Tanggal Lahir"/>
            <x-app.label-input-date name="tanggal_lapor_capil" title="Tanggal Melapor ke Catatan Sipil"/>
            <x-app.label-input-text name="akta_lahir" title="Akta Kelahiran"/>

            <x-app.label-input-text name="lapor_kelompok" title="Telah melapor di Kelompok"/>
            <x-app.label-input-date name="tanggal_melapor" title="Tanggal Melapor"/>
            <div class="col-span-2"><x-app.label-input-text name="ketua_kelompok" title="Ketua Kelompok"/></div>
        </div>
        <div class="flex justify-end"><x-app.button-save title="Kirim"/></div>
    </form>
</div>
