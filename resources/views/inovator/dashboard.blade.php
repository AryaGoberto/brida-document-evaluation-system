<x-app-layout>
    <x-slot name="header">
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

            <!-- Tombol Utama (Call to Action) Mencolok -->
            <div class="flex-shrink-0">
                <a href="{{ route('inovator.pengajuan.tahap1') }}"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-xl font-bold text-white bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 hover:from-blue-700 hover:to-indigo-800 shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 group text-sm sm:text-base border border-blue-500/30">
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
    </x-slot>

    <div class="py-8 bg-gray-50/70 min-h-screen" x-data="{
        searchQuery: '',
        activeFilter: 'all',
        items: {{ json_encode($riwayatInovasi) }},
        get filteredItems() {
            return this.items.filter(item => {
                const matchSearch = item.nama.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                    item.kategori.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                    item.dinas.toLowerCase().includes(this.searchQuery.toLowerCase());
                
                if (this.activeFilter === 'all') return matchSearch;
                if (this.activeFilter === 'ai') return matchSearch && item.status_type === 'ai';
                if (this.activeFilter === 'validasi') return matchSearch && item.status_type === 'validasi';
                if (this.activeFilter === 'selesai') return matchSearch && item.status_type === 'selesai';
                if (this.activeFilter === 'revisi') return matchSearch && item.status_type === 'revisi';
                if (this.activeFilter === 'draft') return matchSearch && item.status_type === 'draft';
                return matchSearch;
            });
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            @if (session('success_pengajuan'))
                <div class="p-5 rounded-2xl bg-emerald-600 text-white shadow-lg flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-base">Pengajuan Berhasil Dikirim!</h4>
                            <p class="text-xs text-emerald-100 mt-0.5">{{ session('success_pengajuan') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Banner Notifikasi / Info Wizard 5 Tahap -->
            <div class="bg-gradient-to-r from-blue-900 via-indigo-900 to-slate-900 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-blue-500/10 rounded-full blur-2xl"></div>
                <div class="absolute -left-10 -top-10 w-48 h-48 bg-indigo-500/10 rounded-full blur-2xl"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-blue-200 border border-white/10">
                            <svg class="w-3.5 h-3.5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                            </svg>
                            Sistem Evaluasi Berbantuan AI BRIDA Makassar
                        </div>
                        <h2 class="text-xl font-bold tracking-tight text-white sm:text-2xl">
                            Selamat Datang, {{ Auth::user()->name }}
                        </h2>
                        <p class="text-sm text-blue-100/90 max-w-2xl leading-relaxed">
                            Setiap proposal inovasi akan melewati telaah otomatis model AI sebelum divalidasi oleh tim penilai BRIDA Kota Makassar guna memastikan kelengkapan indikator dan kematangan inovasi.
                        </p>
                    </div>

                    <!-- Indikator 5 Tahap Wizard -->
                    <div class="grid grid-cols-5 gap-1.5 sm:gap-2 bg-white/10 p-3 rounded-xl backdrop-blur-sm border border-white/10 max-w-md">
                        <div class="text-center">
                            <span class="w-6 h-6 mx-auto flex items-center justify-center rounded-full bg-blue-500 text-[11px] font-bold">1</span>
                            <span class="text-[10px] text-blue-200 mt-1 block">Profil</span>
                        </div>
                        <div class="text-center">
                            <span class="w-6 h-6 mx-auto flex items-center justify-center rounded-full bg-blue-500 text-[11px] font-bold">2</span>
                            <span class="text-[10px] text-blue-200 mt-1 block">Masalah</span>
                        </div>
                        <div class="text-center">
                            <span class="w-6 h-6 mx-auto flex items-center justify-center rounded-full bg-indigo-500 text-[11px] font-bold">3</span>
                            <span class="text-[10px] text-blue-200 mt-1 block">Skoring AI</span>
                        </div>
                        <div class="text-center">
                            <span class="w-6 h-6 mx-auto flex items-center justify-center rounded-full bg-indigo-500 text-[11px] font-bold">4</span>
                            <span class="text-[10px] text-blue-200 mt-1 block">Bukti</span>
                        </div>
                        <div class="text-center">
                            <span class="w-6 h-6 mx-auto flex items-center justify-center rounded-full bg-emerald-500 text-[11px] font-bold">5</span>
                            <span class="text-[10px] text-emerald-300 mt-1 block">Kirim</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KARTU STATISTIK (WIDGET) -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Ringkasan & Indikator Kinerja Inovasi
                    </h3>
                    <span class="text-xs text-gray-500 font-medium">Update Terkini: {{ now()->translatedFormat('d F Y') }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    
                    <!-- 1. Total Inovasi Diajukan -->
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                        <div class="flex items-center justify-between relative z-10">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-gray-500">Total Inovasi Diajukan</p>
                                <h4 class="text-3xl font-extrabold text-gray-900 mt-2 tracking-tight">{{ $stats['total_diajukan'] }}</h4>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs relative z-10">
                            <span class="text-emerald-600 font-semibold flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                Seluruh OPD
                            </span>
                            <span class="text-gray-400">Tahun 2026</span>
                        </div>
                    </div>

                    <!-- 2. Draft Belum Selesai -->
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-slate-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                        <div class="flex items-center justify-between relative z-10">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-gray-500">Draft Belum Selesai</p>
                                <h4 class="text-3xl font-extrabold text-gray-900 mt-2 tracking-tight">{{ $stats['draft_belum_selesai'] }}</h4>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-slate-700 text-white flex items-center justify-center shadow-lg shadow-slate-500/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs relative z-10">
                            <span class="text-amber-600 font-semibold flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Tersimpan di sistem
                            </span>
                            <span class="text-gray-400">Perlu dilengkapi</span>
                        </div>
                    </div>

                    <!-- 3. Menunggu Evaluasi -->
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-amber-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                        <div class="flex items-center justify-between relative z-10">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-gray-500">Menunggu Evaluasi</p>
                                <h4 class="text-3xl font-extrabold text-amber-600 mt-2 tracking-tight">{{ $stats['menunggu_evaluasi'] }}</h4>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-amber-500 text-white flex items-center justify-center shadow-lg shadow-amber-500/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs relative z-10">
                            <span class="text-blue-600 font-semibold flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-ping"></span>
                                AI & Tim Penilai BRIDA
                            </span>
                            <span class="text-gray-400">Dalam antrean</span>
                        </div>
                    </div>

                    <!-- 4. Revisi Diperlukan -->
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-rose-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                        <div class="flex items-center justify-between relative z-10">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-gray-500">Revisi Diperlukan</p>
                                <h4 class="text-3xl font-extrabold text-rose-600 mt-2 tracking-tight">{{ $stats['revisi_diperlukan'] }}</h4>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-rose-600 text-white flex items-center justify-center shadow-lg shadow-rose-500/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs relative z-10">
                            <span class="text-rose-600 font-semibold flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                </svg>
                                Perlu Perbaikan
                            </span>
                            <span class="text-gray-400">Catatan tersedia</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- TABEL RIWAYAT PENGAJUAN -->
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

                        <!-- Search Input -->
                        <div class="relative w-full sm:w-72">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <input type="text"
                                   x-model="searchQuery"
                                   placeholder="Cari nama inovasi / OPD..."
                                   class="w-full pl-9 pr-4 py-2 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        </div>
                    </div>

                    <!-- Filter Kategori Status -->
                    <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-gray-100">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider mr-1">Filter Status:</span>
                        
                        <button @click="activeFilter = 'all'"
                                :class="activeFilter === 'all' ? 'bg-blue-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                                class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150">
                            Semua (<span x-text="items.length"></span>)
                        </button>

                        <button @click="activeFilter = 'validasi'"
                                :class="activeFilter === 'validasi' ? 'bg-blue-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                                class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                            Validasi BRIDA
                        </button>

                        <button @click="activeFilter = 'ai'"
                                :class="activeFilter === 'ai' ? 'bg-purple-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                                class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                            Proses AI
                        </button>

                        <button @click="activeFilter = 'selesai'"
                                :class="activeFilter === 'selesai' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                                class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Selesai
                        </button>

                        <button @click="activeFilter = 'revisi'"
                                :class="activeFilter === 'revisi' ? 'bg-rose-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                                class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                            Revisi Diperlukan
                        </button>

                        <button @click="activeFilter = 'draft'"
                                :class="activeFilter === 'draft' ? 'bg-slate-700 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                                class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-slate-500"></span>
                            Draft
                        </button>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left">
                        <thead class="bg-gray-50/80">
                            <tr>
                                <th scope="col" class="px-6 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Nama Inovasi
                                </th>
                                <th scope="col" class="px-6 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Tanggal Pengajuan
                                </th>
                                <th scope="col" class="px-6 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Status Terkini
                                </th>
                                <th scope="col" class="px-6 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Total Skor Sementara
                                </th>
                                <th scope="col" class="px-6 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            <template x-for="item in filteredItems" :key="item.id">
                                <tr class="hover:bg-blue-50/40 transition-colors">
                                    <!-- Kolom: Nama Inovasi -->
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

                                    <!-- Kolom: Tanggal Pengajuan -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center text-sm text-gray-600 gap-1.5">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="font-medium" x-text="item.tanggal_pengajuan"></span>
                                        </div>
                                        <span class="text-[11px] text-gray-400 block mt-0.5" x-text="item.tahap"></span>
                                    </td>

                                    <!-- Kolom: Status Terkini (Proses AI/Validasi BRIDA/Selesai/Revisi/Draft) -->
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
                                                <span class="w-2 h-2 mr-1.5 rounded-full bg-blue-600 animate-pulse"></span>
                                                Validasi BRIDA
                                            </span>
                                        </template>

                                        <template x-if="item.status_type === 'selesai'">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 shadow-xs">
                                                <svg class="w-3.5 h-3.5 mr-1 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                                Selesai
                                            </span>
                                        </template>

                                        <template x-if="item.status_type === 'revisi'">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-200 shadow-xs">
                                                <svg class="w-3.5 h-3.5 mr-1 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                Revisi Diperlukan
                                            </span>
                                        </template>

                                        <template x-if="item.status_type === 'draft'">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                                <svg class="w-3 h-3 mr-1 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"></path>
                                                </svg>
                                                Draft Belum Selesai
                                            </span>
                                        </template>
                                    </td>

                                    <!-- Kolom: Total Skor Sementara -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <template x-if="item.skor > 0">
                                            <div class="w-36">
                                                <div class="flex items-center justify-between text-xs mb-1">
                                                    <span class="font-extrabold"
                                                          :class="item.skor >= 85 ? 'text-emerald-600' : (item.skor >= 70 ? 'text-blue-600' : 'text-amber-600')"
                                                          x-text="item.skor.toFixed(1)"></span>
                                                    <span class="text-gray-400 text-[10px]">/ 100</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                                    <div class="h-2 rounded-full transition-all duration-500"
                                                         :class="item.skor >= 85 ? 'bg-emerald-500' : (item.skor >= 70 ? 'bg-blue-600' : 'bg-amber-500')"
                                                         :style="'width: ' + item.skor + '%'"></div>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="item.skor === 0">
                                            <span class="text-xs text-gray-400 italic">Belum dihitung</span>
                                        </template>
                                    </td>

                                    <!-- Kolom Aksi: Tombol "Lihat Detail" -->
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                        <a :href="'/inovator/inovasi/' + item.id"
                                           class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg text-xs font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 hover:text-blue-800 border border-blue-200 hover:border-blue-300 transition-all duration-150">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>Lihat Detail</span>
                                        </a>
                                    </td>
                                </tr>
                            </template>

                            <!-- Empty State saat pencarian/filter tidak ditemukan -->
                            <tr x-show="filteredItems.length === 0">
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="max-w-xs mx-auto">
                                        <div class="w-12 h-12 mx-auto rounded-full bg-gray-100 flex items-center justify-center text-gray-400 mb-3">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-900">Tidak ada inovasi ditemukan</p>
                                        <p class="text-xs text-gray-500 mt-1">Coba sesuaikan kata kunci pencarian atau ubah filter status di atas.</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Tabel Info Ringkas -->
                <div class="px-6 py-4 bg-gray-50/70 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs text-gray-500">
                    <div>
                        Menampilkan <span class="font-bold text-gray-700" x-text="filteredItems.length"></span> dari <span class="font-bold text-gray-700" x-text="items.length"></span> total pengajuan
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span> Validasi BRIDA
                        </span>
                        <span class="inline-flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-purple-600"></span> Proses AI
                        </span>
                        <span class="inline-flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-emerald-600"></span> Selesai
                        </span>
                    </div>
                </div>
            </div>

            <!-- Panduan 5 Tahap Pengajuan Wizard (Callout Card) -->
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

                    <a href="{{ route('inovator.pengajuan.tahap1') }}"
                       class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl font-semibold text-sm text-white bg-blue-700 hover:bg-blue-800 transition-colors shadow-sm self-start md:self-auto">
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

        </div>
    </div>
</x-app-layout>
