<!-- ============================================================ -->
<!-- PANEL KIRI (PDF VIEWER INTERAKTIF DENGAN FITUR LENGKAP) -->
<!-- ============================================================ -->
<section class="lg:w-1/2 flex flex-col bg-slate-800 text-white border-r border-slate-700 h-full overflow-hidden">
    
    <!-- Toolbar PDF Viewer -->
    <div class="bg-slate-900 border-b border-slate-700 px-4 py-2.5 flex items-center justify-between text-xs gap-3 flex-shrink-0 z-20">
        
        <!-- File Info & Indikator Aktif -->
        <div class="flex items-center gap-2 min-w-0">
            <span class="w-6 h-6 rounded bg-rose-500 text-white font-bold text-[10px] flex items-center justify-center flex-shrink-0 shadow-xs">
                PDF
            </span>
            <div class="min-w-0">
                <p class="font-bold text-slate-200 truncate text-[11px]" x-text="getActive().filename"></p>
                <p class="text-[10px] text-slate-400">
                    Indikator <span x-text="activeNo"></span> • <span x-text="getActive().filesize"></span>
                </p>
            </div>
        </div>

        <!-- PDF Controls: Mode Switch, Page Navigation & Zoom & Search -->
        <div class="flex items-center gap-1.5 flex-shrink-0">
            
            <!-- View Mode Switcher: PDF Asli vs Kutipan AI -->
            <div class="flex items-center bg-slate-800 rounded-lg p-0.5 border border-slate-700 text-[10px] font-bold">
                <button 
                    type="button"
                    @click="viewMode = 'pdf'" 
                    :class="viewMode === 'pdf' ? 'bg-blue-600 text-white shadow-xs' : 'text-slate-400 hover:text-white'"
                    class="px-2 py-1 rounded transition"
                    title="Tampilkan Dokumen PDF Asli"
                >
                    PDF Asli
                </button>
                <button 
                    type="button"
                    @click="viewMode = 'ocr'" 
                    :class="viewMode === 'ocr' ? 'bg-blue-600 text-white shadow-xs' : 'text-slate-400 hover:text-white'"
                    class="px-2 py-1 rounded transition"
                    title="Tampilkan Ekstraksi Kutipan AI"
                >
                    Kutipan AI
                </button>
            </div>

            <!-- Tombol Buka Tab Baru -->
            <template x-if="getActive().has_real_file && getActive().file_url">
                <a :href="getActive().file_url" target="_blank" 
                   class="px-2 py-1 rounded-lg bg-slate-800 hover:bg-slate-700 text-blue-400 hover:text-blue-300 border border-slate-700 font-bold text-[10px] flex items-center gap-1 transition" 
                   title="Buka File PDF di Tab Baru">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    <span class="hidden sm:inline">Buka Tab</span>
                </a>
            </template>

            <!-- Navigasi Halaman (untuk Mode OCR / Simulasi) -->
            <div x-show="viewMode === 'ocr' || !getActive().has_real_file" class="flex items-center bg-slate-800 rounded-lg border border-slate-700 px-2 py-1 gap-1.5 text-[11px]">
                <button 
                    @click="if (pdfPage > 1) pdfPage--" 
                    :disabled="pdfPage <= 1"
                    class="p-0.5 hover:text-blue-400 disabled:opacity-30 disabled:hover:text-inherit"
                    title="Halaman Sebelumnya"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <span class="font-mono text-slate-300">
                    <span class="font-bold text-white" x-text="pdfPage"></span>/<span x-text="totalPages"></span>
                </span>
                <button 
                    @click="if (pdfPage < totalPages) pdfPage++" 
                    :disabled="pdfPage >= totalPages"
                    class="p-0.5 hover:text-blue-400 disabled:opacity-30 disabled:hover:text-inherit"
                    title="Halaman Selanjutnya"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <!-- Zoom Controls (untuk Mode OCR / Simulasi) -->
            <div x-show="viewMode === 'ocr' || !getActive().has_real_file" class="flex items-center bg-slate-800 rounded-lg border border-slate-700 px-1 py-1 gap-1 text-[11px]">
                <button 
                    @click="if (zoomLevel > 60) zoomLevel -= 15" 
                    class="px-1.5 py-0.5 hover:text-blue-400 font-bold"
                    title="Zoom Out"
                >
                    -
                </button>
                <span class="font-mono text-slate-300 text-[10px] w-9 text-center" x-text="zoomLevel + '%'"></span>
                <button 
                    @click="if (zoomLevel < 180) zoomLevel += 15" 
                    class="px-1.5 py-0.5 hover:text-blue-400 font-bold"
                    title="Zoom In"
                >
                    +
                </button>
            </div>

            <!-- Highlight Evidence Toggle -->
            <button 
                x-show="viewMode === 'ocr' || !getActive().has_real_file"
                @click="highlightActive = !highlightActive" 
                :class="highlightActive ? 'bg-amber-500/20 text-amber-300 border-amber-500/40' : 'bg-slate-800 text-slate-400 border-slate-700'"
                class="px-2 py-1 rounded-lg border text-[10px] font-bold flex items-center gap-1 transition-all"
                title="Sorot Kutipan Bukti AI"
            >
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 011.341 1.342l-.8 1.598L18.677 11H20a1 1 0 110 2h-1.323l-1.582 3.954.8 1.599a1 1 0 01-1.342 1.341l-1.598-.8L11 20.677V22a1 1 0 11-2 0v-1.323l-3.954-1.582-1.599.8a1 1 0 01-1.341-1.342l.8-1.598L1.323 13H0a1 1 0 110-2h1.323l1.582-3.954-.8-1.599a1 1 0 011.342-1.341l1.598.8L9 3.323V2a1 1 0 011-1z"></path>
                </svg>
                <span class="hidden sm:inline">Bukti AI</span>
            </button>

        </div>
    </div>

    <!-- Interactive Document Canvas Viewer (High Fidelity PDF Rendering) -->
    <div class="flex-1 bg-slate-900/90 overflow-auto p-3 sm:p-5 flex flex-col justify-start items-center custom-scrollbar">
        
        <!-- 1. TAMPILAN ASLI DOKUMEN PDF (NATIVE VIEWER VIA IFRAME) -->
        <div x-show="viewMode === 'pdf' && getActive().has_real_file && getActive().file_url" 
             class="w-full h-full flex flex-col flex-1 min-h-[700px] rounded-xl overflow-hidden shadow-2xl border border-slate-700 bg-slate-950">
            <iframe 
                :src="getActive().file_url" 
                class="w-full flex-1 min-h-[700px] border-0"
                type="application/pdf">
            </iframe>
        </div>

        <!-- 2. TAMPILAN KUTIPAN OCR & SIMULASI KERTAS (JIKA MODE OCR ATAU BELUM ADA FILE ASLI) -->
        <div 
            x-show="viewMode === 'ocr' || !getActive().has_real_file"
            class="bg-white text-gray-900 shadow-2xl rounded-sm p-8 sm:p-12 w-full max-w-2xl min-h-[750px] transition-transform duration-200 origin-top flex flex-col justify-between"
            :style="`transform: scale(${zoomLevel / 100});`"
        >
            
            <!-- Header Surat Resmi (Kop Dokumen Walikota Makassar) -->
            <div>
                <div class="border-b-2 border-black pb-4 mb-6 text-center">
                    <div class="flex items-center justify-center gap-4 mb-2">
                        <img src="/images/brida.png" alt="BRIDA Logo" class="w-14 h-14 object-contain">
                        <div class="text-center">
                            <p class="text-xs font-bold uppercase tracking-wider text-gray-600">Pemerintah Kota Makassar</p>
                            <h2 class="text-base font-black uppercase tracking-tight text-gray-900">
                                <span x-text="getActive().no === 1 ? 'Sekretariat Daerah Kota Makassar' : 'Dinas Kesehatan Kota Makassar'"></span>
                            </h2>
                            <p class="text-[10px] text-gray-500 font-serif italic">
                                Jalan Ahmad Yani No. 2, Baru, Kec. Ujung Pandang, Kota Makassar, Sulawesi Selatan 90111
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Judul Keputusan / Dokumen Resmi -->
                <div class="text-center my-6">
                    <p class="text-xs font-bold uppercase tracking-widest text-gray-700">Salinan Dokumen Bukti Dukung</p>
                    <p class="text-sm font-black text-gray-900 uppercase underline mt-0.5" x-text="getActive().judul"></p>
                    <p class="text-[11px] font-mono text-gray-500 mt-1">
                        Nomor: 800 / <span x-text="100 + getActive().no"></span> / KEP / DINKES / 2026
                    </p>
                </div>

                <!-- Isi Naskah & Bukti Indikator -->
                <div class="space-y-4 text-xs leading-relaxed text-gray-800 text-justify font-serif">
                    
                    <p class="indent-6">
                        Menindaklanjuti ketentuan Pedoman Teknis Indeks Inovasi Daerah (IGA) Kemendagri serta Peraturan Walikota Makassar perihal pemenuhan standar 21 indikator kematangan inovasi daerah Kota Makassar.
                    </p>

                    <div class="space-y-1">
                        <p class="font-bold font-sans text-gray-900 uppercase text-[11px]">MEMUTUSKAN & MENETAPKAN:</p>
                        <p class="indent-6">
                            Bahwa inovasi dengan judul <strong>{{ $inovasi['judul'] }}</strong> telah memenuhi seluruh bukti administrasi operasional sesuai dengan parameter indikator nomor <span x-text="getActive().no"></span> (<span x-text="getActive().judul"></span>).
                        </p>
                    </div>

                    <!-- HIGHLIGHT KUTIPAN KLAIM BUKTI AI -->
                    <div 
                        class="my-4 p-4 rounded-xl transition-all duration-300 relative border"
                        :class="highlightActive ? 'bg-amber-50/90 border-amber-300 ring-2 ring-amber-400/50 shadow-md' : 'bg-gray-50 border-gray-200'"
                    >
                        <div class="flex items-center justify-between mb-1.5">
                            <span class="inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider text-amber-800 bg-amber-200/60 px-2 py-0.5 rounded">
                                <svg class="w-3 h-3 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 011.341 1.342l-.8 1.598L18.677 11H20a1 1 0 110 2h-1.323l-1.582 3.954.8 1.599a1 1 0 01-1.342 1.341l-1.598-.8L11 20.677V22a1 1 0 11-2 0v-1.323l-3.954-1.582-1.599.8a1 1 0 01-1.341-1.342l.8-1.598L1.323 13H0a1 1 0 110-2h1.323l1.582-3.954-.8-1.599a1 1 0 011.342-1.341l1.598.8L9 3.323V2a1 1 0 011-1z"></path>
                                </svg>
                                Kutipan Bukti AI (Halaman <span x-text="getActive().halaman"></span>)
                            </span>
                            <span class="text-[10px] text-amber-700 font-mono font-semibold">Tervalidasi OCR</span>
                        </div>
                        <p class="font-sans font-bold text-gray-900 text-xs leading-normal" x-text="getActive().kutipan"></p>
                    </div>

                    <p class="indent-6">
                        Segala pembiayaan dan tanggung jawab implementasi melekat pada Dokumen Pelaksanaan Anggaran (DPA) Perangkat Daerah bersangkutan sesuai aturan perundang-undangan yang berlaku.
                    </p>

                </div>
            </div>

            <!-- Footer Legalitas & Barcode TTE BSrE -->
            <div class="mt-12 pt-6 border-t border-gray-200 flex items-end justify-between text-xs">
                <div class="space-y-1">
                    <div class="w-16 h-16 border border-gray-300 p-1 rounded bg-gray-50 flex items-center justify-center">
                        <!-- QR Barcode Simulation -->
                        <div class="w-full h-full bg-slate-900 flex flex-col justify-between p-1 rounded">
                            <div class="flex justify-between"><div class="w-2.5 h-2.5 bg-white"></div><div class="w-2.5 h-2.5 bg-white"></div></div>
                            <div class="flex justify-center"><div class="w-2 h-2 bg-white"></div></div>
                            <div class="flex justify-between"><div class="w-2.5 h-2.5 bg-white"></div><div class="w-2.5 h-2.5 bg-white"></div></div>
                        </div>
                    </div>
                    <span class="text-[9px] font-mono text-gray-400 block">TTE BSrE Kemkominfo RI</span>
                </div>

                <div class="text-right space-y-1 font-serif">
                    <p class="text-[11px] text-gray-500">Ditetapkan di Makassar</p>
                    <p class="text-[11px] font-bold text-gray-800">KEPALA PERANGKAT DAERAH,</p>
                    <div class="h-10"></div>
                    <p class="text-xs font-bold text-gray-900 underline">{{ $inovasi['pic']['nama'] }}</p>
                    <p class="text-[10px] font-mono text-gray-500">NIP. {{ $inovasi['pic']['nip'] }}</p>
                </div>
            </div>

        </div>
    </div>

</section>
