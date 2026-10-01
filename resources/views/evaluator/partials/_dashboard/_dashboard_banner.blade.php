<div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-indigo-950 to-blue-900 rounded-3xl p-6 sm:p-8 text-white shadow-xl shadow-slate-900/10">
    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/3 -mb-10 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs font-semibold text-blue-200">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                Panel Verifikator & Evaluator BRIDA Kota Makassar
            </div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black tracking-tight text-white">
                Dasbor Evaluasi Inovasi
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-2xl leading-relaxed">
                Pantau antrean pengajuan inovasi OPD, telaah analisis rekomendasi AI, dan lakukan verifikasi penilaian 19 indikator secara objektif.
            </p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl px-4 py-3 text-left">
                <span class="text-[11px] uppercase tracking-wider text-slate-300 block font-semibold">Beban Kerja Hari Ini</span>
                <div class="flex items-baseline gap-2 mt-0.5">
                    <span class="text-2xl font-black text-white">{{ $metrics['menunggu_verifikasi']['count'] ?? 14 }}</span>
                    <span class="text-xs text-amber-300 font-medium">Berkas Siap Dinilai</span>
                </div>
            </div>
            <a href="#daftar-tugas" class="inline-flex items-center gap-2 px-5 py-3.5 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold text-sm shadow-lg shadow-blue-500/30 transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                Mulai Verifikasi
            </a>
        </div>
    </div>
</div>