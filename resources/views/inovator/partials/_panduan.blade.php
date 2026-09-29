<div id="wizard-pengajuan" class="bg-white rounded-2xl border border-gray-100 p-6 sm:p-8 shadow-sm">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-6 border-b border-gray-100">
        <div>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200 mb-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Panduan Wizard 5 Tahap
            </div>
            <h3 class="text-xl font-bold text-gray-900">Alur Pengajuan & Evaluasi Inovasi Baru</h3>
            <p class="text-sm text-gray-500 mt-1 max-w-2xl">
                Ikuti 5 langkah terstruktur berikut saat mengajukan proposal inovasi agar memenuhi standar penilaian Indeks Inovasi Daerah (IID) Kemendagri & BRIDA.
            </p>
        </div>
        <a href="{{ route('inovator.pengajuan.tahap1') }}" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl font-semibold text-sm text-white bg-blue-700 hover:bg-blue-800 transition-colors shadow-sm self-start md:self-auto">
            Mulai Tahap 1: Profil Inovasi
            <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 pt-6">
        <div class="p-4 rounded-xl bg-blue-50/50 border border-blue-100">
            <span class="w-7 h-7 rounded-lg bg-blue-600 text-white font-bold text-xs flex items-center justify-center mb-2">01</span>
            <h4 class="font-bold text-sm text-gray-900">Profil Inovasi</h4>
            <p class="text-xs text-gray-500 mt-1">Nama inovasi, jenis, urusan pemerintahan, dan inisiator pelaksana.</p>
        </div>
        
        <div class="p-4 rounded-xl bg-blue-50/50 border border-blue-100">
            <span class="w-7 h-7 rounded-lg bg-blue-600 text-white font-bold text-xs flex items-center justify-center mb-2">02</span>
            <h4 class="font-bold text-sm text-gray-900">Latar Belakang</h4>
            <p class="text-xs text-gray-500 mt-1">Dasar hukum, permasalahan spesifik, dan ide kebaruan inovasi.</p>
        </div>
        
        <div class="p-4 rounded-xl bg-indigo-50/50 border border-indigo-100">
            <span class="w-7 h-7 rounded-lg bg-indigo-600 text-white font-bold text-xs flex items-center justify-center mb-2">03</span>
            <h4 class="font-bold text-sm text-indigo-950">Analisis AI</h4>
            <p class="text-xs text-indigo-900/70 mt-1">Pengecekan orisinalitas otomatis & prediksi skor kematangan.</p>
        </div>
        
        <div class="p-4 rounded-xl bg-indigo-50/50 border border-indigo-100">
            <span class="w-7 h-7 rounded-lg bg-indigo-600 text-white font-bold text-xs flex items-center justify-center mb-2">04</span>
            <h4 class="font-bold text-sm text-indigo-950">Bukti Dukung</h4>
            <p class="text-xs text-indigo-900/70 mt-1">Unggah regulasi, video demo, foto penerapan, dan kemanfaatan.</p>
        </div>
        
        <div class="p-4 rounded-xl bg-emerald-50/50 border border-emerald-100">
            <span class="w-7 h-7 rounded-lg bg-emerald-600 text-white font-bold text-xs flex items-center justify-center mb-2">05</span>
            <h4 class="font-bold text-sm text-emerald-950">Finalisasi & Kirim</h4>
            <p class="text-xs text-emerald-900/70 mt-1">Review rangkuman final, pernyataan komitmen, dan kirim ke BRIDA.</p>
        </div>
    </div>
</div>