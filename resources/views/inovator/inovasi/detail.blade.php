<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="flex items-center space-x-2 text-xs font-semibold text-blue-700 uppercase tracking-wider mb-1">
                    <a href="{{ route('inovator.dashboard') }}" class="hover:underline flex items-center gap-1 text-gray-500 hover:text-blue-600">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Dasbor
                    </a>
                    <span>/</span>
                    <span>Detail & Evaluasi Inovasi</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
                    {{ $inovasi['judul'] }}
                </h1>
                <div class="flex flex-wrap items-center gap-2 mt-2 text-xs sm:text-sm text-gray-500">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-medium bg-blue-100 text-blue-800">
                        {{ $inovasi['kategori'] }}
                    </span>
                    <span>•</span>
                    <span class="font-medium text-gray-700">{{ $inovasi['opd'] }}</span>
                    <span>•</span>
                    <span>Diajukan: {{ $inovasi['tanggal_pengajuan'] }}</span>
                </div>
            </div>

            <!-- Header Action / Status Badge -->
            <div class="flex items-center gap-3 flex-shrink-0">
                @if ($inovasi['status_type'] === 'revisi')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs sm:text-sm font-bold bg-rose-50 text-rose-700 border border-rose-200 shadow-xs animate-pulse">
                        <svg class="w-4 h-4 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        Status: Revisi Diperlukan
                    </span>
                @elseif ($inovasi['status_type'] === 'selesai')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs sm:text-sm font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shadow-xs">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Status: Evaluasi Selesai
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs sm:text-sm font-bold bg-blue-50 text-blue-700 border border-blue-200 shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-ping"></span>
                        Status: {{ $inovasi['status'] }}
                    </span>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50/70 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- SISTEM SANGGAHAN / REVISI CALLOUT (JIKA STATUS REVISI) -->
            @if ($inovasi['status_type'] === 'revisi')
                <div class="bg-gradient-to-r from-amber-500 via-orange-500 to-rose-500 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 relative z-10">
                        <div class="space-y-1">
                            <div class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full text-xs font-bold bg-white/20 text-white border border-white/20">
                                ⚠️ Dokumen Perlu Tindak Lanjut Inovator
                            </div>
                            <h2 class="text-xl font-black tracking-tight sm:text-2xl">
                                Berkas Dikembalikan oleh Tim Evaluator BRIDA
                            </h2>
                            <p class="text-xs sm:text-sm text-amber-100 max-w-2xl leading-relaxed">
                                Terdapat <strong>{{ $jumlahPerluRevisi }} indikator</strong> yang membutuhkan perbaikan bukti dukung. Anda dapat langsung mengunggah perbaikan melalui tombol di samping tanpa harus mengunggah ulang dokumen yang sudah diverifikasi benar.
                            </p>
                        </div>

                        <!-- Tombol Utama [Perbaiki Berkas] Aktif -->
                        <div class="flex-shrink-0">
                            <a href="{{ route('inovator.pengajuan.tahap5', ['revisi' => 1, 'inovasi_id' => $inovasi['id']]) }}"
                               class="inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl font-extrabold text-sm sm:text-base text-amber-900 bg-white hover:bg-amber-50 shadow-xl hover:shadow-2xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span>Perbaiki Berkas Sekarang</span>
                                <svg class="w-4 h-4 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- PANEL UMPAN BALIK (FEEDBACK EVALUATOR & AI) -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8 space-y-6">
                <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                        Panel Umpan Balik & Evaluasi (BRIDA & AI)
                    </h3>
                    <span class="text-xs text-gray-500 font-medium">Diperbarui: {{ $inovasi['tanggal_evaluasi'] }}</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Feedback dari Model Otomatis AI BRIDA -->
                    <div class="rounded-2xl p-5 bg-gradient-to-br from-indigo-50/80 to-purple-50/50 border border-indigo-100 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-indigo-900 font-bold text-sm">
                                <span class="w-7 h-7 rounded-lg bg-indigo-600 text-white flex items-center justify-center text-xs">
                                    AI
                                </span>
                                <span>Kutipan Telaah Otomatis Sistem AI BRIDA</span>
                            </div>
                            <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-800">
                                Prediksi Skor: {{ $inovasi['feedback']['ai']['skor_prediksi'] }}%
                            </span>
                        </div>
                        <p class="text-xs sm:text-sm text-indigo-950 font-medium leading-relaxed">
                            {{ $inovasi['feedback']['ai']['ringkasan'] }}
                        </p>
                        <ul class="space-y-1.5 pt-1 text-xs text-indigo-900/80">
                            @foreach ($inovasi['feedback']['ai']['catatan'] as $catatanAi)
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-indigo-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ $catatanAi }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Feedback dari Tim Evaluator BRIDA Manusia -->
                    <div class="rounded-2xl p-5 bg-gradient-to-br from-blue-50/80 to-slate-50/80 border border-blue-100 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-blue-900 font-bold text-sm">
                                <span class="w-7 h-7 rounded-lg bg-blue-700 text-white flex items-center justify-center text-xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </span>
                                <span>Catatan Resmi Tim Penilai BRIDA</span>
                            </div>
                            <span class="text-[11px] text-gray-500 font-medium">
                                {{ $inovasi['feedback']['evaluator']['tanggal'] }}
                            </span>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-800 leading-relaxed italic bg-white/70 p-3 rounded-xl border border-blue-100">
                            "{{ $inovasi['feedback']['evaluator']['catatan'] }}"
                        </p>
                        <div class="flex items-center justify-between text-xs text-gray-500 pt-1">
                            <span class="font-medium text-gray-700">{{ $inovasi['feedback']['evaluator']['nama'] }}</span>
                            @if ($inovasi['status_type'] === 'revisi')
                                <span class="text-rose-600 font-semibold">Tenggat Sanggahan: 30 Sep 2026</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <!-- TABEL HASIL PENILAIAN (21 INDIKATOR BRIDA) -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Tabel Hasil Penilaian (21 Indikator BRIDA)
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-500 mt-0.5">
                            Rincian keputusan nilai bintang yang didapat beserta rumus perhitungan skor akhir: <strong>Bintang × Bobot</strong>.
                        </p>
                    </div>

                    <!-- Ringkasan Nilai Skor Total -->
                    <div class="flex items-center gap-4 bg-gray-50 p-3.5 rounded-2xl border border-gray-200">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-gray-400">Total Skor Akhir</p>
                            <div class="flex items-baseline gap-1 mt-0.5">
                                <span class="text-2xl font-black {{ $persentaseSkor >= 85 ? 'text-emerald-600' : ($persentaseSkor >= 70 ? 'text-blue-600' : 'text-amber-600') }}">
                                    {{ $persentaseSkor }}
                                </span>
                                <span class="text-xs text-gray-400">/ 100</span>
                            </div>
                        </div>
                        <div class="h-8 w-px bg-gray-200"></div>
                        <div class="w-24">
                            <span class="text-[10px] text-gray-500 block mb-1">Kematangan</span>
                            <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                <div class="h-2 rounded-full {{ $persentaseSkor >= 85 ? 'bg-emerald-500' : ($persentaseSkor >= 70 ? 'bg-blue-600' : 'bg-amber-500') }}"
                                     style="width: {{ $persentaseSkor }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-xs sm:text-sm">
                        <thead class="bg-gray-50/80">
                            <tr>
                                <th class="px-5 py-3.5 font-bold text-gray-600 uppercase tracking-wider text-xs w-12">No</th>
                                <th class="px-5 py-3.5 font-bold text-gray-600 uppercase tracking-wider text-xs">Indikator BRIDA</th>
                                <th class="px-5 py-3.5 font-bold text-gray-600 uppercase tracking-wider text-xs text-center w-36">Nilai Bintang</th>
                                <th class="px-5 py-3.5 font-bold text-gray-600 uppercase tracking-wider text-xs text-center w-24">Bobot</th>
                                <th class="px-5 py-3.5 font-bold text-gray-600 uppercase tracking-wider text-xs text-center w-36">Perhitungan Skor</th>
                                <th class="px-5 py-3.5 font-bold text-gray-600 uppercase tracking-wider text-xs">Catatan Pertimbangan Evaluator</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @foreach ($indikatorDetail as $no => $item)
                                <tr class="transition-colors {{ $item['perlu_revisi'] ? 'bg-rose-50/60 hover:bg-rose-50' : 'hover:bg-gray-50/70' }}">
                                    <!-- No -->
                                    <td class="px-5 py-3.5 font-bold text-gray-700">
                                        {{ $no }}
                                    </td>

                                    <!-- Judul Indikator -->
                                    <td class="px-5 py-3.5">
                                        <div class="font-bold text-gray-900 leading-snug">
                                            {{ $item['judul'] }}
                                        </div>
                                        @if ($item['perlu_revisi'])
                                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-rose-700 mt-1">
                                                <svg class="w-3 h-3 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                </svg>
                                                Berkas Ditolak / Perlu Revisi
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Nilai Bintang -->
                                    <td class="px-5 py-3.5 text-center whitespace-nowrap">
                                        <div class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg {{ $item['bintang'] === 3 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : ($item['bintang'] === 2 ? 'bg-blue-50 text-blue-700 border border-blue-200' : 'bg-amber-50 text-amber-700 border border-amber-200') }}">
                                            <span class="text-amber-500 font-extrabold text-sm tracking-widest">
                                                @for ($s = 1; $s <= 3; $s++)
                                                    {{ $s <= $item['bintang'] ? '★' : '☆' }}
                                                @endfor
                                            </span>
                                            <span class="text-xs font-bold">({{ $item['bintang'] }})</span>
                                        </div>
                                    </td>

                                    <!-- Bobot -->
                                    <td class="px-5 py-3.5 text-center font-mono font-medium text-gray-700">
                                        {{ number_format($item['bobot'], 1) }}
                                    </td>

                                    <!-- Perhitungan Skor: (Bintang x Bobot) -->
                                    <td class="px-5 py-3.5 text-center whitespace-nowrap">
                                        <span class="font-mono text-xs text-gray-500">
                                            {{ $item['bintang'] }} × {{ number_format($item['bobot'], 1) }} =
                                        </span>
                                        <span class="font-mono font-bold text-gray-900 ml-1">
                                            {{ number_format($item['skor'], 1) }}
                                        </span>
                                    </td>

                                    <!-- Catatan Pertimbangan Evaluator -->
                                    <td class="px-5 py-3.5 text-xs text-gray-600 leading-relaxed">
                                        <span class="{{ $item['perlu_revisi'] ? 'text-rose-800 font-medium' : 'text-gray-600' }}">
                                            {{ $item['catatan'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Footer Tabel Aksi Sanggahan -->
                <div class="p-6 bg-gray-50/70 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="text-xs text-gray-500">
                        *Perhitungan skor otomatis mengikuti parameter indeks kematangan inovasi Kemendagri & BRIDA Kota Makassar.
                    </div>

                    <div class="flex items-center gap-3">
                        @if ($inovasi['status_type'] === 'revisi')
                            <!-- Tombol Perbaiki Berkas Aktif (Khusus Status Revisi) -->
                            <a href="{{ route('inovator.pengajuan.tahap5', ['revisi' => 1, 'inovasi_id' => $inovasi['id']]) }}"
                               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-sm text-white bg-amber-600 hover:bg-amber-700 shadow-md shadow-amber-500/20 transition-all duration-150">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span>Perbaiki Berkas (Revisi Indikator)</span>
                            </a>
                        @else
                            <!-- Tombol Perbaiki Berkas Dinonaktifkan dengan Penjelasan -->
                            <button type="button"
                                    disabled
                                    title="Perbaikan berkas hanya aktif apabila berkas dikembalikan dengan status revisi oleh BRIDA"
                                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold text-gray-400 bg-gray-100 border border-gray-200 cursor-not-allowed">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <span>Perbaiki Berkas (Terkunci)</span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- PANEL METADATA ADMINISTRATIF (RANGKUMAN TAHAP 1 - 4 READ-ONLY) -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8 space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Panel Metadata Administratif Inovasi (Tahap 1 - 4)
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-0.5">Rangkuman identitas pemohon, jadwal, deskripsi, dan pemetaan tujuan pembangunan berkelanjutan.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    
                    <!-- Kolom Kiri: Tahap 1 (PIC) & Tahap 2 (Metadata) -->
                    <div class="space-y-6">
                        
                        <!-- Tahap 1: Data PIC & Kategori -->
                        <div class="p-5 rounded-2xl bg-gray-50/70 border border-gray-200/80 space-y-3">
                            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-blue-700">
                                <span class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-[10px]">1</span>
                                <span>Kategori & Penanggung Jawab (PIC)</span>
                            </div>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs pt-1">
                                <div>
                                    <span class="text-gray-400 block">Kategori Inovasi</span>
                                    <span class="font-bold text-gray-900 text-sm mt-0.5 block">{{ $inovasi['kategori'] }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-400 block">Perangkat Daerah (OPD)</span>
                                    <span class="font-bold text-gray-900 text-sm mt-0.5 block">{{ $inovasi['opd'] }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-400 block">Nama Lengkap PIC</span>
                                    <span class="font-bold text-gray-800 mt-0.5 block">{{ $inovasi['pic']['nama'] }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-400 block">NIP PIC</span>
                                    <span class="font-mono text-gray-800 mt-0.5 block">{{ $inovasi['pic']['nip'] }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-400 block">Jabatan Kedinasan</span>
                                    <span class="text-gray-800 mt-0.5 block">{{ $inovasi['pic']['jabatan'] }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-400 block">Nomor Kontak WhatsApp</span>
                                    <span class="font-mono text-gray-800 mt-0.5 block">{{ $inovasi['pic']['kontak'] }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tahap 2: Metadata Jadwal -->
                        <div class="p-5 rounded-2xl bg-gray-50/70 border border-gray-200/80 space-y-3">
                            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-blue-700">
                                <span class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-[10px]">2</span>
                                <span>Metadata & Jadwal Penerapan</span>
                            </div>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs pt-1">
                                <div>
                                    <span class="text-gray-400 block">Waktu Uji Coba</span>
                                    <span class="font-bold text-gray-900 mt-0.5 block flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $inovasi['jadwal']['uji_coba'] }}
                                    </span>
                                </div>
                                <div>
                                    <span class="text-gray-400 block">Waktu Penerapan Resmi</span>
                                    <span class="font-bold text-emerald-700 mt-0.5 block flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $inovasi['jadwal']['implementasi'] }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Tahap 4: Pemetaan Target SDGs -->
                        <div class="p-5 rounded-2xl bg-gray-50/70 border border-gray-200/80 space-y-3">
                            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-blue-700">
                                <span class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-[10px]">4</span>
                                <span>Pemetaan Target SDGs / TPB</span>
                            </div>
                            
                            <div class="flex flex-wrap gap-2 pt-1">
                                @forelse ($inovasi['sdgs'] as $sdg)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold bg-white border border-gray-200 shadow-xs text-gray-800">
                                        <span class="w-5 h-5 rounded-md flex items-center justify-center text-[10px] font-bold text-white {{ $sdg['warna'] ?? 'bg-blue-600' }}">
                                            {{ $sdg['no'] }}
                                        </span>
                                        <span>SDG {{ $sdg['no'] }}: {{ $sdg['nama'] }}</span>
                                    </span>
                                @empty
                                    <span class="text-xs text-gray-400 italic">Belum dipetakan ke target SDGs</span>
                                @endforelse
                            </div>
                        </div>

                    </div>

                    <!-- Kolom Kanan: Tahap 3 (Deskripsi Inovasi Read-Only) -->
                    <div class="space-y-4">
                        <div class="p-5 rounded-2xl bg-gray-50/70 border border-gray-200/80 space-y-4">
                            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-blue-700">
                                <span class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-[10px]">3</span>
                                <span>Deskripsi & Substansi Inovasi</span>
                            </div>

                            <!-- Rancang Bangun -->
                            <div class="space-y-1">
                                <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wide">A. Rancang Bangun / Latar Belakang</h4>
                                <div class="p-3.5 rounded-xl bg-white border border-gray-200 text-xs sm:text-sm text-gray-700 leading-relaxed prose prose-sm max-w-none">
                                    {!! $inovasi['deskripsi']['rancang_bangun'] !!}
                                </div>
                            </div>

                            <!-- Tujuan Inovasi -->
                            <div class="space-y-1">
                                <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wide">B. Tujuan Inovasi</h4>
                                <div class="p-3.5 rounded-xl bg-white border border-gray-200 text-xs sm:text-sm text-gray-700 leading-relaxed prose prose-sm max-w-none">
                                    {!! $inovasi['deskripsi']['tujuan'] !!}
                                </div>
                            </div>

                            <!-- Manfaat Inovasi -->
                            <div class="space-y-1">
                                <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wide">C. Manfaat yang Diperoleh</h4>
                                <div class="p-3.5 rounded-xl bg-white border border-gray-200 text-xs sm:text-sm text-gray-700 leading-relaxed prose prose-sm max-w-none">
                                    {!! $inovasi['deskripsi']['manfaat'] !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
