@section('page_title', $page_title)
<div id="kelahiran" class="flex flex-col gap-4 p-6 grow sm:p-8 lg:p-10 sm:gap-6">
    <div class="font-semibold uppercase cinzel">
        <div class="text-xl">Formulir</div>
        <div class="text-2xl">{{ $page_title }}</div>
    </div>

    <form wire:submit.prevent="send" class="flex flex-col gap-6">
        @csrf
        <div class="grid gap-4 sm:gap-6 sm:grid-cols-2">
            <x-app.label-input-text name="nama_suami" title="Nama Suami"/>
            <x-app.label-input-number name="nik_suami" title="NIK Suami"/>
            <x-app.label-input-text name="nama_istri" title="Nama Istri"/>
            <x-app.label-input-number name="nik_istri" title="NIK Istri"/>
            <x-app.label-textarea name="alamat" title="Alamat"/>
            <x-app.label-input-text name="kelompok" title="Pepanthan/Kelompok"/>
            <x-app.label-input-text name="nama_anak" title="Nama Anak"/>
            <x-app.label-select name="id_jenis_kelamin_anak" title="Jenis Kelamin Anak" :options="$sexes_array"/>
            <div class="w-1/2"><x-app.label-input-number name="anak_nomor_ke" title="Anak Nomor ke"/></div>
            <x-app.label-input-date name="tanggal_lahir_anak" title="Tanggal Lahir Anak"/>
            <x-app.label-input-date name="tanggal_lapor_capil" title="Melaporkan ke Kantor Catatan Sipil"/>
            <x-app.label-input-date name="tanggal_lapor_gereja" title="Lapor ke Gereja"/>
            <x-app.label-textarea name="keterangan_lain" title="Keterangan lain-lain"/>
            <div class="flex flex-col gap-4">
                <x-app.label-input-text name="pemohon" title="Pemohon"/>
                <x-app.label-input-text name="ketua_kelompok" title="Ketua Kelompok"/>
            </div>
        </div>
        <div class="flex justify-end"><x-app.button-save title="Kirim"/></div>
    </form>
</div>
