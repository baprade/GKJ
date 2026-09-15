@section('page_title', $page_title)
<div id="formulir" class="flex flex-col items-center grow">
    <x-cms.menu-form/>
    <div class="p-4 grow lg:p-6">
        <div class="flex flex-wrap justify-center gap-4 lg:gap-6 max-w-7xl">
            <x-cms.formulir-item title="Pengajuan Registrasi" amount="{{ $AtestasiCount }}"/>
            <x-cms.formulir-item title="Kelahiran" amount="{{ $KelahiranCount }}"/>
            <x-cms.formulir-item title="Meninggal" amount="{{ $MeninggalCount }}"/>
            <x-cms.formulir-item title="Titip Warga" amount="{{ $TitipwargaCount }}"/>
            <x-cms.formulir-item title="Atestasi" amount="{{ $AtestasiCount }}"/>
            <x-cms.formulir-item title="Pengakuan Dosa" amount="{{ $PengakuanCount }}"/>
            <x-cms.formulir-item title="Pernikahan" amount="{{ $PernikahanCount }}"/>
            <x-cms.formulir-item title="Baptis Anak" amount="{{ $BaptisCount }}"/>
            <x-cms.formulir-item title="Sidi" amount="{{ $SidiCount }}"/>
        </div>
    </div>
</div>
