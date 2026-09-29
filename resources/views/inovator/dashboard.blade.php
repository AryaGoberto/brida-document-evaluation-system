<x-app-layout>
    <x-slot name="header">
        @include('inovator.partials._header')
    </x-slot>

    <!-- Wrapper Alpine.js untuk Filter & Pencarian -->
    <div class="py-8 bg-gray-50/70 min-h-screen" 
         x-data='{ 
            searchQuery: "", 
            activeFilter: "all", 
            items: @json($riwayatInovasi),
            get filteredItems() {
                return this.items.filter(item => {
                    const matchSearch = item.nama.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                        item.kategori.toLowerCase().includes(this.searchQuery.toLowerCase());
                    
                    if (this.activeFilter === "all") return matchSearch;
                    return matchSearch && item.status_type === this.activeFilter;
                });
            }
         }'>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Notifikasi Sukses -->
            @if (session('success_pengajuan'))
                <div class="p-5 rounded-2xl bg-emerald-600 text-white shadow-lg flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-base">Pengajuan Berhasil Dikirim!</h4>
                            <p class="text-xs text-emerald-100 mt-0.5">{{ session('success_pengajuan') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @include('inovator.partials._welcome-banner')
            @include('inovator.partials._stats', ['stats' => $stats])
            @include('inovator.partials._tabel-riwayat')
            @include('inovator.partials._panduan')

        </div>
    </div>
</x-app-layout>