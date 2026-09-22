@php
    $currentMonth = (int) date('n');
    $isBulanGenap = ($currentMonth % 2 === 0);
    $indukPagiLang = $isBulanGenap ? 'Bahasa Jawa' : 'Bahasa Indonesia';
    $indukSoreLang = $isBulanGenap ? 'Bahasa Indonesia' : 'Bahasa Jawa';
    $pokohLang = $isBulanGenap ? 'Bahasa Indonesia' : 'Bahasa Jawa';
    $namaBulan = \Carbon\Carbon::now()->translatedFormat('F Y');
@endphp

<section id="schedule" class="w-full px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
    <div class="bg-white border border-neutral-200 rounded-xl shadow-xs overflow-hidden">
        
        <!-- Header -->
        <div class="px-6 py-5 border-b border-neutral-200 bg-neutral-50/60 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-neutral-900 cinzel">Jadwal Ibadah Hari Minggu</h2>
                <p class="text-xs text-neutral-500 mt-0.5">Gedung Induk & Pepanthan GKJ Wonogiri</p>
            </div>
            <div class="inline-flex items-center gap-2 self-start sm:self-auto px-3 py-1 bg-white border border-neutral-200 rounded-full text-xs font-medium text-neutral-700">
                <i class="fa-regular fa-calendar text-neutral-400"></i>
                <span>{{ $namaBulan }} &bull; <strong class="text-amber-900">Bulan {{ $isBulanGenap ? 'Genap' : 'Ganjil' }}</strong></span>
            </div>
        </div>

        <!-- Tabel Ibadah Gedung Induk -->
        <div class="p-6">
            <div class="text-xs font-bold uppercase tracking-wider text-neutral-400 mb-3 flex items-center gap-2">
                <i class="fa-solid fa-church text-neutral-700"></i>
                <span>Gedung Induk (Jl. Murtipranoto No. 92)</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <!-- Ibadah Pagi -->
                <div class="flex items-center justify-between p-4 rounded-lg bg-neutral-50 border border-neutral-200">
                    <div class="flex items-baseline gap-3">
                        <span class="text-2xl font-bold text-neutral-900 cinzel">07.00</span>
                        <span class="text-xs text-neutral-500 font-mono">WIB</span>
                        <span class="text-sm font-semibold text-neutral-800 ml-1">Ibadah Pagi</span>
                    </div>
                    <span class="text-xs font-semibold px-2.5 py-1 rounded bg-white border border-neutral-200 text-neutral-800 shadow-2xs">
                        {{ $indukPagiLang }}
                    </span>
                </div>

                <!-- Ibadah Sore -->
                <div class="flex items-center justify-between p-4 rounded-lg bg-neutral-50 border border-neutral-200">
                    <div class="flex items-baseline gap-3">
                        <span class="text-2xl font-bold text-neutral-900 cinzel">16.30</span>
                        <span class="text-xs text-neutral-500 font-mono">WIB</span>
                        <span class="text-sm font-semibold text-neutral-800 ml-1">Ibadah Sore</span>
                    </div>
                    <span class="text-xs font-semibold px-2.5 py-1 rounded bg-white border border-neutral-200 text-neutral-800 shadow-2xs">
                        {{ $indukSoreLang }}
                    </span>
                </div>
            </div>

            <div class="text-[11px] text-neutral-500 mt-2.5 flex items-center gap-1.5">
                <i class="fa-solid fa-circle-info text-neutral-400"></i>
                <span>Ketentuan bahasa Induk: Bulan Genap (Pagi Jawa, Sore Indonesia) &bull; Bulan Ganjil (Pagi Indonesia, Sore Jawa).</span>
            </div>
        </div>

        <!-- Tabel Wilayah Pepanthan -->
        <div class="px-6 pb-6 pt-2 border-t border-neutral-100">
            <div class="text-xs font-bold uppercase tracking-wider text-neutral-400 mb-3 mt-4 flex items-center gap-2">
                <i class="fa-solid fa-map-location-dot text-neutral-700"></i>
                <span>Wilayah Pepanthan (Cabang)</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b border-neutral-200 text-[11px] font-bold text-neutral-400 uppercase">
                            <th class="py-2 font-semibold">Tempat / Pepanthan</th>
                            <th class="py-2 font-semibold">Waktu</th>
                            <th class="py-2 font-semibold">Bahasa Pengantar</th>
                            <th class="py-2 font-semibold text-right">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-100 text-neutral-800">
                        <!-- Pokoh Kidul -->
                        <tr class="hover:bg-neutral-50/60 transition">
                            <td class="py-3 font-semibold text-neutral-900">Pept. Pokoh Kidul</td>
                            <td class="py-3 font-mono font-bold cinzel text-base text-neutral-900">08.00 <span class="text-xs font-normal text-neutral-500 font-sans">WIB</span></td>
                            <td class="py-3">
                                <span class="inline-block text-xs font-medium px-2 py-0.5 rounded bg-neutral-100 text-neutral-800 border border-neutral-200">
                                    {{ $pokohLang }}
                                </span>
                            </td>
                            <td class="py-3 text-xs text-neutral-500 text-right">Bulan Genap (Indonesia), Bulan Ganjil (Jawa)</td>
                        </tr>

                        <!-- Timang -->
                        <tr class="hover:bg-neutral-50/60 transition">
                            <td class="py-3 font-semibold text-neutral-900">Pept. Timang</td>
                            <td class="py-3 font-mono font-bold cinzel text-base text-neutral-900">07.00 <span class="text-xs font-normal text-neutral-500 font-sans">WIB</span></td>
                            <td class="py-3">
                                <span class="inline-block text-xs font-medium px-2 py-0.5 rounded bg-neutral-100 text-neutral-800 border border-neutral-200">
                                    Bahasa Indonesia
                                </span>
                            </td>
                            <td class="py-3 text-xs text-neutral-500 text-right">Ibadah setiap Minggu ke-2 & ke-4</td>
                        </tr>

                        <!-- Mento -->
                        <tr class="hover:bg-neutral-50/60 transition">
                            <td class="py-3 font-semibold text-neutral-900">Pept. Mento</td>
                            <td class="py-3 font-mono font-bold cinzel text-base text-neutral-900">07.00 <span class="text-xs font-normal text-neutral-500 font-sans">WIB</span></td>
                            <td class="py-3">
                                <span class="inline-block text-xs font-medium px-2 py-0.5 rounded bg-amber-50 text-amber-900 border border-amber-200/60">
                                    Bahasa Jawa
                                </span>
                            </td>
                            <td class="py-3 text-xs text-neutral-500 text-right">Ibadah setiap Minggu</td>
                        </tr>

                        <!-- Jatisobo -->
                        <tr class="hover:bg-neutral-50/60 transition">
                            <td class="py-3 font-semibold text-neutral-900">Pept. Jatisobo</td>
                            <td class="py-3 font-mono font-bold cinzel text-base text-neutral-900">07.00 <span class="text-xs font-normal text-neutral-500 font-sans">WIB</span></td>
                            <td class="py-3">
                                <span class="inline-block text-xs font-medium px-2 py-0.5 rounded bg-neutral-100 text-neutral-800 border border-neutral-200">
                                    Bahasa Indonesia
                                </span>
                            </td>
                            <td class="py-3 text-xs text-neutral-500 text-right">Ibadah setiap Minggu Terakhir</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer Notice & Links -->
        <div class="px-6 py-3.5 bg-neutral-50 border-t border-neutral-200 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-neutral-500">
            <div>Apabila terdapat penyesuaian waktu & tempat ibadah, akan dicantumkan dalam warta jemaat.</div>
            <div class="flex items-center gap-3 self-end sm:self-auto shrink-0">
                <a href="{{ url('galeri-foto/104/jadwal-ibadah') }}" wire:navigate class="hover:text-neutral-900 underline underline-offset-2">
                    Poster Warta
                </a>
                <span>&bull;</span>
                <a href="https://maps.google.com/?q=GKJ+Wonogiri" target="_blank" rel="noopener noreferrer" class="hover:text-neutral-900 inline-flex items-center gap-1">
                    <span>Google Maps</span>
                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                </a>
            </div>
        </div>

    </div>
</section>
