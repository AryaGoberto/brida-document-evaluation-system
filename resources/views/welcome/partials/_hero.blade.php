<!-- HERO SECTION -->
<section class="hero-pattern pt-32 pb-24 lg:pt-40 lg:pb-32 text-white relative overflow-hidden">
    <!-- Background Lighting Circles -->
    <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[900px] h-[500px] bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            
            <!-- Pill Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-800/80 border border-slate-700/80 text-blue-400 text-xs sm:text-sm font-semibold mb-8 shadow-sm">
                <span class="flex h-2 w-2 rounded-full bg-blue-400 animate-pulse"></span>
                <span>Transformasi Digital BRIDA Kota Makassar • Standar IGA Kemendagri</span>
            </div>

            <!-- Headline Utama -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight lg:leading-[1.15]">
                Sistem Evaluasi Otomatis Dokumen PDF Berdasarkan Parameter dan Indikator Standar pada BRIDA Kota Makassar
            </h1>

            <!-- Subtitle / Deskripsi Singkat Projek -->
            <p class="mt-6 text-base sm:text-lg lg:text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed font-normal">
                Platform cerdas untuk pendataan, validasi berkas fisik berbantuan model AI, dan penetapan skor 19 indikator kematangan inovasi dari seluruh <strong>143 SKPD, Puskesmas, dan Kecamatan</strong> di Pemerintah Kota Makassar.
            </p>

            <!-- Tombol CTA Masuk Sesuai Role -->
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-7 py-4 rounded-2xl bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-base shadow-xl shadow-blue-600/35 hover:shadow-blue-600/50 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                    <span>Mulai Pengajuan (Inovator OPD)</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>

                <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-4 rounded-2xl bg-slate-800/90 hover:bg-slate-800 text-slate-200 hover:text-white font-bold text-base border border-slate-700 hover:border-slate-600 shadow-md transition-all duration-200 hover:-translate-y-0.5">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span>Ruang Kerja Evaluator BRIDA</span>
                </a>
            </div>

            <!-- 4 Statistik Capaian / Cakupan Sistem -->
            <div class="mt-16 grid grid-cols-2 lg:grid-cols-4 gap-4 text-left">
                <div class="p-5 rounded-2xl bg-slate-800/50 backdrop-blur border border-slate-800">
                    <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">143</div>
                    <div class="text-xs uppercase font-bold tracking-wider text-slate-400 mt-1">Perangkat Daerah &amp; Unit</div>
                    <p class="text-[11px] text-slate-500 mt-0.5">Dinas, Puskesmas, Kecamatan se-Makassar</p>
                </div>
                <div class="p-5 rounded-2xl bg-slate-800/50 backdrop-blur border border-slate-800">
                    <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-300">19</div>
                    <div class="text-xs uppercase font-bold tracking-wider text-slate-400 mt-1">Indikator Kematangan</div>
                    <p class="text-[11px] text-slate-500 mt-0.5">Bobot penilaian resmi regulasi Kemendagri</p>
                </div>
                <div class="p-5 rounded-2xl bg-slate-800/50 backdrop-blur border border-slate-800">
                    <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-300">AI OCR</div>
                    <div class="text-xs uppercase font-bold tracking-wider text-slate-400 mt-1">Analisis Berkas Cerdas</div>
                    <p class="text-[11px] text-slate-500 mt-0.5">Deteksi TTE, SK, dan validasi dokumen fisik</p>
                </div>
                <div class="p-5 rounded-2xl bg-slate-800/50 backdrop-blur border border-slate-800">
                    <div class="text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-300">106</div>
                    <div class="text-xs uppercase font-bold tracking-wider text-slate-400 mt-1">Skor Maksimal Sidang</div>
                    <p class="text-[11px] text-slate-500 mt-0.5">Predikat Sangat Inovatif &amp; Lolos IGA</p>
                </div>
            </div>

        </div>
    </div>
</section>
