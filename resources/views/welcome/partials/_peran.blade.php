<!-- SECTION: AKSES BERDASARKAN PERAN (INNOVATOR VS EVALUATOR) -->
<section id="peran" class="py-20 lg:py-28 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider bg-blue-50 px-3 py-1 rounded-full border border-blue-200">Akses Pengguna</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3 tracking-tight">
                Dua Peran Utama dalam Ekosistem BRIDA
            </h2>
            <p class="text-slate-600 text-sm sm:text-base mt-3">
                Sistem memisahkan ruang kerja secara otomatis berdasarkan hak akses pengguna saat login.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">

            <!-- Role Card 1: Inovator -->
            <div class="p-8 rounded-3xl bg-gradient-to-b from-blue-50/60 to-white border-2 border-blue-200 shadow-lg relative overflow-hidden flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-bold uppercase tracking-wider">Role: Inovator OPD</span>
                        <span class="text-2xl">🏢</span>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-2">Inovator Perangkat Daerah</h3>
                    <p class="text-slate-600 text-sm mb-6 leading-relaxed">
                        Diperuntukkan bagi perwakilan Dinas, Bagian Setda, Kecamatan, Kelurahan, dan Puskesmas yang ingin mengajukan proposal inovasi baru atau memperbaiki berkas revisi.
                    </p>
                    <ul class="space-y-3 text-xs text-slate-700 mb-8">
                        <li class="flex items-center gap-2"><span class="text-blue-600 font-bold">✓</span><span>Akses Dasbor Pemantauan Progres Status Inovasi</span></li>
                        <li class="flex items-center gap-2"><span class="text-blue-600 font-bold">✓</span><span>Formulir Wizard 5 Tahap Terpadu &amp; Rich Text Editor</span></li>
                        <li class="flex items-center gap-2"><span class="text-blue-600 font-bold">✓</span><span>Mode Perbaikan Berkas Dokumen Sanggah / Revisi</span></li>
                    </ul>
                </div>
                <a href="{{ route('login') }}" class="w-full text-center py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md transition-all">
                    Masuk sebagai Inovator &rarr;
                </a>
            </div>

            <!-- Role Card 2: Evaluator BRIDA -->
            <div class="p-8 rounded-3xl bg-gradient-to-b from-slate-900 to-indigo-950 text-white border-2 border-indigo-700 shadow-xl relative overflow-hidden flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 rounded-full bg-indigo-500/20 text-indigo-300 border border-indigo-500/40 text-xs font-bold uppercase tracking-wider">Role: Evaluator BRIDA</span>
                        <span class="text-2xl">⚖️</span>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-2">Tim Penilai &amp; Verifikator</h3>
                    <p class="text-slate-300 text-sm mb-6 leading-relaxed">
                        Diperuntukkan bagi verifikator ahli BRIDA Kota Makassar untuk menelaah dokumen fisik, memvalidasi klaim AI, menyidangkan nilai, dan menerbitkan Berita Acara.
                    </p>
                    <ul class="space-y-3 text-xs text-slate-300 mb-8">
                        <li class="flex items-center gap-2"><span class="text-indigo-400 font-bold">✓</span><span>Task Inbox Prioritas &amp; Antrean Lengkap 143 Dinas</span></li>
                        <li class="flex items-center gap-2"><span class="text-indigo-400 font-bold">✓</span><span>Ruang Kerja Validasi Layar Terbelah (Split-Screen Workspace)</span></li>
                        <li class="flex items-center gap-2"><span class="text-indigo-400 font-bold">✓</span><span>Penerbitan Berita Acara &amp; Ekspor Laporan Rekapitulasi PDF</span></li>
                    </ul>
                </div>
                <a href="{{ route('login') }}" class="w-full text-center py-3.5 rounded-xl bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-white font-bold text-sm shadow-md transition-all">
                    Masuk sebagai Evaluator &rarr;
                </a>
            </div>

        </div>
    </div>
</section>
