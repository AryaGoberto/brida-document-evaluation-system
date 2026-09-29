<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center gap-2 text-xs text-gray-500 font-medium mb-1">
            <a href="{{ route('evaluator.dashboard') }}" class="hover:text-blue-600 transition-colors">Dasbor Evaluator</a>
            <span>/</span>
            <span class="text-gray-900 font-semibold">Antrean Inovasi</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight flex items-center gap-3">
            Antrean Inovasi Daerah
            <span class="text-xs font-bold px-3 py-1 rounded-full bg-blue-100 text-blue-800 border border-blue-200">
                {{ $summary['total_dinas'] }} Dinas / OPD
            </span>
        </h1>
        <p class="text-sm text-gray-500 mt-1 max-w-3xl">
            Daftar lengkap pengajuan inovasi dari seluruh perangkat daerah se-Kota Makassar dengan status pemrosesan sistem OCR, analisis AI, dan antrean validasi verifikator.
        </p>
    </div>
    <div class="flex items-center gap-2.5">
        <button @click="resetFilters()" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 text-xs font-semibold shadow-sm transition-all duration-150">
            <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
            Reset Filter
        </button>
        <a href="{{ route('evaluator.dashboard') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold shadow-sm shadow-blue-600/20 transition-all duration-150">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Ke Dasbor
        </a>
    </div>
</div>