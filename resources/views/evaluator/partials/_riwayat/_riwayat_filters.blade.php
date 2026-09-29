<!-- FILTER & PENCARIAN RIWAYAT -->
<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-4 sm:p-5 flex flex-col sm:flex-row items-center justify-between gap-4">
    
    <!-- Search Input -->
    <div class="w-full sm:w-80 relative">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <input 
            type="text" 
            x-model="search"
            placeholder="Cari inovasi, dinas/OPD, atau nomor BA..."
            class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-xs sm:text-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all placeholder:text-gray-400"
        >
    </div>

    <!-- Filter Predikat Status Kelulusan -->
    <div class="flex items-center gap-1.5 p-1 rounded-xl bg-gray-100 text-xs font-semibold text-gray-600 w-full sm:w-auto overflow-x-auto">
        <button 
            @click="filterStatus = 'all'" 
            :class="filterStatus === 'all' ? 'bg-white text-gray-900 shadow-sm' : 'hover:text-gray-900'"
            class="px-3 py-1.5 rounded-lg transition-all whitespace-nowrap"
        >
            Semua Hasil
        </button>
        <button 
            @click="filterStatus = 'Sangat Inovatif'" 
            :class="filterStatus === 'Sangat Inovatif' ? 'bg-white text-emerald-700 shadow-sm font-bold' : 'hover:text-gray-900'"
            class="px-3 py-1.5 rounded-lg transition-all whitespace-nowrap"
        >
            Sangat Inovatif
        </button>
        <button 
            @click="filterStatus = 'Inovatif'" 
            :class="filterStatus === 'Inovatif' ? 'bg-white text-blue-700 shadow-sm font-bold' : 'hover:text-gray-900'"
            class="px-3 py-1.5 rounded-lg transition-all whitespace-nowrap"
        >
            Inovatif
        </button>
        <button 
            @click="filterStatus = 'Memerlukan Perbaikan'" 
            :class="filterStatus === 'Memerlukan Perbaikan' ? 'bg-white text-amber-700 shadow-sm font-bold' : 'hover:text-gray-900'"
            class="px-3 py-1.5 rounded-lg transition-all whitespace-nowrap"
        >
            Perlu Perbaikan
        </button>
    </div>

</div>
