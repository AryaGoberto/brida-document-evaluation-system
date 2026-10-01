<!-- 4 KARTU STATISTIK KELULUSAN FINAL -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    
    <!-- 1. Total Selesai Sidang -->
    <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-sm">
        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block">Total Inovasi Selesai Sidang</span>
        <div class="flex items-baseline gap-2 mt-2">
            <span class="text-3xl font-black text-gray-900">{{ $summary['total_selesai'] }}</span>
            <span class="text-xs text-gray-400">Dokumen</span>
        </div>
        <span class="text-[11px] text-gray-500 mt-2 block">Seluruh 19 indikator terkunci sah</span>
    </div>

    <!-- 2. Sangat Inovatif (Lolos IGA) -->
    <div class="bg-white rounded-2xl p-5 border border-emerald-200 shadow-sm relative overflow-hidden">
        <div class="flex items-start justify-between">
            <div>
                <span class="text-xs font-bold text-emerald-800 uppercase tracking-wider block">Sangat Inovatif (Lolos IGA)</span>
                <div class="text-3xl font-black text-emerald-700 mt-2">{{ $summary['sangat_inovatif'] }}</div>
            </div>
            <span class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200">
                Skor &gt; 88 / 106
            </span>
        </div>
        <span class="text-[11px] text-emerald-600 mt-2 block font-medium">Rekomendasi Utama Kemendagri</span>
    </div>

    <!-- 3. Inovatif (Pembinaan Kota) -->
    <div class="bg-white rounded-2xl p-5 border border-blue-200 shadow-sm">
        <div class="flex items-start justify-between">
            <div>
                <span class="text-xs font-bold text-blue-800 uppercase tracking-wider block">Inovatif (Pembinaan BRIDA)</span>
                <div class="text-3xl font-black text-blue-700 mt-2">{{ $summary['inovatif'] }}</div>
            </div>
            <span class="px-2 py-1 rounded-lg bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">
                Skor 67 - 88
            </span>
        </div>
        <span class="text-[11px] text-blue-600 mt-2 block font-medium">Tingkat Kematangan Baik</span>
    </div>

    <!-- 4. Memerlukan Perbaikan -->
    <div class="bg-white rounded-2xl p-5 border border-amber-200 shadow-sm">
        <div class="flex items-start justify-between">
            <div>
                <span class="text-xs font-bold text-amber-800 uppercase tracking-wider block">Memerlukan Perbaikan</span>
                <div class="text-3xl font-black text-amber-700 mt-2">{{ $summary['perlu_perbaikan'] }}</div>
            </div>
            <span class="px-2 py-1 rounded-lg bg-amber-50 text-amber-700 text-xs font-bold border border-amber-200">
                Skor &lt; 67
            </span>
        </div>
        <span class="text-[11px] text-amber-600 mt-2 block font-medium">Bimtek Lanjutan Dibutuhkan</span>
    </div>

</div>
