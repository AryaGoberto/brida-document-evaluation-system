<x-app-layout>
    <x-slot name="header">
        @include('inovator.inovasi.partials._header')
    </x-slot>

    <div class="py-8 bg-gray-50/70 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            @include('inovator.inovasi.partials._revisi_banner')
            @include('inovator.inovasi.partials._feedback')
            @include('inovator.inovasi.partials._tabel_penilaian')
            @include('inovator.inovasi.partials._metadata_administratif')
        </div>
    </div>
</x-app-layout>
