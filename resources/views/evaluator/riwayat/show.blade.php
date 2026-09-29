<x-app-layout>
    <div class="py-8 bg-gray-50/70 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- BREADCRUMB & TOP ACTIONS -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 text-xs text-gray-500 font-medium mb-1">
                        <a href="{{ route('evaluator.dashboard') }}" class="hover:text-blue-600 transition-colors">Dasbor Evaluator</a>
                        <span>/</span>
                        <a href="{{ route('evaluator.riwayat') }}" class="hover:text-blue-600 transition-colors">Riwayat & Perekapan</a>
                        <span>/</span>
                        <span class="text-gray-900 font-semibold">{{ $inovasi['kode'] }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <h1 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight">
                            Detail Penilaian Akhir
                        </h1>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-slate-800 border border-slate-300 text-xs font-bold">
                            <svg class="w-3.5 h-3.5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Mode Read-Only (Terkunci)
                        </span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <a 
                        href="{{ route('evaluator.riwayat') }}" 
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 text-xs font-bold shadow-2xs transition-all"
                    >
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span>Kembali ke Riwayat</span>
                    </a>

                    <a 
                        href="{{ route('evaluator.riwayat.cetak', $inovasi['id']) }}" 
                        target="_blank"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold shadow-md shadow-blue-600/20 transition-all duration-150 transform hover:-translate-y-0.5 active:translate-y-0"
                    >
                        <svg class="w-4 h-4 text-blue-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                        <span>Cetak Berita Acara (PDF)</span>
                    </a>
                </div>
            </div>

            <!-- LOCK NOTICE BANNER -->
            <div class="bg-gradient-to-r from-slate-900 to-indigo-950 rounded-2xl p-4 sm:p-5 text-white shadow-md flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 text-amber-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm font-bold flex items-center gap-2">
                            <span>Status: Verifikasi Sidang Pleno Telah Selesai & Terkunci</span>
                            <span class="text-[11px] font-mono font-medium px-2 py-0.5 rounded bg-white/15 text-blue-200">
                                {{ $inovasi['nomor_ba'] }}
                            </span>
                        </div>
                        <p class="text-xs text-slate-300 mt-0.5">
                            Seluruh 21 indikator telah disahkan oleh tim verifikator BRIDA. Formulir ini bersifat arsip tetap (read-only) untuk menjamin integritas data penilaian daerah.
                        </p>
                    </div>
                </div>
                <div class="text-xs text-slate-300 sm:text-right whitespace-nowrap">
                    <span class="block text-[11px] text-slate-400">Tanggal Pengesahan Sidang:</span>
                    <span class="font-bold text-white">{{ $inovasi['tanggal_sidang'] }}</span>
                </div>
            </div>

            <!-- METADATA & RINGKASAN SKOR FINAL -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Informasi Administratif Inovasi (2 Kolom) -->
                <div class="lg:col-span-2 bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 space-y-6">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-200">
                                {{ $inovasi['kode'] }}
                            </span>
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700">
                                {{ $inovasi['kategori'] }}
                            </span>
                        </div>
                        <h2 class="text-xl sm:text-2xl font-black text-gray-900 mt-3 leading-snug">
                            {{ $inovasi['judul'] }}
                        </h2>
                        <p class="text-sm font-medium text-gray-600 mt-1 flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            {{ $inovasi['opd'] }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-gray-100 text-xs">
                        <div class="space-y-1">
                            <span class="text-gray-400 font-medium">Ketua Tim Verifikator:</span>
                            <p class="font-bold text-gray-900 text-sm">{{ $inovasi['evaluator_ketua'] }}</p>
                            <p class="text-gray-500 font-mono text-[11px]">NIP. {{ $inovasi['evaluator_nip'] }}</p>
                        </div>
                        <div class="space-y-1">
                            <span class="text-gray-400 font-medium">Anggota Tim Verifikator:</span>
                            <p class="font-bold text-gray-900 text-sm">{{ $inovasi['evaluator_anggota'] }}</p>
                            <p class="text-gray-500 text-[11px]">Badan Riset dan Inovasi Daerah (BRIDA)</p>
                        </div>
                    </div>

                    <!-- Rekomendasi Tim Evaluator -->
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <span class="text-xs font-bold text-slate-700 uppercase tracking-wider block mb-1">
                            Catatan & Rekomendasi Resmi Sidang Evaluasi:
                        </span>
                        <p class="text-xs sm:text-sm text-slate-700 leading-relaxed italic">
                            "{{ $inovasi['rekomendasi'] }}"
                        </p>
                    </div>
                </div>

                <!-- Kartu Skor Final & Kelulusan (1 Kolom) -->
                <div class="bg-gradient-to-br from-white to-blue-50/50 rounded-3xl border border-blue-200 shadow-sm p-6 flex flex-col justify-between space-y-6">
                    <div>
                        <span class="text-xs font-bold text-blue-900 uppercase tracking-wider block">
                            Skor Total Final (Maks. 111)
                        </span>
                        <div class="mt-3 flex items-baseline gap-2">
                            <span class="text-5xl font-black tracking-tight {{ $inovasi['skor_final'] >= 88 ? 'text-emerald-700' : ($inovasi['skor_final'] >= 67 ? 'text-blue-700' : 'text-amber-700') }}">
                                {{ number_format($inovasi['skor_final'], 1) }}
                            </span>
                            <span class="text-lg font-bold text-gray-400">/ 111.0</span>
                        </div>
                        <div class="mt-2 text-xs font-semibold text-gray-600">
                            Tingkat Kematangan: <span class="font-bold text-gray-900">{{ $inovasi['persentase'] }}%</span>
                        </div>

                        <!-- Progress Bar Kematangan -->
                        <div class="w-full bg-gray-200 h-2.5 rounded-full mt-3 overflow-hidden">
                            <div 
                                class="h-full rounded-full transition-all duration-500 {{ $inovasi['skor_final'] >= 88 ? 'bg-emerald-500' : ($inovasi['skor_final'] >= 67 ? 'bg-blue-600' : 'bg-amber-500') }}"
                                style="width: {{ min(100, $inovasi['persentase']) }}%"
                            ></div>
                        </div>
                    </div>

                    <!-- Predikat Kelulusan -->
                    <div class="p-4 rounded-2xl bg-white border border-gray-200 shadow-xs">
                        <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider block">
                            Status Kelulusan Daerah
                        </span>
                        <div class="mt-2 flex items-center gap-2">
                            @if ($inovasi['status_kelulusan'] === 'Sangat Inovatif')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-sm font-black bg-emerald-100 text-emerald-800 border border-emerald-300">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Sangat Inovatif
                                </span>
                            @elseif ($inovasi['status_kelulusan'] === 'Inovatif')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-sm font-black bg-blue-100 text-blue-800 border border-blue-300">
                                    <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                                    Inovatif
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-sm font-black bg-amber-100 text-amber-800 border border-amber-300">
                                    <span class="w-2.5 h-2.5 rounded-full bg-amber-600"></span>
                                    Memerlukan Perbaikan
                                </span>
                            @endif
                        </div>
                        <p class="text-[11px] text-gray-500 mt-2">
                            Standar penilaian sesuai Pedoman Indeks Inovasi Daerah (IID) Kemendagri & BRIDA Makassar.
                        </p>
                    </div>
                </div>

            </div>

            <!-- TABEL RINCIAN 21 INDIKATOR READ-ONLY -->
            <div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden">
                <div class="p-5 sm:p-6 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <h3 class="text-lg font-black text-gray-900">
                            Rincian Penilaian 21 Indikator
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Rincian bobot, capaian bintang, dan kalkulasi poin final per indikator satuan.
                        </p>
                    </div>
                    <div class="flex items-center gap-2 text-xs font-semibold text-gray-600 bg-gray-50 px-3 py-1.5 rounded-xl border border-gray-200">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Total Akumulasi: <strong class="text-gray-900">{{ number_format($totalSkor, 1) }}</strong> / {{ number_format($totalMaks, 1) }} Poin</span>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/80 text-gray-500 text-[11px] font-bold uppercase tracking-wider border-b border-gray-200">
                                <th class="py-3.5 px-4 w-12 text-center">No</th>
                                <th class="py-3.5 px-4">Parameter Indikator</th>
                                <th class="py-3.5 px-4 text-center whitespace-nowrap">Bobot</th>
                                <th class="py-3.5 px-4 text-center whitespace-nowrap">Bintang Final</th>
                                <th class="py-3.5 px-4 text-center whitespace-nowrap">Nilai Poin (Bintang × Bobot)</th>
                                <th class="py-3.5 px-5">Catatan Validasi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-xs">
                            @foreach ($rincianIndikator as $item)
                                <tr class="hover:bg-gray-50/60 transition-colors">
                                    <!-- No -->
                                    <td class="py-3.5 px-4 text-center font-bold text-gray-500">
                                        {{ $item['no'] }}
                                    </td>

                                    <!-- Judul Indikator -->
                                    <td class="py-3.5 px-4 font-semibold text-gray-900">
                                        {{ $item['judul'] }}
                                    </td>

                                    <!-- Bobot -->
                                    <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-gray-100 text-gray-700 font-bold font-mono text-[11px]">
                                            {{ $item['bobot'] }}x
                                        </span>
                                    </td>

                                    <!-- Bintang Final -->
                                    <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                        <div class="inline-flex items-center gap-1 bg-amber-50 px-2.5 py-1 rounded-xl border border-amber-200/80">
                                            @for ($s = 1; $s <= 3; $s++)
                                                <svg class="w-4 h-4 {{ $s <= $item['bintang'] ? 'text-amber-400 fill-amber-400' : 'text-gray-300 fill-gray-200' }}" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @endfor
                                            <span class="text-xs font-black text-amber-800 ml-1">{{ $item['bintang'] }}</span>
                                        </div>
                                    </td>

                                    <!-- Nilai Poin -->
                                    <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                        <div class="inline-flex items-baseline gap-1">
                                            <span class="font-black text-gray-900 text-sm">
                                                {{ number_format($item['skor'], 1) }}
                                            </span>
                                            <span class="text-gray-400 font-medium text-[11px]">
                                                / {{ number_format($item['skor_maksimal'], 1) }}
                                            </span>
                                        </div>
                                    </td>

                                    <!-- Catatan Validasi -->
                                    <td class="py-3.5 px-5 text-gray-600 italic text-[11px] max-w-xs">
                                        {{ $item['catatan'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-100/80 font-bold text-gray-900 border-t-2 border-gray-300">
                                <td colspan="4" class="py-4 px-4 text-right uppercase tracking-wider text-xs">
                                    Total Akumulasi Nilai Final:
                                </td>
                                <td class="py-4 px-4 text-center whitespace-nowrap text-sm font-black text-blue-700">
                                    {{ number_format($totalSkor, 1) }} / {{ number_format($totalMaks, 1) }}
                                </td>
                                <td class="py-4 px-5 text-xs text-gray-600">
                                    Skor Maksimal 111.0 (21 Indikator)
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- BOTTOM FOOTER ACTIONS -->
            <div class="flex items-center justify-between pt-2">
                <a 
                    href="{{ route('evaluator.riwayat') }}" 
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-gray-600 hover:text-gray-900 transition-colors"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Kembali ke Rekap Riwayat</span>
                </a>

                <a 
                    href="{{ route('evaluator.riwayat.cetak', $inovasi['id']) }}" 
                    target="_blank"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold shadow-md transition-all"
                >
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    <span>Cetak Berita Acara Pleno</span>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
