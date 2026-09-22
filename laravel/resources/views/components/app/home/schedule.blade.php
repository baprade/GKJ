<div id="schedule" class="grid gap-6 px-6 py-6 mx-auto bg-neutral-50 lg:py-8 lg:px-8 max-w-7xl rounded-2xl border border-neutral-200">
    <div class="text-center">
        <div class="text-xs font-semibold tracking-wider text-amber-800 uppercase">Pelayanan & Persekutuan</div>
        <h2 class="text-xl font-bold text-black uppercase cinzel lg:text-2xl mt-1">Jadwal Ibadah Rutin</h2>
        <p class="text-sm text-neutral-600 mt-1 max-w-xl mx-auto">Mari bertumbuh bersama dalam iman, persekutuan, dan firman Tuhan di GKJ Wonogiri.</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-3">
        <!-- Ibadah Pagi -->
        <div class="flex flex-col justify-between p-5 bg-white border border-neutral-200 rounded-xl shadow-sm hover:border-neutral-300 transition">
            <div>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-medium px-2.5 py-1 bg-amber-50 text-amber-800 border border-amber-200 rounded-md">Bhs. Jawa</span>
                    <i class="fa-solid fa-church text-neutral-400 text-sm"></i>
                </div>
                <div class="mt-3 text-base font-bold text-neutral-900">Ibadah Pagi</div>
                <div class="text-2xl font-extrabold text-neutral-800 cinzel mt-1">06.00 <span class="text-xs font-normal text-neutral-500">WIB</span></div>
                <div class="text-xs text-neutral-500 mt-2">Gedung Gereja Induk GKJ Wonogiri</div>
            </div>
        </div>

        <!-- Ibadah Umum -->
        <div class="flex flex-col justify-between p-5 bg-white border-2 border-neutral-800 rounded-xl shadow-md relative overflow-hidden">
            <div class="absolute top-0 right-0 bg-neutral-800 text-white text-[10px] font-semibold px-2 py-0.5 rounded-bl">UTAMA</div>
            <div>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-medium px-2.5 py-1 bg-sky-50 text-sky-800 border border-sky-200 rounded-md">Bhs. Indonesia</span>
                    <i class="fa-solid fa-bible text-neutral-700 text-sm"></i>
                </div>
                <div class="mt-3 text-base font-bold text-neutral-900">Ibadah Umum</div>
                <div class="text-2xl font-extrabold text-neutral-900 cinzel mt-1">08.00 <span class="text-xs font-normal text-neutral-500">WIB</span></div>
                <div class="text-xs text-neutral-600 mt-2">Gedung Gereja Induk & Disiarkan Warta</div>
            </div>
        </div>

        <!-- Sekolah Minggu & Remaja -->
        <div class="flex flex-col justify-between p-5 bg-white border border-neutral-200 rounded-xl shadow-sm hover:border-neutral-300 transition">
            <div>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-medium px-2.5 py-1 bg-emerald-50 text-emerald-800 border border-emerald-200 rounded-md">Anak & Remaja</span>
                    <i class="fa-solid fa-children text-neutral-400 text-sm"></i>
                </div>
                <div class="mt-3 text-base font-bold text-neutral-900">Sekolah Minggu</div>
                <div class="text-2xl font-extrabold text-neutral-800 cinzel mt-1">08.00 <span class="text-xs font-normal text-neutral-500">WIB</span></div>
                <div class="text-xs text-neutral-500 mt-2">Ruang Pembinaan Jemaat GKJ Wonogiri</div>
            </div>
        </div>
    </div>

    <!-- Tombol Navigasi Cepat -->
    <div class="flex flex-wrap items-center justify-center gap-3 pt-2">
        <a href="{{ url('galeri-foto/104/jadwal-ibadah') }}" wire:navigate class="inline-flex items-center gap-2 px-4 py-2 text-xs sm:text-sm font-semibold text-white bg-neutral-900 hover:bg-neutral-800 rounded-lg shadow transition">
            <i class="fa-regular fa-image"></i>
            <span>Lihat Poster & Rincian Jadwal Lengkap</span>
        </a>
        <a href="https://maps.google.com/?q=GKJ+Wonogiri" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 text-xs sm:text-sm font-semibold text-neutral-700 bg-white border border-neutral-300 hover:bg-neutral-50 rounded-lg shadow-sm transition">
            <i class="fa-solid fa-location-dot text-rose-600"></i>
            <span>Petunjuk Arah Google Maps</span>
        </a>
    </div>
</div>
