    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <!-- Header Tabel & Filter Bar -->
        <div class="p-6 border-b border-gray-100 space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 tracking-tight flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        Tabel Riwayat Pengajuan Inovasi
                    </h3>
                    <p class="text-sm text-gray-500 mt-0.5">Daftar rekam jejak inovasi yang diajukan oleh dinas/instansi Anda.</p>
                </div>
                
                <!-- Search Input (Terhubung ke Alpine.js di file induk) -->
                <div class="relative w-full sm:w-72">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" x-model="searchQuery" placeholder="Cari nama inovasi / OPD..." class="w-full pl-9 pr-4 py-2 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                </div>
            </div>

            <!-- Filter Kategori Status -->
            <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-gray-100">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider mr-1">Filter Status:</span>
                <button @click="activeFilter = 'all'" :class="activeFilter === 'all' ? 'bg-blue-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150">
                    Semua (<span x-text="items.length"></span>)
                </button>
                <button @click="activeFilter = 'validasi'" :class="activeFilter === 'validasi' ? 'bg-blue-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-blue-500"></span> Validasi BRIDA
                </button>
                <button @click="activeFilter = 'ai'" :class="activeFilter === 'ai' ? 'bg-purple-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-purple-500"></span> Proses AI
                </button>
                <button @click="activeFilter = 'selesai'" :class="activeFilter === 'selesai' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Selesai
                </button>
                <button @click="activeFilter = 'revisi'" :class="activeFilter === 'revisi' ? 'bg-rose-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-rose-500"></span> Revisi Diperlukan
                </button>
                <button @click="activeFilter = 'draft'" :class="activeFilter === 'draft' ? 'bg-slate-700 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-slate-500"></span> Draft
                </button>
            </div>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-left">
                <thead class="bg-gray-50/80">
                    <tr>
                        <th scope="col" class="px-6 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Inovasi</th>
                        <th scope="col" class="px-6 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal Pengajuan</th>
                        <th scope="col" class="px-6 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Status Terkini</th>
                        <th scope="col" class="px-6 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Total Skor Sementara</th>
                        <th scope="col" class="px-6 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <template x-for="item in filteredItems" :key="item.id">
                        <tr class="hover:bg-blue-50/40 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-start gap-3">
                                    <div class="mt-1 flex-shrink-0 w-8 h-8 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-xs">
                                        <span x-text="item.id"></span>
                                    </div>
                                    <div>
                                        <a :href="'/inovator/inovasi/' + item.id" class="font-bold text-gray-900 text-sm hover:text-blue-600" x-text="item.nama"></a>
                                        <div class="flex flex-wrap items-center gap-2 mt-1">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-700 border border-gray-200" x-text="item.kategori"></span>
                                            <span class="text-xs text-gray-500" x-text="'• ' + item.dinas"></span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center text-sm text-gray-600 gap-1.5">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span class="font-medium" x-text="item.tanggal_pengajuan"></span>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <template x-if="item.status_type === 'ai'">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-50 text-purple-700 border border-purple-200 shadow-xs">
                                        <svg class="w-3 h-3 mr-1.5 text-purple-600 animate-spin" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Proses AI
                                    </span>
                                </template>
                                <template x-if="item.status_type === 'validasi'">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200 shadow-xs">
                                        <span class="w-2 h-2 mr-1.5 rounded-full bg-blue-600 animate-pulse"></span> Validasi BRIDA
                                    </span>
                                </template>
                                <template x-if="item.status_type === 'selesai'">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 shadow-xs">
                                        Selesai
                                    </span>
                                </template>
                                <template x-if="item.status_type === 'revisi'">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-200 shadow-xs">
                                        Revisi Diperlukan
                                    </span>
                                </template>
                                <template x-if="item.status_type === 'draft'">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                        Draft Belum Selesai
                                    </span>
                                </template>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <template x-if="item.skor > 0">
                                    <div class="w-36">
                                        <div class="flex items-center justify-between text-xs mb-1">
                                            <span class="font-extrabold" :class="item.skor >= 85 ? 'text-emerald-600' : (item.skor >= 70 ? 'text-blue-600' : 'text-amber-600')" x-text="item.skor.toFixed(1)"></span>
                                            <span class="text-gray-400 text-[10px]">/ 100</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                            <div class="h-2 rounded-full transition-all duration-500" :class="item.skor >= 85 ? 'bg-emerald-500' : (item.skor >= 70 ? 'bg-blue-600' : 'bg-amber-500')" :style="'width: ' + item.skor + '%'"></div>
                                        </div>
                                    </div>
                                </template>
                                <template x-if="item.skor === 0">
                                    <span class="text-xs text-gray-400 italic">Belum dihitung</span>
                                </template>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                <a :href="'/inovator/inovasi/' + item.id" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg text-xs font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 hover:text-blue-800 border border-blue-200 hover:border-blue-300 transition-all duration-150">
                                    <span>Lihat Detail</span>
                                </a>
                            </td>
                        </tr>
                    </template>

                    <!-- Empty State -->
                    <tr x-show="filteredItems.length === 0">
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="max-w-xs mx-auto">
                                <div class="w-12 h-12 mx-auto rounded-full bg-gray-100 flex items-center justify-center text-gray-400 mb-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <p class="text-sm font-semibold text-gray-900">Tidak ada inovasi ditemukan</p>
                                <p class="text-xs text-gray-500 mt-1">Coba sesuaikan kata kunci pencarian atau ubah filter status di atas.</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer Tabel -->
        <div class="px-6 py-4 bg-gray-50/70 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs text-gray-500">
            <div>
                Menampilkan <span class="font-bold text-gray-700" x-text="filteredItems.length"></span> dari <span class="font-bold text-gray-700" x-text="items.length"></span> total pengajuan
            </div>
        </div>
    </div>