<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center space-x-2 text-xs font-semibold text-blue-700 uppercase tracking-wider mb-1">
            <span class="inline-block w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
            <span>Portal Inovator BRIDA Kota Makassar</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
            Dasbor Utama Inovator
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Kelola dan pantau progres proposal inovasi daerah Anda melalui 5 tahap evaluasi terpadu.
        </p>
    </div>
    
    <!-- Tombol Utama (Call to Action) -->
    <div class="flex-shrink-0">
        <a href="{{ route('inovator.pengajuan.tahap1') }}" class="inline-flex items-center justify-center px-5 py-3 rounded-xl font-bold text-white bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 hover:from-blue-700 hover:to-indigo-800 shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 group text-sm sm:text-base border border-blue-500/30">
            <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-white/20 text-white mr-2.5 group-hover:rotate-90 transition-transform duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
            </span>
            <span>+ Buat Pengajuan Inovasi Baru</span>
            <span class="ml-2 hidden lg:inline-block px-2 py-0.5 text-xs font-medium bg-blue-500/40 rounded-full border border-blue-300/30">
                Wizard 5 Tahap
            </span>
        </a>
    </div>
</div>