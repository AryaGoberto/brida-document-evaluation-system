<!-- HEADER UTAMA & TOMBOL EKSPOR -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center gap-2 text-xs text-gray-500 font-medium mb-1">
            <a href="{{ route('evaluator.dashboard') }}" class="hover:text-blue-600 transition-colors">Dasbor Evaluator</a>
            <span>/</span>
            <span class="text-gray-900 font-semibold">Riwayat & Perekapan</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight flex items-center gap-3">
            Riwayat & Perekapan Final Inovasi
            <span class="text-xs font-bold px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">
                {{ $summary['total_selesai'] }} Inovasi Terkunci
            </span>
        </h1>
        <p class="text-sm text-gray-500 mt-1 max-w-3xl">
            Daftar seluruh dokumen inovasi yang telah selesai diverifikasi dan dikunci oleh tim evaluator. Skor dinilai dari 19 indikator dengan skala <strong>skor maksimal 106</strong>.
        </p>
    </div>

    <!-- Tombol Ekspor Rekap Dokumen -->
    <div class="flex items-center gap-2.5 flex-shrink-0">
        <a 
            href="{{ route('evaluator.riwayat.ekspor') }}" 
            target="_blank"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold shadow-md transition-all duration-150 transform hover:-translate-y-0.5 active:translate-y-0"
        >
            <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
            </svg>
            <span>Cetak Rekap Laporan Pimpinan (PDF)</span>
        </a>
    </div>
</div>
