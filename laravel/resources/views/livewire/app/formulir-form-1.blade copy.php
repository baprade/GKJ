@section('page_title', $page_title)
<div class="flex flex-col gap-4 p-6 grow sm:p-10 sm:gap-6">
    <div class="font-semibold uppercase cinzel">
        <div class="text-xl">Form</div>
        <div class="text-2xl">{{ $page_title }}</div>
    </div>

    {{-- <div class="flex flex-col gap-2">
        <div>Kepada Yth,<br>Majelis GKJ Wonogiri<br>di Wonogiri</div>
        <div>Dengan Hormat,<br>Yang bertanda tangan di bawah ini, saya</div>
    </div> --}}

    <div class="flex flex-col max-w-3xl gap-4">
        <x-app.label-input-text name="name" title="Nama"/>
        <x-app.label-input-text name="birth_city" title="Tempat Lahir"/>
        <x-app.label-input-date name="birth_date" title="Tanggal Lahir"/>
        <x-app.label-input-text name="ocupation" title="Pekerjaan"/>
        <x-app.label-textarea name="address" title="Alamat"/>
        <x-app.label-input-text name="group" title="Pepanthan/Kelompok"/>
        <x-app.button-save title="Kirim"/>
    </div>

    {{-- <div class="flex flex-col gap-2">
        <div>Dengan ini mengajukan permohonan untuk menjadi warga GKJ Wonogiri dan mengikuti kegiatan gerejawi yang diselenggarakan oleh GKJ Wonogiri.</div>
        <div>Adapun maksud dari permohonan saya ini adalah untuk dapat mengenal dan mengikuti pengajaran Kristen sehingga kemudian dapat menganut dan mempercayai pengajaran Kristen tersebut sebagai iman dan kepercayaan saya.</div>
        <div>Permohonan ini saya buat atas n sendiri dan dengan kessadaran dan tanggung jawab penuh tanpa paksaan dari pihak manapun dan apabila dikemudian hari terdapat permasalahan dari permohonan ini, maka GKJ Wonogiri akan dibebaskan dari segala tuntutan pihak manapun.</div>
        <div>Demikian permohonan ini, atas perhatian dan perkenan Majelis GKJ Wonogiri, saya mengucapkan terima kasih.</div>
    </div> --}}

</div>
