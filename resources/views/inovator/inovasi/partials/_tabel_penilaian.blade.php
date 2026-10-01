<!-- TABEL HASIL PENILAIAN (19 INDIKATOR BRIDA) -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Tabel Hasil Penilaian (19 Indikator BRIDA)
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
