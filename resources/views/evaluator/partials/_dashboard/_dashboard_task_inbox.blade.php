<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="text-xl font-bold text-gray-900">Daftar Tugas Prioritas (Task Inbox)</h2>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                        {{ count($taskInbox) }} Berkas
                    </span>
                </div>
                <p class="text-xs sm:text-sm text-gray-500 mt-1">
                    Pengajuan inovasi terbaru yang telah selesai dinilai oleh AI dan siap diverifikasi oleh verifikator BRIDA.
                </p>
            </div>
            <div class="inline-flex p-1 rounded-xl bg-gray-100 text-xs font-semibold text-gray-600">
                <button @click="filterPriority = 'all'" :class="filterPriority === 'all' ? 'bg-white text-gray-900 shadow-sm' : 'hover:text-gray-900'" class="px-3 py-1.5 rounded-lg transition-all">
                    Semua
                </button>
                <button @click="filterPriority = 'Tinggi'" :class="filterPriority === 'Tinggi' ? 'bg-white text-rose-700 shadow-sm font-bold' : 'hover:text-gray-900'" class="px-3 py-1.5 rounded-lg transition-all">
                    Prioritas Tinggi
                </button>
                <button @click="filterPriority = 'Sedang'" :class="filterPriority === 'Sedang' ? 'bg-white text-amber-700 shadow-sm font-bold' : 'hover:text-gray-900'" class="px-3 py-1.5 rounded-lg transition-all">
                    Sedang
                </button>
            </div>
        </div>
        <div class="mt-5 relative">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" x-model="search" placeholder="Cari nama inovasi, perangkat daerah (OPD), atau kode registrasi..." class="w-full pl-10 pr-4 py-2.5 bg-gray-50/70 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all placeholder:text-gray-400">
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/70 text-gray-500 text-[11px] font-bold uppercase tracking-wider border-b border-gray-100">
                    <th class="py-3.5 px-5">Inovasi & Instansi</th>
                    <th class="py-3.5 px-4">Kategori & Waktu</th>
                    <th class="py-3.5 px-4 text-center">Hasil Analisis AI</th>
                    <th class="py-3.5 px-4 text-center">Prioritas</th>
                    <th class="py-3.5 px-5 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse ($taskInbox as $item)
                <tr class="hover:bg-blue-50/40 transition-colors group" x-show="(filterPriority === 'all' || '{{ $item['prioritas'] }}' === filterPriority) && (search === '' || '{{ strtolower($item['judul']) }}'.includes(search.toLowerCase()) || '{{ strtolower($item['opd']) }}'.includes(search.toLowerCase()) || '{{ strtolower($item['kode']) }}'.includes(search.toLowerCase()))">
                    <td class="py-4 px-5">
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center flex-shrink-0 font-extrabold text-xs group-hover:bg-blue-600 group-hover:text-white transition-colors duration-200">
                                {{ substr($item['kode'], -2) }}
                            </div>
                            <div>
                                <a href="{{ route('evaluator.verifikasi.show', $item['id']) }}" class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-1">
                                    {{ $item['judul'] }}
                                </a>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs font-medium text-gray-500">{{ $item['opd'] }}</span>
                                    <span class="text-gray-300">•</span>
                                    <span class="text-[11px] font-mono text-gray-400 font-semibold">{{ $item['kode'] }}</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <span class="inline-block px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-700">
                            {{ $item['kategori'] }}
                        </span>
                        <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $item['waktu_tunggu'] }}
                        </div>
                    </td>
                    <td class="py-4 px-4 text-center whitespace-nowrap">
                        <div class="inline-flex flex-col items-center">
                            <div class="flex items-center gap-1.5">
                                <span class="text-base font-black {{ $item['ai']['skor'] >= 85 ? 'text-emerald-600' : ($item['ai']['skor'] >= 75 ? 'text-blue-600' : 'text-amber-600') }}">
                                    {{ $item['ai']['skor'] }}
                                </span>
                                <span class="text-[11px] text-gray-400">/ 100</span>
                            </div>
                            <span class="inline-flex items-center gap-1 text-[11px] font-semibold px-2 py-0.5 rounded-full {{ $item['ai']['skor'] >= 85 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-blue-50 text-blue-700 border border-blue-200' }} mt-0.5">
                                <svg class="w-2.5 h-2.5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 011.341 1.342l-.8 1.598L18.677 11H20a1 1 0 110 2h-1.323l-1.582 3.954.8 1.599a1 1 0 01-1.342 1.341l-1.598-.8L11 20.677V22a1 1 0 11-2 0v-1.323l-3.954-1.582-1.599.8a1 1 0 011.342-1.341l1.598.8L1.323 13H0a1 1 0 110-2h1.323l1.582-3.954-.8-1.599a1 1 0 011.342-1.341l1.598.8L9 3.323V2a1 1 0 011-1z"></path></svg>
                                {{ $item['ai']['predikat'] }}
                            </span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-center whitespace-nowrap">
                        @if ($item['prioritas'] === 'Tinggi')
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-600"></span> Tinggi
                            </span>
                        @elseif ($item['prioritas'] === 'Sedang')
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span> Sedang
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-700">Normal</span>
                        @endif
                    </td>
                    <td class="py-4 px-5 text-right whitespace-nowrap">
                        <a href="{{ route('evaluator.verifikasi.show', $item['id']) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold shadow-sm shadow-blue-600/20 transition-all duration-150 transform hover:-translate-y-0.5 active:translate-y-0">
                            <span>Mulai Verifikasi</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-12 text-center text-gray-400">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <p class="font-semibold text-gray-600">Tidak ada pengajuan dalam antrean</p>
                        <p class="text-xs text-gray-400 mt-1">Semua dokumen inovasi telah selesai diverifikasi.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
        <span>Menampilkan {{ count($taskInbox) }} pengajuan prioritas siap telaah</span>
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
            <span class="font-medium text-gray-700">Sinkronisasi Otomatis AI Real-time</span>
        </div>
    </div>
</div>