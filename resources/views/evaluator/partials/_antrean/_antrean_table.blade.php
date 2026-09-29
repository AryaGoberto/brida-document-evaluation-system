<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-[11px] font-bold uppercase tracking-wider border-b border-gray-200">
                    <th class="py-4 px-5">Nama Dinas (OPD)</th>
                    <th class="py-4 px-5">Judul Inovasi Daerah</th>
                    <th class="py-4 px-4 whitespace-nowrap">Tanggal Masuk</th>
                    <th class="py-4 px-4 text-center whitespace-nowrap">Status Sistem</th>
                    <th class="py-4 px-4 text-center whitespace-nowrap">Estimasi Skor AI</th>
                    <th class="py-4 px-5 text-right whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @foreach ($antreanList as $item)
                <tr class="hover:bg-blue-50/40 transition-colors group" x-show="(filterStatus === 'all' || '{{ $item['status_code'] }}' === filterStatus) && (filterOpd === 'all' || '{{ $item['opd'] }}' === filterOpd) && (filterPeriode === 'all' || '{{ $item['periode'] }}' === filterPeriode) && (search === '' || '{{ strtolower($item['judul']) }}'.includes(search.toLowerCase()) || '{{ strtolower($item['opd']) }}'.includes(search.toLowerCase()) || '{{ strtolower($item['kode']) }}'.includes(search.toLowerCase()))">
                    <td class="py-4 px-5 align-top">
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center flex-shrink-0 font-bold text-xs group-hover:bg-blue-600 group-hover:text-white transition-colors duration-200 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div>
                                <span class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors block">{{ $item['opd'] }}</span>
                                <span class="text-xs font-mono font-semibold text-gray-400 mt-0.5 inline-block">{{ $item['kode'] }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-5 align-top">
                        <a href="{{ route('evaluator.verifikasi.show', $item['id']) }}" class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2">
                            {{ $item['judul'] }}
                        </a>
                        <div class="flex flex-wrap items-center gap-2 mt-1.5">
                            <span class="inline-block px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-700">
                                {{ $item['kategori'] }}
                            </span>
                            @if (!empty($item['catatan_ai']))
                                <span class="text-[11px] text-gray-400 line-clamp-1 italic max-w-xs" title="{{ $item['catatan_ai'] }}">
                                    Catatan: {{ $item['catatan_ai'] }}
                                </span>
                            @endif
                        </div>
                    </td>
                    <td class="py-4 px-4 align-top whitespace-nowrap text-xs text-gray-600">
                        <div class="flex items-center gap-1.5 font-medium">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>{{ $item['tanggal_masuk'] }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 align-top text-center whitespace-nowrap">
                        @if ($item['status_code'] === 'butuh_validasi')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200">
                                <span class="w-2 h-2 rounded-full bg-blue-600"></span> Butuh Validasi
                            </span>
                        @elseif ($item['status_code'] === 'menunggu_ocr')
                            <div class="inline-flex flex-col items-center gap-1">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200">
                                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span> Menunggu OCR
                                </span>
                                <div class="w-24 bg-gray-200 rounded-full h-1.5 overflow-hidden">
                                    <div class="bg-amber-500 h-1.5 rounded-full" style="width: {{ $item['progress_ocr'] }}%"></div>
                                </div>
                            </div>
                        @elseif ($item['status_code'] === 'ai_selesai')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-indigo-100 text-indigo-800 border border-indigo-200">
                                <span class="w-2 h-2 rounded-full bg-indigo-600"></span> AI Selesai
                            </span>
                        @elseif ($item['status_code'] === 'selesai')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Selesai Validasi
                            </span>
                        @elseif ($item['status_code'] === 'perlu_revisi')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-800 border border-rose-200">
                                <span class="w-2 h-2 rounded-full bg-rose-600"></span> Perlu Revisi
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-4 align-top text-center whitespace-nowrap">
                        @if ($item['ai_score'])
                            <div class="inline-flex flex-col items-center">
                                <div class="flex items-baseline gap-1">
                                    <span class="text-base font-black {{ $item['ai_score'] >= 85 ? 'text-emerald-600' : ($item['ai_score'] >= 75 ? 'text-blue-600' : 'text-amber-600') }}">
                                        {{ $item['ai_score'] }}
                                    </span>
                                    <span class="text-[11px] text-gray-400">/ 100</span>
                                </div>
                                <span class="text-[11px] font-semibold text-gray-600">{{ $item['ai_predikat'] }}</span>
                            </div>
                        @else
                            <div class="inline-flex items-center gap-1.5 text-xs text-gray-400 font-medium">
                                <svg class="w-3.5 h-3.5 animate-spin text-amber-500" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                                <span>{{ $item['ai_predikat'] }}</span>
                            </div>
                        @endif
                    </td>
                    <td class="py-4 px-5 align-top text-right whitespace-nowrap">
                        @if ($item['bisa_diverifikasi'])
                            <a href="{{ route('evaluator.verifikasi.show', $item['id']) }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold shadow-sm shadow-blue-600/20 transition-all duration-150 transform hover:-translate-y-0.5 active:translate-y-0">
                                <span>Mulai Verifikasi</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        @else
                            <button disabled title="Menunggu pemindaian teks OCR berkas selesai" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-gray-100 text-gray-400 text-xs font-semibold cursor-not-allowed border border-gray-200">
                                <svg class="w-3.5 h-3.5 text-amber-500 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                                <span>Proses OCR</span>
                            </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4 sm:p-5 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-xs text-gray-500">
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            <span>Total <strong>143 Inovasi</strong> terdaftar dari seluruh OPD Pemerintah Kota Makassar</span>
        </div>
        <div class="flex items-center gap-4 text-xs font-medium text-gray-600">
            <span>Menampilkan 15 pengajuan antrean terkini</span>
        </div>
    </div>
</div>