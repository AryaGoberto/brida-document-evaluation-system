<x-app-layout>
    <div class="py-8 bg-gray-50/70 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8" x-data="{ search: '', filterPriority: 'all', filterCategory: 'all' }">
            
            <!-- Banner Utama & Metrik Kinerja -->
            @include('evaluator.partials._dashboard._dashboard_banner')
            @include('evaluator.partials._dashboard._dashboard_metrics')

            <!-- Layout Utama: Daftar Tugas & Sidebar -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start" id="daftar-tugas">
                
                <!-- Kolom Kiri & Tengah: Task Inbox -->
                <div class="lg:col-span-2 space-y-6">
                    @include('evaluator.partials._dashboard._dashboard_task_inbox')
                </div>
                
                <!-- Kolom Kanan: Sidebar Informasi -->
                <div class="space-y-6">
                    @include('evaluator.partials._dashboard._dashboard_sidebar')
                </div>

            </div>
        </div>
    </div>
</x-app-layout>