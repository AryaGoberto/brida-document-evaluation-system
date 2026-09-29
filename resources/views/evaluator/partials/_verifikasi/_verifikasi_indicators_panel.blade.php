<!-- ============================================================ -->
<!-- PANEL KANAN (ACCORDION 21 INDIKATOR & FORMULIR KEPUTUSAN) -->
<!-- ============================================================ -->
<section class="lg:w-1/2 flex flex-col bg-white h-full overflow-hidden border-l border-gray-200">
    
    <!-- Header Panel Kanan: Judul & Filter Status Accordion -->
    <div class="p-4 sm:p-5 border-b border-gray-200 bg-gray-50/80 flex items-center justify-between flex-shrink-0">
        <div>
            <h2 class="text-sm font-bold text-gray-900 flex items-center gap-2">
                <span>Daftar 21 Indikator & Keputusan Validasi</span>
                <span class="text-[11px] font-bold px-2 py-0.5 rounded-full bg-blue-100 text-blue-800">
                    21 Parameter
                </span>
            </h2>
            <p class="text-xs text-gray-500 mt-0.5">
                Klik indikator untuk beralih dokumen otomatis di panel kiri, telaah bukti AI, lalu setujui atau koreksi skor.
            </p>
        </div>
    </div>

    <!-- Scrollable Accordion List (21 Indikator) -->
    <div class="flex-1 overflow-y-auto p-4 sm:p-5 space-y-3 custom-scrollbar">
        <template x-for="(item, key) in indicators" :key="key">
            <div 
                class="rounded-2xl border transition-all duration-200 overflow-hidden"
                :class="activeNo === item.no 
                    ? 'border-blue-500 ring-2 ring-blue-100 bg-white shadow-md' 
                    : 'border-gray-200 bg-white hover:border-gray-300'"
            >
                
                <!-- Accordion Header Bar (Clickable) -->
                <div 
                    @click="selectIndikator(item.no)"
                    class="p-4 flex items-center justify-between gap-3 cursor-pointer select-none transition-colors"
                    :class="activeNo === item.no ? 'bg-blue-50/40' : 'hover:bg-gray-50/80'"
                >
                    <div class="flex items-center gap-3 min-w-0">
                        <!-- Nomor Indikator -->
                        <span 
                            class="w-7 h-7 rounded-xl flex items-center justify-center font-extrabold text-xs flex-shrink-0 transition-colors"
                            :class="activeNo === item.no ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                            x-text="item.no"
                        ></span>

                        <!-- Judul & Bobot -->
                        <div class="min-w-0">
                            <p class="font-bold text-xs sm:text-sm text-gray-900 truncate" x-text="item.judul"></p>
                            <div class="flex items-center gap-2 mt-0.5 text-[11px] text-gray-500">
                                <span>Bobot: <strong class="text-gray-800" x-text="item.bobot"></strong></span>
                                <span>•</span>
                                <span class="truncate text-gray-400" x-text="item.filename"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Status Badge & Bintang -->
                    <div class="flex items-center gap-2.5 flex-shrink-0">
                        <!-- Stars Pill -->
                        <div class="flex items-center gap-1 bg-amber-50 border border-amber-200 px-2 py-1 rounded-lg">
                            <span class="text-amber-500 text-xs">⭐</span>
                            <span class="font-black text-xs text-amber-800" x-text="(item.final_bintang || item.ai_bintang) + ' Bintang'"></span>
                        </div>

                        <!-- Status Keputusan -->
                        <template x-if="item.verifikasi_status === 'approved'">
                            <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">
                                Disetujui
                            </span>
                        </template>
                        <template x-if="item.verifikasi_status === 'corrected'">
                            <span class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 border border-amber-200">
                                Dikoreksi
                            </span>
                        </template>
                        <template x-if="item.verifikasi_status === 'pending'">
                            <span class="inline-flex items-center gap-1 text-[10px] font-medium px-2 py-0.5 rounded-full bg-gray-100 text-gray-600">
                                Menunggu
                            </span>
                        </template>

                        <!-- Chevron Icon -->
                        <svg 
                            class="w-4 h-4 text-gray-400 transition-transform duration-200"
                            :class="activeNo === item.no ? 'rotate-180 text-blue-600' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7 7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Accordion Body Detail (Terbuka saat indikator aktif) -->
                <div 
                    x-show="activeNo === item.no" 
                    x-collapse
                    class="p-4 sm:p-5 border-t border-gray-100 space-y-4 bg-white"
                >
                    <!-- Kotak Klaim Bukti AI (Evidence Analysis) -->
                    <div class="bg-indigo-50/60 rounded-2xl p-4 border border-indigo-100 space-y-2">
                        <div class="flex items-center justify-between text-xs">
                            <div class="flex items-center gap-1.5 font-bold text-indigo-900">
                                <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 011.341 1.342l-.8 1.598L18.677 11H20a1 1 0 110 2h-1.323l-1.582 3.954.8 1.599a1 1 0 01-1.342 1.341l-1.598-.8L11 20.677V22a1 1 0 11-2 0v-1.323l-3.954-1.582-1.599.8a1 1 0 01-1.341-1.342l.8-1.598L1.323 13H0a1 1 0 110-2h1.323l1.582-3.954-.8-1.599a1 1 0 011.342-1.341l1.598.8L9 3.323V2a1 1 0 011-1z"></path>
                                </svg>
                                <span>Hasil Telaah Model AI:</span>
                                <span class="text-indigo-700 bg-white px-2 py-0.5 rounded text-[11px] font-black border border-indigo-200">
                                    Skor AI: <span x-text="item.ai_bintang"></span> Bintang
                                </span>
                            </div>

                            <!-- Kalkulasi Poin (Bintang x Bobot) -->
                            <div class="text-[11px] font-bold text-indigo-700">
                                Poin: <span class="text-sm font-black text-indigo-900" x-text="(item.ai_bintang * item.bobot).toFixed(1)"></span> / <span x-text="(3 * item.bobot).toFixed(1)"></span>
                            </div>
                        </div>

                        <!-- Uraian Kutipan Bukti (LLM Evidence) -->
                        <p class="text-xs text-indigo-950 leading-relaxed font-medium" x-text="item.evidence"></p>
                        
                        <div class="pt-1 flex items-center justify-between">
                            <button 
                                type="button"
                                @click="highlightActive = true; pdfPage = item.halaman || 1;"
                                class="inline-flex items-center gap-1 text-[11px] font-bold text-indigo-700 hover:text-indigo-900 underline"
                            >
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span>Lihat Bukti di Dokumen (Halaman <span x-text="item.halaman"></span>)</span>
                            </button>
                            <span class="text-[10px] text-indigo-400">Tingkat Keyakinan: 98.2%</span>
                        </div>
                    </div>

                    <!-- Form Koreksi Manual (Muncul saat [Koreksi Manual] diklik) -->
                    <div 
                        x-show="item.is_correcting" 
                        x-transition
                        class="p-4 rounded-2xl bg-amber-50 border border-amber-200 space-y-3"
                    >
                        <div class="flex items-center justify-between">
                            <h4 class="text-xs font-bold text-amber-900 uppercase tracking-wider flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Formulir Koreksi Manual Evaluator
                            </h4>
                            <span class="text-[10px] text-amber-700 font-semibold">*Wajib beri alasan koreksi</span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <!-- Pilih Bintang Baru -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">Skor Bintang Hasil Verifikasi:</label>
                                <select 
                                    x-model="item.temp_bintang" 
                                    class="w-full text-xs font-semibold rounded-xl border-gray-300 focus:border-amber-500 focus:ring-amber-500 bg-white"
                                >
                                    <option value="3">⭐⭐⭐ 3 Bintang (Maksimal)</option>
                                    <option value="2">⭐⭐ 2 Bintang (Standar)</option>
                                    <option value="1">⭐ 1 Bintang (Minimal / Kurang Lengkap)</option>
                                </select>
                            </div>

                            <!-- Hitungan Poin Hasil Koreksi -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-700 mb-1">Poin Final Setelah Koreksi:</label>
                                <div class="p-2 bg-white rounded-xl border border-gray-200 text-xs font-black text-gray-900 flex items-center justify-between">
                                    <span>Poin Baru:</span>
                                    <span class="text-amber-800" x-text="(item.temp_bintang * item.bobot).toFixed(1) + ' Poin'"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Catatan Evaluator (Wajib) -->
                        <div>
                            <label class="block text-[11px] font-bold text-gray-700 mb-1">
                                Catatan Evaluator (Alasan Koreksi):
                            </label>
                            <textarea 
                                x-model="item.temp_catatan"
                                rows="2"
                                placeholder="Contoh: Skor diturunkan menjadi 1 Bintang karena dokumen SK tidak memiliki tanda tangan basah/barcode TTE Kepala Daerah..."
                                class="w-full text-xs rounded-xl border-gray-300 focus:border-amber-500 focus:ring-amber-500 bg-white"
                            ></textarea>
                        </div>

                        <div class="flex items-center justify-end gap-2 pt-1">
                            <button 
                                type="button" 
                                @click="batalKoreksi(item.no)"
                                class="px-3 py-1.5 rounded-lg border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 text-xs font-semibold"
                            >
                                Batal
                            </button>
                            <button 
                                type="button" 
                                @click="simpanKoreksi(item.no)"
                                class="px-3.5 py-1.5 rounded-lg bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold shadow-sm"
                            >
                                Simpan Koreksi
                            </button>
                        </div>
                    </div>

                    <!-- Riwayat Catatan Jika Sudah Dikoreksi / Disetujui -->
                    <template x-if="item.catatan_evaluator && !item.is_correcting">
                        <div class="p-3 rounded-xl bg-gray-50 border border-gray-200 text-xs space-y-1">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-500 block">Catatan Verifikator:</span>
                            <p class="text-gray-800 font-medium italic" x-text="item.catatan_evaluator"></p>
                        </div>
                    </template>

                    <!-- Tombol Aksi Validasi (Setujui Hasil AI / Koreksi Manual) -->
                    <div class="pt-2 flex flex-wrap items-center justify-between gap-3 border-t border-gray-100">
                        <span class="text-xs text-gray-500">
                            Status: 
                            <strong 
                                class="font-bold capitalize"
                                :class="item.verifikasi_status === 'approved' ? 'text-emerald-700' : (item.verifikasi_status === 'corrected' ? 'text-amber-700' : 'text-gray-500')"
                                x-text="item.verifikasi_status === 'approved' ? 'Terkunci Sesuai AI' : (item.verifikasi_status === 'corrected' ? 'Telah Dikoreksi Manual' : 'Belum Ditelaah')"
                            ></strong>
                        </span>

                        <div class="flex items-center gap-2">
                            <!-- Tombol Koreksi Manual -->
                            <button 
                                type="button"
                                @click="mulaiKoreksi(item.no)"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-gray-200 bg-white hover:bg-amber-50 hover:border-amber-300 text-gray-700 hover:text-amber-800 text-xs font-bold transition-all shadow-2xs"
                            >
                                <svg class="w-3.5 h-3.5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span>Koreksi Manual</span>
                            </button>

                            <!-- Tombol Setujui Hasil AI -->
                            <button 
                                type="button"
                                @click="setujuiAi(item.no)"
                                :class="item.verifikasi_status === 'approved' ? 'bg-emerald-700 text-white' : 'bg-emerald-600 hover:bg-emerald-700 text-white'"
                                class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-bold shadow-sm transition-all"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Setujui Hasil AI</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </template>
    </div>

    <!-- Footer Summary Bar Panel Kanan -->
    <div class="p-3.5 bg-gray-50 border-t border-gray-200 flex items-center justify-between text-xs text-gray-500 flex-shrink-0">
        <span class="flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            <span>Total 21 Indikator Siap Disahkan</span>
        </span>
        <button 
            type="button"
            @click="for(let k in indicators) { setujuiAi(k); }"
            class="text-[11px] font-bold text-blue-700 hover:text-blue-900 underline"
        >
            Setujui Semua Rekomendasi AI
        </button>
    </div>

</section>
