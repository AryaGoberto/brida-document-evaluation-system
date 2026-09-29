<x-app-layout>
    <div class="py-8 bg-gray-50/70 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" 
             x-data="{ 
                search: '', 
                filterOpd: 'all', 
                filterStatus: 'all', 
                filterPeriode: 'all', 
                resetFilters() { 
                    this.search = ''; 
                    this.filterOpd = 'all'; 
                    this.filterStatus = 'all'; 
                    this.filterPeriode = 'all'; 
                } 
             }">
            
            @include('evaluator.partials._antrean._antrean_header')
            
            <!-- Chips Ringkasan Status (Butuh Validasi, Menunggu OCR, dll) -->
            @include('evaluator.partials._antrean._antrean_stats')
            
            <!-- Form Pencarian & Dropdown Filter -->
            @include('evaluator.partials._antrean._antrean_filters')
            
            <!-- Tabel Data Inovasi Lengkap -->
            @include('evaluator.partials._antrean._antrean_table')

        </div>
    </div>
</x-app-layout>