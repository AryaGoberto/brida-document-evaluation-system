<!-- 1. PANEL HEADER (ATAS) - INFORMASI ADMINISTRATIF READ-ONLY -->
<header class="bg-white border-b border-gray-200 px-4 sm:px-6 py-3 flex-shrink-0 z-30 shadow-xs">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">
        
        <!-- Info Kiri: Tombol Back & Metadata Dokumen -->
        <div class="flex items-center gap-3 min-w-0">
            <a 
                href="{{ route('evaluator.antrean') }}" 
                class="p-2 rounded-xl text-gray-500 hover:text-gray-800 hover:bg-gray-100 transition-colors flex-shrink-0 border border-gray-200"
                title="Kembali ke Antrean"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>

            <div class="min-w-0">
                <div class="flex items-center gap-2">
                    <span class="text-[11px] font-mono font-bold px-2 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-200 flex-shrink-0">
                        {{ $inovasi['kode'] }}
                    </span>
                    <span class="text-xs text-gray-400">•</span>
                    <span class="text-xs font-semibold text-gray-600 truncate">
                        {{ $inovasi['opd'] }}
                    </span>
                </div>
                <h1 class="text-base sm:text-lg font-black text-gray-900 truncate tracking-tight mt-0.5" title="{{ $inovasi['judul'] }}">
                    {{ $inovasi['judul'] }}
                </h1>
            </div>
        </div>

        <!-- Info Kanan: Skor Perbandingan & Progress Telaah -->
        <div class="flex items-center gap-3 sm:gap-4 flex-shrink-0">
            
            <!-- Skor Prediksi AI -->
            <div class="px-3 py-1.5 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center gap-2.5">
                <div class="w-7 h-7 rounded-lg bg-indigo-600 text-white flex items-center justify-center font-bold text-xs">
                    AI
                </div>
                <div class="text-left">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-700 block">Kalkulasi AI</span>
                    <span class="text-sm font-black text-indigo-900 leading-tight">
                        {{ $persentaseAi }} <span class="text-[10px] text-indigo-400 font-normal">/ 100</span>
                    </span>
                </div>
            </div>

            <!-- Live Skor Verifikator -->
            <div class="px-3.5 py-1.5 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center gap-2.5 shadow-xs">
                <div class="w-7 h-7 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-bold text-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="text-left">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-800 block">Skor Verifikator</span>
                    <span class="text-sm font-black text-emerald-900 leading-tight">
                        <span x-text="getPersentaseVerifikasi()"></span>
                        <span class="text-[10px] text-emerald-600 font-normal">/ 100</span>
                    </span>
                </div>
            </div>

            <!-- Progress Indikator -->
            <div class="hidden md:flex flex-col text-right">
                <span class="text-[10px] text-gray-500 font-medium uppercase tracking-wider">Status Telaah</span>
                <span class="text-xs font-bold text-gray-800 mt-0.5">
                    <span class="text-blue-600" x-text="getJumlahDitelaah()"></span> / 21 Indikator
                </span>
            </div>

            <!-- Tombol Selesaikan Verifikasi -->
            <form method="POST" action="{{ route('evaluator.verifikasi.simpan', $inovasi['id']) }}" class="inline-block">
                @csrf
                <button 
                    type="submit" 
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold shadow-md shadow-blue-600/20 transition-all duration-150 transform hover:-translate-y-0.5 active:translate-y-0"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Simpan Hasil Sidang</span>
                </button>
            </form>

        </div>

    </div>
</header>
