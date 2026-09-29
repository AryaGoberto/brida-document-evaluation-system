<!-- TABEL RIWAYAT FINAL (REKAM JEJAK INOVASI TERVERIFIKASI) -->
<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-[11px] font-bold uppercase tracking-wider border-b border-gray-200">
                    <th class="py-4 px-5">Inovasi & Perangkat Daerah</th>
                    <th class="py-4 px-4 whitespace-nowrap">Tanggal Sidang & Nomor BA</th>
                    <th class="py-4 px-4 whitespace-nowrap">Ketua Verifikator</th>
                    <th class="py-4 px-4 text-center whitespace-nowrap">Skor Total Final (Maks. 111)</th>
                    <th class="py-4 px-4 text-center whitespace-nowrap">Status Kelulusan</th>
                    <th class="py-4 px-5 text-right whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse ($riwayatList as $item)
                    <tr 
                        class="hover:bg-blue-50/30 transition-colors group"
                        x-show="(filterStatus === 'all' || '{{ $item['status_kelulusan'] }}' === filterStatus) &&
                                (search === '' || 
                                 '{{ strtolower($item['judul']) }}'.includes(search.toLowerCase()) || 
                                 '{{ strtolower($item['opd']) }}'.includes(search.toLowerCase()) ||
                                 '{{ strtolower($item['nomor_ba']) }}'.includes(search.toLowerCase()) ||
                                 '{{ strtolower($item['kode']) }}'.includes(search.toLowerCase()))"
                    >
                        <!-- Inovasi & OPD -->
                        <td class="py-4 px-5 align-top">
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center flex-shrink-0 font-bold text-xs group-hover:bg-blue-600 group-hover:text-white transition-colors duration-200 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <a href="{{ route('evaluator.riwayat.show', $item['id']) }}" class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-1">
                                        {{ $item['judul'] }}
                                    </a>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs text-gray-500 font-medium">{{ $item['opd'] }}</span>
                                        <span class="text-gray-300">•</span>
                                        <span class="text-[11px] font-mono font-semibold text-gray-400">{{ $item['kode'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Tanggal Sidang & Nomor BA -->
                        <td class="py-4 px-4 align-top whitespace-nowrap text-xs text-gray-600">
                            <div class="font-medium text-gray-900 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $item['tanggal_sidang'] }}
                            </div>
                            <span class="text-[11px] font-mono text-gray-400 block mt-1">
                                {{ $item['nomor_ba'] }}
                            </span>
                        </td>

                        <!-- Ketua Verifikator -->
                        <td class="py-4 px-4 align-top whitespace-nowrap text-xs">
                            <p class="font-semibold text-gray-900">{{ $item['evaluator_ketua'] }}</p>
                            <p class="text-[10px] text-gray-400 font-mono">NIP. {{ $item['evaluator_nip'] }}</p>
                        </td>

                        <!-- Skor Total Final (Maksimal 111) -->
                        <td class="py-4 px-4 align-top text-center whitespace-nowrap">
                            <div class="inline-flex flex-col items-center">
                                <div class="flex items-baseline gap-1">
                                    <span class="text-lg font-black {{ $item['skor_final'] >= 88 ? 'text-emerald-700' : ($item['skor_final'] >= 67 ? 'text-blue-700' : 'text-amber-700') }}">
                                        {{ number_format($item['skor_final'], 1) }}
                                    </span>
                                    <span class="text-[11px] font-bold text-gray-400">/ 111.0</span>
                                </div>
                                <span class="text-[11px] font-semibold text-gray-500">
                                    {{ $item['persentase'] }}% Kematangan
                                </span>
                            </div>
                        </td>

                        <!-- Status Kelulusan -->
                        <td class="py-4 px-4 align-top text-center whitespace-nowrap">
                            @if ($item['status_kelulusan'] === 'Sangat Inovatif')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Sangat Inovatif
                                </span>
                            @elseif ($item['status_kelulusan'] === 'Inovatif')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200">
                                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                                    Inovatif
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200">
                                    <span class="w-2 h-2 rounded-full bg-amber-600"></span>
                                    Perlu Perbaikan
                                </span>
                            @endif
                        </td>

                        <!-- Tombol Aksi (Detail Penilaian & Cetak BA) -->
                        <td class="py-4 px-5 align-top text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-2">
                                <!-- Detail Penilaian Akhir (Read-Only) -->
                                <a 
                                    href="{{ route('evaluator.riwayat.show', $item['id']) }}" 
                                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 text-xs font-bold shadow-2xs transition-all"
                                    title="Lihat Rincian 21 Indikator (Read-Only)"
                                >
                                    <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    <span>Detail</span>
                                </a>

                                <!-- Cetak Berita Acara -->
                                <a 
                                    href="{{ route('evaluator.riwayat.cetak', $item['id']) }}" 
                                    target="_blank"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold shadow-sm shadow-blue-600/20 transition-all"
                                    title="Cetak Berita Acara / Laporan PDF"
                                >
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                    </svg>
                                    <span>Cetak BA</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-10 h-10 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-sm font-semibold text-gray-700">Belum ada riwayat inovasi yang diselesaikan</p>
                                <p class="text-xs text-gray-400 mt-1">Inovasi yang telah selesai disidangkan dan disahkan akan muncul di sini.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Footer Summary Bar -->
    <div class="p-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between text-xs text-gray-500">
        <span class="flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            <span>Seluruh rekapitulasi penilaian telah disahkan melalui Berita Acara Pleno BRIDA</span>
        </span>
        <span class="text-gray-400 font-mono text-[11px]">Skor Maksimal Standar: 111 Poin</span>
    </div>
</div>
