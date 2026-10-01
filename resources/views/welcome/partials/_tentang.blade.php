<!-- SECTION: TENTANG PROJEK & LATAR BELAKANG -->
<section id="tentang" class="py-20 lg:py-28 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            
            <!-- Sisi Kiri: Narasi Problem & Transformasi -->
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-xs font-bold uppercase tracking-wider">
                    Tentang Projek
                </div>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight leading-tight">
                    Mengapa Sistem Ini Diciptakan untuk Kota Makassar?
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    Setiap tahun, ratusan inovasi diciptakan oleh Dinas, Rumah Sakit Daerah, Puskesmas, dan Kelurahan di Kota Makassar. Namun, proses evaluasi manual sering mengalami kendala:
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200/80">
                        <div class="w-9 h-9 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center font-bold flex-shrink-0">✕</div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Beban Berkas Fisik &amp; Dokumen Tercecer</h4>
                            <p class="text-xs text-slate-500 mt-0.5">Pengumpulan manual 19 dokumen SK, Perda, SOP, dan foto menyebabkan tim penilai kewalahan dan arsip sulit dilacak.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200/80">
                        <div class="w-9 h-9 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center font-bold flex-shrink-0">✕</div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Waktu Penilaian Sangat Panjang</h4>
                            <p class="text-xs text-slate-500 mt-0.5">Memeriksa keaslian tanda tangan basah dan kesesuaian klausul hukum satu per satu membutuhkan waktu berminggu-minggu.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-blue-50/80 border border-blue-200">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold flex-shrink-0">✓</div>
                        <div>
                            <h4 class="font-bold text-blue-950 text-sm">Solusi SID-BRIDA Berbasis AI</h4>
                            <p class="text-xs text-blue-800/80 mt-0.5">Digitalisasi penuh: Inovator submit via Wizard 5 Tahap, model AI mengekstrak dan merekomendasikan skor bintang 1–3, lalu verifikator BRIDA memvalidasi lewat antarmuka layar terbelah.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan: Visual Card Showcase Ruang Kerja Split-Screen -->
            <div class="relative">
                <div class="absolute -inset-4 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl opacity-10 blur-xl"></div>
                <div class="relative rounded-2xl bg-slate-900 text-white p-6 sm:p-8 shadow-2xl border border-slate-800 space-y-6">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-rose-500"></span>
                            <span class="w-3 h-3 rounded-full bg-amber-500"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                            <span class="text-xs font-mono text-slate-400 ml-2">split_screen_workspace.blade.php</span>
                        </div>
                        <span class="text-xs font-bold text-indigo-400 bg-indigo-500/10 px-2.5 py-1 rounded-full border border-indigo-500/20">Live Workspace</span>
                    </div>

                    <!-- Mini Mockup Interface -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="p-4 rounded-xl bg-slate-800/90 border border-slate-700/80 space-y-3">
                            <div class="flex items-center justify-between text-[11px] text-slate-400">
                                <span class="font-semibold text-white">📄 PDF Viewer (Kiri)</span>
                                <span class="bg-blue-900/60 text-blue-300 px-1.5 py-0.5 rounded text-[10px]">No Download</span>
                            </div>
                            <div class="bg-slate-950 p-3 rounded-lg border border-slate-800 font-mono text-[10px] text-slate-400 space-y-1">
                                <p class="text-blue-400 font-bold">PERATURAN WALIKOTA MAKASSAR</p>
                                <p>Nomor 14 Tahun 2025...</p>
                                <p class="text-emerald-400">✓ Barcode TTE BSrE Valid</p>
                            </div>
                            <p class="text-[11px] text-slate-400">Penampil dokumen interaktif dengan zoom, pencarian teks, dan lompat halaman.</p>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-800/90 border border-slate-700/80 space-y-3">
                            <div class="flex items-center justify-between text-[11px] text-slate-400">
                                <span class="font-semibold text-white">⚖️ 19 Indikator (Kanan)</span>
                                <span class="bg-emerald-900/60 text-emerald-300 px-1.5 py-0.5 rounded text-[10px]">AI Star Rating</span>
                            </div>
                            <div class="bg-slate-950 p-3 rounded-lg border border-slate-800 space-y-1.5">
                                <div class="flex justify-between items-center text-[10px]">
                                    <span class="font-bold text-white">1. Regulasi Daerah</span>
                                    <span class="text-amber-400 font-bold">★ ★ ★ (3.0)</span>
                                </div>
                                <p class="text-[10px] text-slate-400">AI: Teridentifikasi SK Walikota sah. Poin: 5.5 / 5.5</p>
                            </div>
                            <p class="text-[11px] text-slate-400">Evaluator manusia cukup mengonfirmasi skor AI atau melakukan penyesuaian.</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
                        <span>Keluaran: <strong>Berita Acara Resmi Sidang Pleno</strong></span>
                        <span class="text-emerald-400 font-bold">Skor Final: 105 / 106</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
