@php
    $currentMonth = (int) date('n');
    $isBulanGenap = ($currentMonth % 2 === 0);
    $indukPagiLang = $isBulanGenap ? 'Bahasa Jawa' : 'Bahasa Indonesia';
    $indukSoreLang = $isBulanGenap ? 'Bahasa Indonesia' : 'Bahasa Jawa';
    $pokohLang = $isBulanGenap ? 'Bahasa Indonesia' : 'Bahasa Jawa';
    $namaBulan = \Carbon\Carbon::now()->translatedFormat('F Y');
@endphp

<div id="schedule" class="grid gap-6 px-6 py-8 mx-auto bg-neutral-50 lg:px-8 max-w-7xl rounded-2xl border border-neutral-200">
    <div class="text-center">
        <div class="text-xs font-semibold tracking-wider text-amber-800 uppercase">Pelayanan & Persekutuan Warga</div>
        <h2 class="text-xl font-bold text-black uppercase cinzel lg:text-3xl mt-1">Jadwal Ibadah GKJ Wonogiri</h2>
        <p class="text-sm text-neutral-600 mt-1 max-w-2xl mx-auto">
            Jadwal ibadah rutin di Gedung Induk dan Pepanthan wilayah GKJ Wonogiri.
        </p>
        <div class="inline-flex items-center gap-1.5 px-3 py-1 mt-2 text-xs font-medium text-amber-900 bg-amber-100/80 border border-amber-300/60 rounded-full">
            <i class="fa-regular fa-calendar-check"></i>
            <span>Bulan Ini ({{ $namaBulan }}): <strong>Bulan {{ $isBulanGenap ? 'Genap' : 'Ganjil' }}</strong></span>
        </div>
    </div>

    <!-- Grid Induk vs Pepanthan -->
    <div class="grid gap-6 lg:grid-cols-2">
        <!-- Kolom 1: Gereja Induk Wonogiri -->
        <div class="flex flex-col gap-3 p-5 bg-white border-2 border-neutral-800 rounded-xl shadow-sm">
            <div class="flex items-center justify-between pb-2 border-b border-neutral-100">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-church text-amber-800 text-lg"></i>
                    <span class="font-bold text-neutral-900 text-base">Gedung Induk GKJ Wonogiri</span>
                </div>
                <span class="text-[11px] font-semibold px-2 py-0.5 bg-neutral-900 text-white rounded">INDUK</span>
            </div>

            <div class="grid grid-cols-2 gap-3 mt-1">
                <!-- Ibadah Pagi Induk -->
                <div class="p-3.5 bg-neutral-50 rounded-lg border border-neutral-200 flex flex-col justify-between">
                    <div>
                        <div class="text-xs text-neutral-500 font-medium">Ibadah Pagi</div>
                        <div class="text-2xl font-bold text-neutral-900 cinzel my-1">07.00 <span class="text-xs font-normal text-neutral-500">WIB</span></div>
                    </div>
                    <div class="text-xs font-medium text-amber-800 bg-amber-50 px-2 py-0.5 rounded border border-amber-200/60 text-center">
                        {{ $indukPagiLang }}
                    </div>
                </div>

                <!-- Ibadah Sore Induk -->
                <div class="p-3.5 bg-neutral-50 rounded-lg border border-neutral-200 flex flex-col justify-between">
                    <div>
                        <div class="text-xs text-neutral-500 font-medium">Ibadah Sore</div>
                        <div class="text-2xl font-bold text-neutral-900 cinzel my-1">16.30 <span class="text-xs font-normal text-neutral-500">WIB</span></div>
                    </div>
                    <div class="text-xs font-medium text-sky-800 bg-sky-50 px-2 py-0.5 rounded border border-sky-200/60 text-center">
                        {{ $indukSoreLang }}
                    </div>
                </div>
            </div>

            <p class="text-[11px] text-neutral-500 italic mt-1">
                * Keterangan bahasa bergantian: Bulan Genap (Pagi: Jawa, Sore: Indonesia) & Bulan Ganjil (Pagi: Indonesia, Sore: Jawa).
            </p>
        </div>

        <!-- Kolom 2: Pepanthan (Cabang) -->
        <div class="flex flex-col gap-3 p-5 bg-white border border-neutral-200 rounded-xl shadow-sm">
            <div class="flex items-center justify-between pb-2 border-b border-neutral-100">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-rose-600 text-lg"></i>
                    <span class="font-bold text-neutral-900 text-base">Wilayah Pepanthan</span>
                </div>
                <span class="text-[11px] font-semibold px-2 py-0.5 bg-neutral-100 text-neutral-700 rounded border border-neutral-200">4 CABANG</span>
            </div>

            <div class="grid grid-cols-2 gap-2.5 text-xs">
                <!-- Pokoh Kidul -->
                <div class="p-3 bg-neutral-50 border border-neutral-200 rounded-lg flex flex-col justify-between">
                    <div>
                        <div class="font-bold text-neutral-900">Pept. Pokoh Kidul</div>
                        <div class="text-lg font-bold text-neutral-800 cinzel my-0.5">08.00 <span class="text-[10px] font-normal text-neutral-500">WIB</span></div>
                    </div>
                    <div class="text-[10px] text-neutral-600 font-medium mt-1">
                        {{ $pokohLang }}
                    </div>
                </div>

                <!-- Timang -->
                <div class="p-3 bg-neutral-50 border border-neutral-200 rounded-lg flex flex-col justify-between">
                    <div>
                        <div class="font-bold text-neutral-900">Pept. Timang</div>
                        <div class="text-lg font-bold text-neutral-800 cinzel my-0.5">07.00 <span class="text-[10px] font-normal text-neutral-500">WIB</span></div>
                    </div>
                    <div class="text-[10px] text-sky-800 font-medium mt-1">
                        Bhs. Indonesia (Minggu 2 & 4)
                    </div>
                </div>

                <!-- Mento -->
                <div class="p-3 bg-neutral-50 border border-neutral-200 rounded-lg flex flex-col justify-between">
                    <div>
                        <div class="font-bold text-neutral-900">Pept. Mento</div>
                        <div class="text-lg font-bold text-neutral-800 cinzel my-0.5">07.00 <span class="text-[10px] font-normal text-neutral-500">WIB</span></div>
                    </div>
                    <div class="text-[10px] text-amber-800 font-medium mt-1">
                        Bahasa Jawa
                    </div>
                </div>

                <!-- Jatisobo -->
                <div class="p-3 bg-neutral-50 border border-neutral-200 rounded-lg flex flex-col justify-between">
                    <div>
                        <div class="font-bold text-neutral-900">Pept. Jatisobo</div>
                        <div class="text-lg font-bold text-neutral-800 cinzel my-0.5">07.00 <span class="text-[10px] font-normal text-neutral-500">WIB</span></div>
                    </div>
                    <div class="text-[10px] text-sky-800 font-medium mt-1">
                        Bhs. Indonesia (Minggu Terakhir)
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex flex-wrap items-center justify-between gap-3 pt-2 border-t border-neutral-200 text-xs text-neutral-500">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-circle-info text-amber-600"></i>
            <span>Apabila terdapat perubahan waktu & tempat ibadah akan diinformasikan dalam warta jemaat.</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ url('galeri-foto/104/jadwal-ibadah') }}" wire:navigate class="inline-flex items-center gap-1.5 px-3 py-1.5 font-semibold text-white bg-neutral-900 hover:bg-neutral-800 rounded-lg shadow-sm transition">
                <i class="fa-regular fa-image"></i>
                <span>Lihat Poster Resmi</span>
            </a>
            <a href="https://maps.google.com/?q=GKJ+Wonogiri" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1.5 font-semibold text-neutral-700 bg-white border border-neutral-300 hover:bg-neutral-100 rounded-lg shadow-sm transition">
                <i class="fa-solid fa-location-dot text-rose-600"></i>
                <span>Google Maps</span>
            </a>
        </div>
    </div>
</div>
