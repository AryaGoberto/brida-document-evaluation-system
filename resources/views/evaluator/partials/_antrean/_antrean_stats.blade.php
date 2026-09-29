<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3.5">
    <button @click="filterStatus = (filterStatus === 'butuh_validasi' ? 'all' : 'butuh_validasi')" :class="filterStatus === 'butuh_validasi' ? 'ring-2 ring-blue-500 border-blue-500 bg-blue-50/50' : 'bg-white hover:border-gray-300'" class="p-4 rounded-2xl border border-gray-200 text-left transition-all duration-150 group shadow-sm">
        <div class="flex items-center justify-between text-xs text-gray-500 font-semibold mb-1">
            <span class="flex items-center gap-1.5 text-blue-700">
                <span class="w-2 h-2 rounded-full bg-blue-600"></span> Butuh Validasi
            </span>
            <span class="text-[10px] font-bold text-blue-600 bg-blue-100 px-1.5 py-0.5 rounded">Prioritas</span>
        </div>
        <div class="text-2xl font-black text-gray-900">{{ $summary['butuh_validasi'] }}</div>
        <span class="text-[11px] text-gray-400 mt-0.5 block">Siap telaah verifikator</span>
    </button>
    <button @click="filterStatus = (filterStatus === 'menunggu_ocr' ? 'all' : 'menunggu_ocr')" :class="filterStatus === 'menunggu_ocr' ? 'ring-2 ring-amber-500 border-amber-500 bg-amber-50/50' : 'bg-white hover:border-gray-300'" class="p-4 rounded-2xl border border-gray-200 text-left transition-all duration-150 group shadow-sm">
        <div class="flex items-center justify-between text-xs text-gray-500 font-semibold mb-1">
            <span class="flex items-center gap-1.5 text-amber-700">
                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span> Menunggu OCR
            </span>
        </div>
        <div class="text-2xl font-black text-gray-900">{{ $summary['menunggu_ocr'] }}</div>
        <span class="text-[11px] text-gray-400 mt-0.5 block">Pemindaian berkas PDF</span>
    </button>
    <button @click="filterStatus = (filterStatus === 'ai_selesai' ? 'all' : 'ai_selesai')" :class="filterStatus === 'ai_selesai' ? 'ring-2 ring-indigo-500 border-indigo-500 bg-indigo-50/50' : 'bg-white hover:border-gray-300'" class="p-4 rounded-2xl border border-gray-200 text-left transition-all duration-150 group shadow-sm">
        <div class="flex items-center justify-between text-xs text-gray-500 font-semibold mb-1">
            <span class="flex items-center gap-1.5 text-indigo-700">
                <span class="w-2 h-2 rounded-full bg-indigo-600"></span> AI Selesai
            </span>
        </div>
        <div class="text-2xl font-black text-gray-900">{{ $summary['ai_selesai'] }}</div>
        <span class="text-[11px] text-gray-400 mt-0.5 block">Skor prediksi terbit</span>
    </button>
    <button @click="filterStatus = (filterStatus === 'selesai' ? 'all' : 'selesai')" :class="filterStatus === 'selesai' ? 'ring-2 ring-emerald-500 border-emerald-500 bg-emerald-50/50' : 'bg-white hover:border-gray-300'" class="p-4 rounded-2xl border border-gray-200 text-left transition-all duration-150 group shadow-sm">
        <div class="flex items-center justify-between text-xs text-gray-500 font-semibold mb-1">
            <span class="flex items-center gap-1.5 text-emerald-700">
                <span class="w-2 h-2 rounded-full bg-emerald-600"></span> Selesai Validasi
            </span>
        </div>
        <div class="text-2xl font-black text-gray-900">{{ $summary['selesai_diverifikasi'] }}</div>
        <span class="text-[11px] text-gray-400 mt-0.5 block">SK & Berita Acara terbit</span>
    </button>
    <button @click="filterStatus = (filterStatus === 'perlu_revisi' ? 'all' : 'perlu_revisi')" :class="filterStatus === 'perlu_revisi' ? 'ring-2 ring-rose-500 border-rose-500 bg-rose-50/50' : 'bg-white hover:border-gray-300'" class="p-4 rounded-2xl border border-gray-200 text-left transition-all duration-150 group shadow-sm">
        <div class="flex items-center justify-between text-xs text-gray-500 font-semibold mb-1">
            <span class="flex items-center gap-1.5 text-rose-700">
                <span class="w-2 h-2 rounded-full bg-rose-600"></span> Perlu Revisi
            </span>
        </div>
        <div class="text-2xl font-black text-gray-900">{{ $summary['perlu_revisi'] }}</div>
        <span class="text-[11px] text-gray-400 mt-0.5 block">Dalam masa perbaikan</span>
    </button>
</div>