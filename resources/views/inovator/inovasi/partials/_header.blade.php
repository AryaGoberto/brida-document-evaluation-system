<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center space-x-2 text-xs font-semibold text-blue-700 uppercase tracking-wider mb-1">
            <a href="{{ route('inovator.dashboard') }}" class="hover:underline flex items-center gap-1 text-gray-500 hover:text-blue-600">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Dasbor
            </a>
            <span>/</span>
            <span>Detail & Evaluasi Inovasi</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
            {{ $inovasi['judul'] }}
        </h1>
        <div class="flex flex-wrap items-center gap-2 mt-2 text-xs sm:text-sm text-gray-500">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-medium bg-blue-100 text-blue-800">
                {{ $inovasi['kategori'] }}
            </span>
            <span>•</span>
            <span class="font-medium text-gray-700">{{ $inovasi['opd'] }}</span>
            <span>•</span>
            <span>Diajukan: {{ $inovasi['tanggal_pengajuan'] }}</span>
        </div>
    </div>

    <!-- Header Action / Status Badge -->
    <div class="flex items-center gap-3 flex-shrink-0">
        @if ($inovasi['status_type'] === 'revisi')
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs sm:text-sm font-bold bg-rose-50 text-rose-700 border border-rose-200 shadow-xs animate-pulse">
                <svg class="w-4 h-4 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                Status: Revisi Diperlukan
            </span>
        @elseif ($inovasi['status_type'] === 'selesai')
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs sm:text-sm font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shadow-xs">
                <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                Status: Evaluasi Selesai
            </span>
        @else
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs sm:text-sm font-bold bg-blue-50 text-blue-700 border border-blue-200 shadow-xs">
                <span class="w-2 h-2 rounded-full bg-blue-600 animate-ping"></span>
                Status: {{ $inovasi['status'] }}
            </span>
        @endif
    </div>
</div>
