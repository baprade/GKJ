@section('page_title', $page_title)
<div id="titip-warga" class="flex flex-col gap-4 p-6 grow sm:p-8 lg:p-10 sm:gap-6">
    <div class="font-semibold uppercase cinzel">
        <div class="text-xl">Formulir</div>
        <div class="text-2xl">{{ $deskripsi }}</div>
    </div>

    <form wire:submit.prevent="send" class="flex flex-col gap-6">
        @csrf
        <div class="grid gap-4 sm:gap-6 sm:grid-cols-2">
            {{-- 1 --}}
            <x-app.label-input-text name="nama_lengkap" title="Nama Lengkap"/>
            <x-app.label-select name="id_kelamin" title="Jenis Kelamin" :options="$sexes_array"/>

            {{-- 2 --}}
            <div class="col-span-2"><x-app.label-textarea name="alamat" title="Alamat"/></div>

            {{-- 3 --}}
            <x-app.label-input-text name="tempat_lahir" title="Tempat Lahir"/>
            <x-app.label-input-date name="tanggal_lahir" title="Tanggal Lahir"/>
            <x-app.label-input-text name="tempat_baptis" title="Tempat Baptis"/>
            <x-app.label-input-date name="tanggal_baptis" title="Tanggal Baptis"/>
            <div class="col-span-2"><x-app.label-input-text name="nama_pendeta_baptis" title="Pendeta yang melayani (baptis)"/></div>
            <x-app.label-input-text name="tempat_nikah" title="Tempat Nikah"/>
            <x-app.label-input-date name="tanggal_nikah" title="Tanggal Nikah"/>
            <div class="col-span-2"><x-app.label-input-text name="menikah_secara" title="Menikah secara"/></div>

            {{-- 4 --}}
            <x-app.label-input-text name="pendidikan" title="Pendidikan"/>
            <x-app.label-input-text name="pekerjaan" title="Pekerjaan"/>
            <x-app.label-input-text name="alamat_pekerjaan" title="Alamat Pekerjaan"/>
            <x-app.label-input-text name="keterangan_lain" title="Keterangan lain"/>

            {{-- 5 --}}
            <x-app.label-input-text name="nama_ayah" title="Nama Lengkap Ayah"/>
            <x-app.label-select-kristen name="status_kristen_ayah" title="Status Kristen Ayah"/>
            <x-app.label-input-text name="anggota_gereja_ayah" title="Anggota Gereja Ayah"/>
            <x-app.label-input-text name="nomor_induk_ayah" title="Nomor Induk Ayah"/>
            <x-app.label-input-text name="nama_ibu" title="Nama Lengkap Ibu"/>
            <x-app.label-select-kristen name="status_kristen_ibu" title="Status Kristen Ibu"/>
            <x-app.label-input-text name="anggota_gereja_ibu" title="Anggota Gereja Ibu"/>
            <x-app.label-input-text name="nomor_induk_ibu" title="Nomor Induk Ibu"/>
            <div class="col-span-2"><x-app.label-textarea name="alamat_ayah_ibu" title="Alamat Ayah Ibu"/></div>

            {{-- 6 --}}
            <x-app.label-input-text name="nama_tunangan" title="Nama Tunangan"/>
            <x-app.label-select-kristen name="status_kristen_tunangan" title="Status Kristen Tunangan"/>
            <x-app.label-input-text name="anggota_gereja_tunangan" title="Anggota Gereja Tunangan"/>
            <x-app.label-input-text name="nomor_induk_tunangan" title="Nomor Induk Tunangan"/>
            <div class="col-span-2"><x-app.label-textarea name="alamat_tunangan" title="Alamat Tunangan"/></div>
            <x-app.label-input-text name="tempat_tunangan" title="Tempat Bertunangan"/>
            <x-app.label-input-date name="tanggal_tunangan" title="Tanggal Bertunangan"/>

            {{-- 7 --}}
            <div class="col-span-2"><x-app.label-input-text name="nama_pasangan" title="Nama Suami/Istri"/></div>
            <x-app.label-input-text name="anggota_gereja_pasangan" title="Anggota Gereja"/>
            <x-app.label-input-text name="keterangan" title="Keterangan Pasangan"/>
            <x-app.label-input-text name="jumlah_anak" title="Jumlah Anak"/>
            <x-app.label-input-text name="masih_usaha" title="Masih dalam usaha"/>

            {{-- 8 --}}
            <div class="col-span-2"><x-app.label-input-text name="pengajar_katekasi" title="Pengajar Katekasi"/></div>
            <x-app.label-input-text name="lama_katekasi" title="Selama Katekasi"/>
            <x-app.label-input-text name="tempat_katekasi" title="Tempat Katekasi"/>

            {{-- 9 --}}
            <x-app.label-input-date name="tanggal_sidi" title="Tanggal SIDI"/>
            <x-app.label-input-text name="jam_kebaktian" title="Kebaktian Jam"/>
            <div class="col-span-2"><x-app.label-input-text name="tempat_gereja" title="Bertempat di Gereja"/></div>

            {{-- 10 --}}
            <x-app.label-input-text name="lapor_kelompok" title="Telah melapor di Kelompok"/>
            <x-app.label-input-date name="tanggal_melapor" title="Tanggal Melapor"/>
            <div class="col-span-2"><x-app.label-input-text name="ketua_kelompok" title="Ketua Kelompok"/></div>

        </div>
        <div class="flex justify-end"><x-app.button-save title="Kirim"/></div>
    </form>
</div>
