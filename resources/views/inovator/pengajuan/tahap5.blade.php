<x-app-layout>
    <div class="py-8 bg-gray-50/70 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Progress Bar & Wizard Header -->
            @include('inovator.pengajuan.partials.wizard-header', ['currentStep' => 5])

            <!-- Form Card Tahap 5 -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-6 sm:p-8 border-b border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-extrabold text-lg">
                                5
                            </span>
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Tahap 5: Unggah Berkas Bukti Indikator BRIDA</h2>
                                <p class="text-sm text-gray-500 mt-0.5">Lampirkan berkas bukti dukung (Format PDF, Maks. 20MB) pada 19 indikator evaluasi.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="text-xs font-semibold px-3 py-1.5 rounded-xl bg-amber-50 text-amber-800 border border-amber-200">
                                19 Parameter Evaluasi Kemendagri & BRIDA
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Banner Mode Revisi / Sanggahan -->
                @if ($isRevisi ?? false)
                    <div class="p-6 bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 text-white shadow-md border-b border-amber-600">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex items-start gap-3.5">
                                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold">Mode Perbaikan Berkas (Revisi dari Evaluator BRIDA)</h3>
                                    <p class="text-xs text-amber-100 mt-1 max-w-3xl leading-relaxed">
                                        Proposal dikembalikan untuk perbaikan. Anda <strong>hanya perlu menimpa/mengunggah ulang berkas PDF pada indikator yang ditandai merah/kuning</strong> di bawah ini. Dokumen pada indikator lainnya yang sudah benar tetap tersimpan aman dan tidak perlu diubah.
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('inovator.inovasi.show', $inovasiId ?? 4) }}"
                               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-amber-900 bg-white hover:bg-amber-50 transition-colors shadow-xs flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                <span>Lihat Catatan Evaluator</span>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Info Guide Box -->
                <div class="p-6 bg-slate-50 border-b border-gray-200/80">
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 text-xs">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-700">Panduan Skor Bintang:</span>
                            <span class="inline-flex items-center gap-1 text-gray-600 bg-white px-2.5 py-1 rounded-md border border-gray-200">
                                <span class="text-amber-500 font-bold">★☆☆</span> Bintang 1 (Skor Dasar)
                            </span>
                            <span class="inline-flex items-center gap-1 text-gray-600 bg-white px-2.5 py-1 rounded-md border border-gray-200">
                                <span class="text-amber-500 font-bold">★★☆</span> Bintang 2 (Skor Menengah)
                            </span>
                            <span class="inline-flex items-center gap-1 text-gray-600 bg-white px-2.5 py-1 rounded-md border border-gray-200">
                                <span class="text-amber-500 font-bold">★★★</span> Bintang 3 (Skor Maksimal)
                            </span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-gray-500 italic hidden lg:inline">*Setiap baris mengunggah PDF mandiri dengan progress bar terisolasi.</span>
                            @if (!empty($draft['indikator_files']))
                                <form method="POST" action="{{ route('inovator.pengajuan.resetIndikator') }}" onsubmit="return confirm('Apakah Anda yakin ingin mengosongkan seluruh berkas dan mulai memilih berkas dari awal?')">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-semibold text-rose-700 bg-rose-50 hover:bg-rose-100 border border-rose-200 transition-colors">
                                        <svg class="w-3.5 h-3.5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span>Kosongkan Semua Berkas</span>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Form Final Submission -->
                <form id="wizard-form" method="POST" action="{{ route('inovator.pengajuan.kirimFinal') }}">
                    @csrf

                    <!-- List Memanjang 20 Indikator -->
                    <div class="divide-y divide-gray-100">
                        @foreach ($indikatorList as $indikator)
                            @php
                                $no = $indikator['no'];
                                $existingFile = $draft['indikator_files'][$no] ?? null;
                                $perluRevisi = ($isRevisi ?? false) && isset($revisiList[$no]);
                            @endphp
                            
                            <div class="p-6 transition-colors {{ $perluRevisi ? 'bg-amber-50/70 border-l-4 border-amber-500' : 'hover:bg-slate-50/50' }}"
                                 x-data="indikatorUploader({{ $no }}, {{ json_encode($existingFile) }}, '{{ csrf_token() }}')">
                                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
                                    
                                    <!-- Bagian Kiri: Nomor, Judul & Panduan Syarat Bintang 1-3 -->
                                    <div class="flex-1 space-y-3">
                                        <div class="flex items-center gap-2.5 flex-wrap">
                                            <span class="flex-shrink-0 w-7 h-7 rounded-lg {{ $perluRevisi ? 'bg-amber-600' : 'bg-blue-600' }} text-white font-bold text-xs flex items-center justify-center">
                                                {{ $no }}
                                            </span>
                                            <h3 class="text-base font-bold text-gray-900">
                                                {{ $indikator['judul'] }}
                                            </h3>

                                            @if ($perluRevisi)
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-rose-100 text-rose-800 border border-rose-300 animate-pulse">
                                                    <svg class="w-3.5 h-3.5 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Perlu Perbaikan Berkas
                                                </span>
                                            @elseif ($isRevisi ?? false)
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                    <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Dokumen Valid
                                                </span>
                                            @endif
                                        </div>

                                        @if ($perluRevisi)
                                            <div class="p-3 rounded-xl bg-amber-100/80 border border-amber-300 text-xs text-amber-900 flex items-start gap-2">
                                                <svg class="w-4 h-4 text-amber-700 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                                </svg>
                                                <div>
                                                    <span class="font-bold block">Catatan Tim Evaluator BRIDA:</span>
                                                    <span>{{ $revisiList[$no] }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($indikator['sub_jenis']) && isset($indikator['daring']) && isset($indikator['luring']))
                                            <!-- Panduan Khusus 2 Jenis: Daring & Luring (Indikator 13) -->
                                            <div x-data="{ tabIntegrasi: 'daring' }" class="space-y-3 pt-1">
                                                <!-- Tab Switcher -->
                                                <div class="flex flex-wrap items-center gap-2 p-1.5 bg-slate-100 rounded-xl w-fit border border-slate-200">
                                                    <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider px-2">Kategori Integrasi:</span>
                                                    <button type="button"
                                                            @click="tabIntegrasi = 'daring'"
                                                            :class="tabIntegrasi === 'daring' ? 'bg-blue-600 text-white shadow-xs font-bold' : 'text-gray-700 hover:text-gray-900 font-medium hover:bg-slate-200'"
                                                            class="px-3 py-1 rounded-lg text-xs transition-all flex items-center gap-1.5">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                                        </svg>
                                                        <span>Layanan Daring (Online)</span>
                                                    </button>
                                                    <button type="button"
                                                            @click="tabIntegrasi = 'luring'"
                                                            :class="tabIntegrasi === 'luring' ? 'bg-indigo-600 text-white shadow-xs font-bold' : 'text-gray-700 hover:text-gray-900 font-medium hover:bg-slate-200'"
                                                            class="px-3 py-1 rounded-lg text-xs transition-all flex items-center gap-1.5">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                        </svg>
                                                        <span>Layanan Luring (Tatap Muka)</span>
                                                    </button>
                                                    <button type="button"
                                                            @click="tabIntegrasi = 'all'"
                                                            :class="tabIntegrasi === 'all' ? 'bg-gray-800 text-white shadow-xs font-bold' : 'text-gray-600 hover:text-gray-900 font-medium hover:bg-slate-200'"
                                                            class="px-2.5 py-1 rounded-lg text-xs transition-all">
                                                        Tampilkan Keduanya
                                                    </button>
                                                </div>

                                                <!-- Panel 1: Daring -->
                                                <div x-show="tabIntegrasi === 'daring' || tabIntegrasi === 'all'" class="space-y-1.5">
                                                    <div class="flex items-center gap-2">
                                                        <span class="inline-flex items-center gap-1 text-[11px] font-bold text-blue-700 bg-blue-100/80 px-2 py-0.5 rounded-md">
                                                            🌐 Kategori DARING (Aplikasi Web / Mobile)
                                                        </span>
                                                    </div>
                                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                                                        <div class="p-2.5 rounded-lg bg-white border border-gray-200 text-[11px] leading-relaxed">
                                                            <div class="font-bold text-amber-600 flex items-center gap-1 mb-1">
                                                                <span>★☆☆</span> 1 Bintang (Daring)
                                                            </div>
                                                            <p class="text-gray-700">{{ $indikator['daring']['star1'] }}</p>
                                                        </div>
                                                        <div class="p-2.5 rounded-lg bg-white border border-gray-200 text-[11px] leading-relaxed">
                                                            <div class="font-bold text-amber-600 flex items-center gap-1 mb-1">
                                                                <span>★★☆</span> 2 Bintang (Daring)
                                                            </div>
                                                            <p class="text-gray-700">{{ $indikator['daring']['star2'] }}</p>
                                                        </div>
                                                        <div class="p-2.5 rounded-lg bg-blue-50/80 border border-blue-200 text-[11px] leading-relaxed">
                                                            <div class="font-bold text-blue-700 flex items-center gap-1 mb-1">
                                                                <span class="text-amber-500">★★★</span> 3 Bintang (Daring Maksimal)
                                                            </div>
                                                            <p class="text-blue-900 font-semibold">{{ $indikator['daring']['star3'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Panel 2: Luring -->
                                                <div x-show="tabIntegrasi === 'luring' || tabIntegrasi === 'all'" class="space-y-1.5">
                                                    <div class="flex items-center gap-2">
                                                        <span class="inline-flex items-center gap-1 text-[11px] font-bold text-indigo-700 bg-indigo-100/80 px-2 py-0.5 rounded-md">
                                                            🏢 Kategori LURING (Integrasi Program / Kegiatan)
                                                        </span>
                                                    </div>
                                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                                                        <div class="p-2.5 rounded-lg bg-white border border-gray-200 text-[11px] leading-relaxed">
                                                            <div class="font-bold text-amber-600 flex items-center gap-1 mb-1">
                                                                <span>★☆☆</span> 1 Bintang (Luring)
                                                            </div>
                                                            <p class="text-gray-700">{{ $indikator['luring']['star1'] }}</p>
                                                        </div>
                                                        <div class="p-2.5 rounded-lg bg-white border border-gray-200 text-[11px] leading-relaxed">
                                                            <div class="font-bold text-amber-600 flex items-center gap-1 mb-1">
                                                                <span>★★☆</span> 2 Bintang (Luring)
                                                            </div>
                                                            <p class="text-gray-700">{{ $indikator['luring']['star2'] }}</p>
                                                        </div>
                                                        <div class="p-2.5 rounded-lg bg-indigo-50/80 border border-indigo-200 text-[11px] leading-relaxed">
                                                            <div class="font-bold text-indigo-700 flex items-center gap-1 mb-1">
                                                                <span class="text-amber-500">★★★</span> 3 Bintang (Luring Maksimal)
                                                            </div>
                                                            <p class="text-indigo-900 font-semibold">{{ $indikator['luring']['star3'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Panduan Standar Syarat Bintang 1 - 3 -->
                                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 pt-1">
                                                <div class="p-2.5 rounded-lg bg-white border border-gray-200 text-[11px] leading-relaxed">
                                                    <div class="font-bold text-amber-600 flex items-center gap-1 mb-1">
                                                        <span>★☆☆</span> Syarat Bintang 1
                                                    </div>
                                                    <p class="text-gray-600">{{ $indikator['panduan']['star1'] }}</p>
                                                </div>

                                                <div class="p-2.5 rounded-lg bg-white border border-gray-200 text-[11px] leading-relaxed">
                                                    <div class="font-bold text-amber-600 flex items-center gap-1 mb-1">
                                                        <span>★★☆</span> Syarat Bintang 2
                                                    </div>
                                                    <p class="text-gray-600">{{ $indikator['panduan']['star2'] }}</p>
                                                </div>

                                                <div class="p-2.5 rounded-lg bg-blue-50/70 border border-blue-200 text-[11px] leading-relaxed">
                                                    <div class="font-bold text-blue-700 flex items-center gap-1 mb-1">
                                                        <span class="text-amber-500">★★★</span> Syarat Bintang 3 (Maksimal)
                                                    </div>
                                                    <p class="text-blue-900">{{ $indikator['panduan']['star3'] }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Bagian Kanan: Upload File PDF Terisolasi & Progress Bar -->
                                    <div class="w-full lg:w-80 flex-shrink-0 space-y-3">
                                        <!-- File Input (Tersembunyi, dipicu oleh tombol) -->
                                        <input type="file"
                                               x-ref="fileInput"
                                               @change="handleFileUpload($event)"
                                               accept=".pdf,application/pdf"
                                               class="hidden">

                                        <!-- Kotak Status Berkas Terunggah -->
                                        <div x-show="fileInfo" class="p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-xs">
                                            <div class="flex items-start justify-between gap-2">
                                                <div class="flex items-start gap-2 min-w-0">
                                                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <div class="min-w-0">
                                                        <p class="font-bold text-emerald-900 truncate" x-text="fileInfo ? fileInfo.filename : ''"></p>
                                                        <p class="text-emerald-700 text-[10px]" x-text="fileInfo ? (fileInfo.size + ' • Terunggah') : ''"></p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2 flex-shrink-0">
                                                    <button type="button"
                                                            @click="$refs.fileInput.click()"
                                                            title="Ganti Berkas PDF"
                                                            class="text-[11px] font-semibold text-blue-600 hover:text-blue-800 underline">
                                                        Ganti
                                                    </button>
                                                    <span class="text-gray-300">•</span>
                                                    <button type="button"
                                                            @click="hapusFile()"
                                                            title="Hapus Berkas PDF"
                                                            class="text-[11px] font-semibold text-rose-600 hover:text-rose-800 underline">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tombol Pilih Berkas saat belum ada file -->
                                        <div x-show="!fileInfo && !isUploading">
                                            <button type="button"
                                                    @click="$refs.fileInput.click()"
                                                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border-2 border-dashed border-gray-300 hover:border-blue-500 hover:bg-blue-50/50 text-xs font-semibold text-gray-700 hover:text-blue-700 transition-colors">
                                                <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                                <span>Pilih Berkas PDF Indikator {{ $no }}</span>
                                            </button>
                                        </div>

                                        <!-- Progress Bar Terisolasi Hanya Untuk Baris Ini -->
                                        <div x-show="isUploading" class="space-y-1.5 p-3 rounded-xl bg-blue-50 border border-blue-200">
                                            <div class="flex items-center justify-between text-xs font-semibold text-blue-900">
                                                <span class="flex items-center gap-1.5">
                                                    <svg class="w-3.5 h-3.5 text-blue-600 animate-spin" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                    </svg>
                                                    Mengunggah PDF...
                                                </span>
                                                <span x-text="progress + '%'"></span>
                                            </div>
                                            <div class="w-full bg-blue-200 rounded-full h-2 overflow-hidden">
                                                <div class="bg-blue-600 h-2 rounded-full transition-all duration-200 ease-out"
                                                     :style="'width: ' + progress + '%'"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Bagian Konfirmasi Pakta Integritas & Tombol Submit Final -->
                    <div class="p-6 sm:p-8 bg-slate-50 border-t border-gray-200 space-y-6">
                        
                        <!-- Pakta Integritas Checkbox -->
                        <div class="p-5 rounded-2xl bg-white border border-gray-200 shadow-xs">
                            <label class="flex items-start gap-3.5 cursor-pointer">
                                <input type="checkbox"
                                       name="pakta_integritas"
                                       value="1"
                                       required
                                       {{ old('pakta_integritas', $draft['pakta_integritas'] ?? false) ? 'checked' : '' }}
                                       class="mt-1 w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <div class="text-xs sm:text-sm text-gray-700 leading-relaxed">
                                    <span class="font-bold text-gray-900 block mb-0.5">Konfirmasi Pakta Integritas & Keabsahan Dokumen *</span>
                                    Dengan ini saya menyatakan secara sadar bahwa seluruh data, rancang bangun, dan berkas bukti dukung yang dilampirkan dalam pengajuan inovasi ini adalah <strong>benar, orisinal, bebas dari plagiasi</strong>, serta dapat dipertanggungjawabkan keasliannya kepada Tim Penilai Badan Riset dan Inovasi Daerah (BRIDA) Kota Makassar dan Kementerian Dalam Negeri RI.
                                </div>
                            </label>
                            <x-input-error :messages="$errors->get('pakta_integritas')" class="mt-2 ml-8" />
                        </div>

                        <!-- Footer Navigation & Submit Button -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('inovator.pengajuan.tahap4') }}"
                                   class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:text-gray-900 bg-gray-200/80 hover:bg-gray-300 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    <span>Kembali ke Tahap 4</span>
                                </a>

                                <button type="submit"
                                        formaction="{{ route('inovator.pengajuan.simpanTahap5') }}"
                                        name="action"
                                        value="draft"
                                        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 shadow-xs transition-colors">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                    </svg>
                                    <span>Simpan Draft</span>
                                </button>
                            </div>

                            <!-- Tombol Utama Kirim Pengajuan Evaluasi (Mencolok) -->
                            <button type="submit"
                                    class="inline-flex items-center justify-center gap-2.5 px-8 py-3 rounded-xl text-base font-extrabold text-white bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-800 hover:from-blue-800 hover:to-indigo-900 shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                <span>Kirim Pengajuan Evaluasi</span>
                            </button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>

    <!-- Script Upload Berkas Terisolasi Per Baris Indikator -->
    <script>
        function indikatorUploader(no, initialFileInfo, csrfToken) {
            return {
                no: no,
                fileInfo: initialFileInfo,
                isUploading: false,
                progress: 0,
                handleFileUpload(event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    if (file.type !== 'application/pdf') {
                        alert('Hanya berkas berformat PDF yang diperbolehkan.');
                        event.target.value = '';
                        return;
                    }

                    if (file.size > 20 * 1024 * 1024) {
                        alert('Ukuran berkas melebihi batas maksimal 20 MB.');
                        event.target.value = '';
                        return;
                    }

                    this.isUploading = true;
                    this.progress = 10;

                    const formData = new FormData();
                    formData.append('indikator_no', this.no);
                    formData.append('file', file);
                    formData.append('_token', csrfToken);

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route("inovator.pengajuan.uploadIndikator") }}', true);

                    xhr.upload.onprogress = (e) => {
                        if (e.lengthComputable) {
                            const percent = Math.round((e.loaded / e.total) * 100);
                            this.progress = Math.max(10, percent);
                        }
                    };

                    xhr.onload = () => {
                        this.isUploading = false;
                        if (xhr.status === 200) {
                            try {
                                const response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    this.fileInfo = response.file_info;
                                }
                            } catch (e) {
                                console.error('Upload parse error', e);
                            }
                        } else {
                            let errorMsg = 'Gagal mengunggah berkas indikator. Silakan coba kembali.';
                            try {
                                const err = JSON.parse(xhr.responseText);
                                if (err.errors && err.errors.file) {
                                    errorMsg = err.errors.file.join('\n');
                                } else if (err.message) {
                                    errorMsg = err.message;
                                }
                            } catch (e) {
                                if (xhr.status === 413) {
                                    errorMsg = 'Ukuran berkas melebihi kapasitas maksimal yang diizinkan server.';
                                }
                            }
                            alert(errorMsg);
                        }
                    };

                    xhr.onerror = () => {
                        this.isUploading = false;
                        alert('Terjadi kesalahan jaringan saat mengunggah berkas.');
                    };

                    xhr.send(formData);
                },
                hapusFile() {
                    if (!confirm('Apakah Anda yakin ingin menghapus berkas indikator ini?')) {
                        return;
                    }
                    this.fileInfo = null;
                    if (this.$refs.fileInput) {
                        this.$refs.fileInput.value = '';
                    }

                    const formData = new FormData();
                    formData.append('indikator_no', this.no);
                    formData.append('_token', csrfToken);

                    fetch('{{ route("inovator.pengajuan.hapusIndikator") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        }
                    }).catch(e => console.error('Hapus berkas error', e));
                }
            };
        }
    </script>
</x-app-layout>
