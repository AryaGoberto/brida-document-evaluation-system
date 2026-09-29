<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
    <!-- 1. Menunggu Verifikasi -->
    <div class="bg-white rounded-2xl p-5 border border-amber-200/80 shadow-sm hover:shadow-md transition-all duration-200 relative overflow-hidden group">
        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-110 transition-transform duration-300 pointer-events-none"></div>
        <div class="flex items-start justify-between relative z-10">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-amber-700 block">Menunggu Verifikasi</span>
                <div class="text-3xl sm:text-4xl font-black text-gray-900 mt-2">
                    {{ $metrics['menunggu_verifikasi']['count'] }}
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500 relative z-10">
            <span class="inline-flex items-center gap-1 font-semibold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-md">
                {{ $metrics['menunggu_verifikasi']['badge'] }}
            </span>
            <span class="text-gray-400">{{ $metrics['menunggu_verifikasi']['subtext'] }}</span>
        </div>
    </div>

    <!-- 2. Sedang Diproses AI -->
    <div class="bg-white rounded-2xl p-5 border border-indigo-200/80 shadow-sm hover:shadow-md transition-all duration-200 relative overflow-hidden group">
        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-indigo-50 rounded-full group-hover:scale-110 transition-transform duration-300 pointer-events-none"></div>
        <div class="flex items-start justify-between relative z-10">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-700 block">Sedang Diproses AI</span>
                <div class="text-3xl sm:text-4xl font-black text-gray-900 mt-2 flex items-center gap-2">
                    {{ $metrics['sedang_proses_ai']['count'] }}
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
                    </span>
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500 relative z-10">
            <span class="inline-flex items-center gap-1 font-semibold text-indigo-700 bg-indigo-50 px-2 py-0.5 rounded-md">
                {{ $metrics['sedang_proses_ai']['badge'] }}
            </span>
            <span class="text-gray-400">{{ $metrics['sedang_proses_ai']['subtext'] }}</span>
        </div>
    </div>

    <!-- 3. Verifikasi Selesai -->
    <div class="bg-white rounded-2xl p-5 border border-emerald-200/80 shadow-sm hover:shadow-md transition-all duration-200 relative overflow-hidden group">
        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-110 transition-transform duration-300 pointer-events-none"></div>
        <div class="flex items-start justify-between relative z-10">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700 block">Verifikasi Selesai</span>
                <div class="text-3xl sm:text-4xl font-black text-gray-900 mt-2">
                    {{ $metrics['verifikasi_selesai']['count'] }}
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500 relative z-10">
            <span class="inline-flex items-center gap-1 font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md">
                {{ $metrics['verifikasi_selesai']['badge'] }}
            </span>
            <span class="text-gray-400">{{ $metrics['verifikasi_selesai']['subtext'] }}</span>
        </div>
    </div>

    <!-- 4. Dokumen Dikembalikan -->
    <div class="bg-white rounded-2xl p-5 border border-rose-200/80 shadow-sm hover:shadow-md transition-all duration-200 relative overflow-hidden group">
        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-rose-50 rounded-full group-hover:scale-110 transition-transform duration-300 pointer-events-none"></div>
        <div class="flex items-start justify-between relative z-10">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-rose-700 block">Dokumen Dikembalikan</span>
                <div class="text-3xl sm:text-4xl font-black text-gray-900 mt-2">
                    {{ $metrics['dokumen_revisi']['count'] }}
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-rose-500/10 text-rose-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
            </div>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500 relative z-10">
            <span class="inline-flex items-center gap-1 font-semibold text-rose-700 bg-rose-50 px-2 py-0.5 rounded-md">
                {{ $metrics['dokumen_revisi']['badge'] }}
            </span>
            <span class="text-gray-400">{{ $metrics['dokumen_revisi']['subtext'] }}</span>
        </div>
    </div>
</div>