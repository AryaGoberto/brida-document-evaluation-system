<x-app-layout>
    <div class="py-8 bg-gray-50/70 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" x-data="{
            search: '',
            filterStatus: 'all'
        }">

            <!-- Header Utama & Tombol Cetak Rekap PDF -->
            @include('evaluator.partials._riwayat._riwayat_header')

            <!-- 4 Kartu Statistik Kelulusan Final -->
            @include('evaluator.partials._riwayat._riwayat_stats')

            <!-- Filter Status & Pencarian -->
            @include('evaluator.partials._riwayat._riwayat_filters')

            <!-- Tabel Riwayat Final Inovasi -->
            @include('evaluator.partials._riwayat._riwayat_table')

        </div>
    </div>
</x-app-layout>
