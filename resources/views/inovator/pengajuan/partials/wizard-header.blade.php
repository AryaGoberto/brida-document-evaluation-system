@props(['currentStep' => 1])

@php
    $steps = [
        1 => ['title' => 'Kategori & PIC', 'subtitle' => 'Data Pemohon', 'route' => route('inovator.pengajuan.tahap1')],
        2 => ['title' => 'Metadata Inovasi', 'subtitle' => 'Identitas & Jadwal', 'route' => route('inovator.pengajuan.tahap2')],
        3 => ['title' => 'Deskripsi Inovasi', 'subtitle' => 'Latar Belakang & Manfaat', 'route' => route('inovator.pengajuan.tahap3')],
        4 => ['title' => 'Pemetaan SDGs', 'subtitle' => '17 Target Berkelanjutan', 'route' => route('inovator.pengajuan.tahap4')],
        5 => ['title' => 'Unggah Bukti Indikator', 'subtitle' => '20 Parameter BRIDA', 'route' => route('inovator.pengajuan.tahap5')],
    ];
    $progressPercent = ($currentStep / 5) * 100;
@endphp

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-8">
    <!-- Header Title & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-6 border-b border-gray-100">
        <div>
            <div class="flex items-center gap-2">
                <a href="{{ route('inovator.dashboard') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800 flex items-center gap-1 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Dasbor
                </a>
                <span class="text-gray-300">•</span>
                <span class="text-xs text-gray-500 font-medium">Wizard 5 Tahap Evaluasi Inovasi</span>
            </div>
            <h1 class="text-2xl font-extrabold text-gray-900 mt-1">
                Formulir Pengajuan Inovasi Daerah
            </h1>
        </div>

        <!-- Tombol Simpan Draft Cepat di Atas Layar -->
        <div class="flex items-center gap-3">
            <button type="submit"
                    form="wizard-form"
                    name="action"
                    value="draft"
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 hover:border-gray-400 shadow-xs transition-all duration-150">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                <span>Simpan Draft</span>
            </button>

            <span class="hidden md:inline-flex items-center gap-1 text-xs text-emerald-600 font-medium bg-emerald-50 px-3 py-2 rounded-xl border border-emerald-200">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                Autosave Aktif
            </span>
        </div>
    </div>

    <!-- Alert Notifikasi Status Draft jika baru saja disimpan -->
    @if (session('status_draft'))
        <div class="mt-4 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span>{{ session('status_draft') }}</span>
            </div>
            <span class="text-xs text-emerald-600">{{ now()->format('H:i:s') }}</span>
        </div>
    @endif

    <!-- Indikator Progress Bar Angka Persentase -->
    <div class="mt-6">
        <div class="flex items-center justify-between text-xs font-semibold mb-2">
            <span class="text-blue-700 uppercase tracking-wider">Tahap {{ $currentStep }} dari 5: {{ $steps[$currentStep]['title'] }}</span>
            <span class="text-gray-500 font-mono">{{ $progressPercent }}% Selesai</span>
        </div>
        <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 h-2.5 rounded-full transition-all duration-500 ease-out"
                 style="width: {{ $progressPercent }}%"></div>
        </div>
    </div>

    <!-- Navigasi Tab Langkah 1 sampai 5 -->
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 mt-6 pt-4 border-t border-gray-100">
        @foreach ($steps as $stepNum => $step)
            @php
                $isCurrent = $stepNum === $currentStep;
                $isCompleted = $stepNum < $currentStep;
            @endphp
            <a href="{{ $step['route'] }}"
               class="flex items-center gap-3 p-2.5 rounded-xl transition-all duration-150 border {{ $isCurrent ? 'bg-blue-50/80 border-blue-300 ring-2 ring-blue-500/20 shadow-xs' : ($isCompleted ? 'bg-gray-50 border-gray-200 hover:bg-gray-100' : 'bg-white border-transparent hover:bg-gray-50 opacity-60') }}">
                <div class="flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center font-bold text-xs {{ $isCurrent ? 'bg-blue-600 text-white shadow-sm' : ($isCompleted ? 'bg-emerald-600 text-white' : 'bg-gray-200 text-gray-600') }}">
                    @if ($isCompleted)
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                        </svg>
                    @else
                        {{ $stepNum }}
                    @endif
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-bold truncate {{ $isCurrent ? 'text-blue-900' : ($isCompleted ? 'text-gray-900' : 'text-gray-500') }}">
                        {{ $step['title'] }}
                    </p>
                    <p class="text-[10px] text-gray-500 truncate hidden sm:block">
                        {{ $step['subtitle'] }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</div>
