@php
    $currentMonth = (int) date('n');
    $isBulanGenap = ($currentMonth % 2 === 0);
    $indukPagiLang = $isBulanGenap ? 'Bahasa Jawa' : 'Bahasa Indonesia';
    $indukSoreLang = $isBulanGenap ? 'Bahasa Indonesia' : 'Bahasa Jawa';
    $pokohLang = $isBulanGenap ? 'Bahasa Indonesia' : 'Bahasa Jawa';
    $namaBulan = \Carbon\Carbon::now()->translatedFormat('F Y');
@endphp

<section id="schedule" class="w-full px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    <div class="bg-white border border-neutral-200/90 rounded-2xl shadow-sm overflow-hidden">
        <!-- Header Section -->
        <div class="px-6 py-7 sm:px-8 bg-neutral-50/80 border-b border-neutral-200/70 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold tracking-wider text-amber-900 uppercase">
                    <i class="fa-solid fa-cross text-[11px] text-amber-800"></i>
                    <span>Liturgi & Ibadah Jemaat</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-neutral-900 cinzel mt-1">Jadwal Ibadah GKJ Wonogiri</h2>
                <p class="text-xs sm:text-sm text-neutral-500 mt-0.5">Waktu pelaksanaan ibadah rutin di Gedung Induk dan Pepanthan.</p>
            </div>
            <div class="flex items-center gap-2.5">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-white border border-neutral-200 rounded-full text-xs font-medium text-neutral-700 shadow-2xs">
                    <i class="fa-regular fa-calendar text-neutral-500"></i>
                    <span>Periode {{ $namaBulan }} &bull; <strong class="text-neutral-900">Bulan {{ $isBulanGenap ? 'Genap' : 'Ganjil' }}</strong></span>
                </div>
            </div>
        </div>

        <!-- Body Grid -->
        <div class="p-6 sm:p-8 grid gap-6 lg:grid-cols-12">
            <!-- Kolom Induk (5 cols) -->
            <div class="lg:col-span-5 flex flex-col gap-4">
                <div class="flex items-center justify-between pb-2 border-b border-neutral-200">
                    <div class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-md bg-neutral-900 text-white flex items-center justify-center text-xs">
                            <i class="fa-solid fa-church"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-neutral-900 text-sm sm:text-base leading-tight">Gedung Induk</h3>
                            <span class="text-[11px] text-neutral-500">Pusat GKJ Wonogiri</span>
                        </div>
                    </div>
                    <span class="text-[10px] font-semibold tracking-wider uppercase px-2 py-0.5 bg-neutral-100 text-neutral-700 rounded border border-neutral-200">Setiap Minggu</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-3">
                    <!-- Ibadah Pagi -->
                    <div class="p-4 rounded-xl border border-neutral-200/90 bg-linear-to-br from-white to-neutral-50/50 hover:border-neutral-300 transition flex items-center justify-between">
                        <div class="flex items-start gap-3">
                            <div class="mt-0.5 text-neutral-400">
                                <i class="fa-regular fa-sun text-base text-amber-600"></i>
                            </div>
                            <div>
                                <div class="text-[11px] font-medium text-neutral-500 uppercase tracking-wide">Ibadah Pagi</div>
                                <div class="text-2xl font-bold text-neutral-900 cinzel leading-none mt-1">07.00 <span class="text-xs font-normal text-neutral-500">WIB</span></div>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="inline-block text-xs font-medium px-2.5 py-1 rounded-md {{ $isBulanGenap ? 'bg-amber-50 text-amber-800 border border-amber-200/70' : 'bg-neutral-100 text-neutral-800 border border-neutral-200' }}">
                                {{ $indukPagiLang }}
                            </span>
                        </div>
                    </div>

                    <!-- Ibadah Sore -->
                    <div class="p-4 rounded-xl border border-neutral-200/90 bg-linear-to-br from-white to-neutral-50/50 hover:border-neutral-300 transition flex items-center justify-between">
                        <div class="flex items-start gap-3">
                            <div class="mt-0.5 text-neutral-400">
                                <i class="fa-regular fa-moon text-base text-indigo-600"></i>
                            </div>
                            <div>
                                <div class="text-[11px] font-medium text-neutral-500 uppercase tracking-wide">Ibadah Sore</div>
                                <div class="text-2xl font-bold text-neutral-900 cinzel leading-none mt-1">16.30 <span class="text-xs font-normal text-neutral-500">WIB</span></div>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="inline-block text-xs font-medium px-2.5 py-1 rounded-md {{ !$isBulanGenap ? 'bg-amber-50 text-amber-800 border border-amber-200/70' : 'bg-neutral-100 text-neutral-800 border border-neutral-200' }}">
                                {{ $indukSoreLang }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="text-[11px] text-neutral-500 bg-neutral-50 p-3 rounded-lg border border-neutral-200/70 flex items-start gap-2 leading-relaxed">
                    <i class="fa-solid fa-circle-info text-neutral-400 mt-0.5"></i>
                    <span><strong>Ketentuan Bahasa:</strong> Bulan Genap (Pagi: Jawa, Sore: Indonesia) dan Bulan Ganjil (Pagi: Indonesia, Sore: Jawa).</span>
                </div>
            </div>

            <!-- Kolom Pepanthan (7 cols) -->
            <div class="lg:col-span-7 flex flex-col gap-4">
                <div class="flex items-center justify-between pb-2 border-b border-neutral-200">
                    <div class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-md bg-neutral-100 text-neutral-800 border border-neutral-200 flex items-center justify-center text-xs">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-neutral-900 text-sm sm:text-base leading-tight">Wilayah Pepanthan</h3>
                            <span class="text-[11px] text-neutral-500">Cabang Persekutuan</span>
                        </div>
                    </div>
                    <span class="text-[10px] font-semibold tracking-wider uppercase px-2 py-0.5 bg-neutral-100 text-neutral-600 rounded border border-neutral-200">4 Lokasi</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <!-- Pokoh Kidul -->
                    <div class="p-3.5 rounded-xl border border-neutral-200/90 bg-white flex flex-col justify-between hover:border-neutral-300 transition">
                        <div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-neutral-900">Pept. Pokoh Kidul</span>
                                <span class="text-[10px] text-neutral-400 font-mono">08.00 WIB</span>
                            </div>
                            <div class="text-xl font-bold text-neutral-900 cinzel my-1">08.00 <span class="text-[11px] font-normal text-neutral-500">WIB</span></div>
                        </div>
                        <div class="pt-2 border-t border-neutral-100 mt-2 flex items-center justify-between text-xs">
                            <span class="text-neutral-500 text-[11px]">Bahasa:</span>
                            <span class="font-medium text-neutral-800 px-2 py-0.5 bg-neutral-50 rounded border border-neutral-200 text-[11px]">
                                {{ $pokohLang }}
                            </span>
                        </div>
                    </div>

                    <!-- Timang -->
                    <div class="p-3.5 rounded-xl border border-neutral-200/90 bg-white flex flex-col justify-between hover:border-neutral-300 transition">
                        <div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-neutral-900">Pept. Timang</span>
                                <span class="text-[10px] text-neutral-400 font-mono">07.00 WIB</span>
                            </div>
                            <div class="text-xl font-bold text-neutral-900 cinzel my-1">07.00 <span class="text-[11px] font-normal text-neutral-500">WIB</span></div>
                        </div>
                        <div class="pt-2 border-t border-neutral-100 mt-2 flex items-center justify-between text-xs">
                            <span class="text-neutral-500 text-[11px]">Minggu ke-2 & 4:</span>
                            <span class="font-medium text-neutral-800 px-2 py-0.5 bg-neutral-50 rounded border border-neutral-200 text-[11px]">
                                Bhs. Indonesia
                            </span>
                        </div>
                    </div>

                    <!-- Mento -->
                    <div class="p-3.5 rounded-xl border border-neutral-200/90 bg-white flex flex-col justify-between hover:border-neutral-300 transition">
                        <div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-neutral-900">Pept. Mento</span>
                                <span class="text-[10px] text-neutral-400 font-mono">07.00 WIB</span>
                            </div>
                            <div class="text-xl font-bold text-neutral-900 cinzel my-1">07.00 <span class="text-[11px] font-normal text-neutral-500">WIB</span></div>
                        </div>
                        <div class="pt-2 border-t border-neutral-100 mt-2 flex items-center justify-between text-xs">
                            <span class="text-neutral-500 text-[11px]">Bahasa:</span>
                            <span class="font-medium text-neutral-800 px-2 py-0.5 bg-neutral-50 rounded border border-neutral-200 text-[11px]">
                                Bahasa Jawa
                            </span>
                        </div>
                    </div>

                    <!-- Jatisobo -->
                    <div class="p-3.5 rounded-xl border border-neutral-200/90 bg-white flex flex-col justify-between hover:border-neutral-300 transition">
                        <div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-neutral-900">Pept. Jatisobo</span>
                                <span class="text-[10px] text-neutral-400 font-mono">07.00 WIB</span>
                            </div>
                            <div class="text-xl font-bold text-neutral-900 cinzel my-1">07.00 <span class="text-[11px] font-normal text-neutral-500">WIB</span></div>
                        </div>
                        <div class="pt-2 border-t border-neutral-100 mt-2 flex items-center justify-between text-xs">
                            <span class="text-neutral-500 text-[11px]">Minggu Terakhir:</span>
                            <span class="font-medium text-neutral-800 px-2 py-0.5 bg-neutral-50 rounded border border-neutral-200 text-[11px]">
                                Bhs. Indonesia
                            </span>
                        </div>
                    </div>
                </div>

                <div class="text-[11px] text-neutral-500 bg-neutral-50 p-3 rounded-lg border border-neutral-200/70 flex items-start gap-2 leading-relaxed">
                    <i class="fa-solid fa-clock-rotate-left text-neutral-400 mt-0.5"></i>
                    <span>* Pokoh Kidul bergantian tiap bulan (Genap: Indonesia, Ganjil: Jawa). Timang & Jatisobo berjadwal khusus.</span>
                </div>
            </div>
        </div>

        <!-- Footer / Action bar -->
        <div class="px-6 py-4 sm:px-8 bg-neutral-50 border-t border-neutral-200/70 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
            <div class="text-neutral-500 flex items-center gap-2">
                <i class="fa-solid fa-bell text-neutral-400"></i>
                <span>Apabila terdapat penyesuaian waktu & tempat ibadah, akan dicantumkan dalam warta jemaat.</span>
            </div>
            <div class="flex items-center gap-2 w-full sm:w-auto justify-end">
                <a href="{{ url('galeri-foto/104/jadwal-ibadah') }}" wire:navigate class="inline-flex items-center gap-2 px-3.5 py-1.5 font-medium text-white bg-neutral-900 hover:bg-neutral-800 rounded-lg transition text-xs shadow-2xs">
                    <i class="fa-regular fa-image"></i>
                    <span>Poster Warta</span>
                </a>
                <a href="https://maps.google.com/?q=GKJ+Wonogiri" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-3.5 py-1.5 font-medium text-neutral-700 bg-white border border-neutral-300 hover:bg-neutral-100 rounded-lg transition text-xs shadow-2xs">
                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-neutral-500"></i>
                    <span>Peta Lokasi</span>
                </a>
            </div>
        </div>
    </div>
</section>
