@section('page_title', $page_title)
<div id="dashboard" class="flex flex-col items-center justify-start gap-4 p-4 grow lg:p-6 lg:gap-6">
    <div class="grid w-full grid-cols-3 gap-4 lg:gap-6 max-w-7xl">
        <x-cms.dashboard-item4 title="Berita" amount="{{ $beritaCount }}"/>
        <x-cms.dashboard-item4 title="Galeri Foto" amount="{{ $galfotoCount }}"/>
        <x-cms.dashboard-item4 title="Galeri Video" amount="{{ $galvideoCount }}"/>
    </div>

    <div class="grid w-full grid-cols-2 gap-4 lg:gap-6 max-w-7xl">
        <x-cms.dashboard-item4 title="Jemaat" amount="{{ $jemaatCount }}"/>
        <x-cms.dashboard-item4 title="Formulir Masuk" amount="{{ $formulirCount }}"/>
    </div>
</div>
