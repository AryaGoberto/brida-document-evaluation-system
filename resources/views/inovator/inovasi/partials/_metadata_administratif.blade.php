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
