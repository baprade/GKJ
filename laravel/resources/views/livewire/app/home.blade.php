@section('page_title', 'GKJ Wonogiri - Gereja Kristen Jawa Wonogiri | Jadwal Ibadah & Warta Jemaat')
@section('page_description', 'Website resmi Gereja Kristen Jawa (GKJ) Wonogiri. Informasi jadwal ibadah Minggu Gedung Induk dan Pepanthan, renungan harian, warta jemaat, dan streaming ibadah.')
<div class="grow">
    <x-app.home.hero :homeslide="$homeslide"/>
    <x-app.home.about/>
    <div class="flex flex-col gap-8 py-8">
        <x-app.home.schedule/>
        <x-app.home.news :news="$news"/>
        <x-app.home.gallery :photos="$photos" :videos="$videos"/>
    </div>
</div>
