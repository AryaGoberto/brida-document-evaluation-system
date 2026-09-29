<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-5 sm:p-6 space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-3.5">
        <div class="md:col-span-5 relative">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Pencarian Cepat</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" x-model="search" placeholder="Cari nama inovasi, dinas/OPD, atau kode registrasi..." class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all placeholder:text-gray-400">
            </div>
        </div>
        <div class="md:col-span-3">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Filter Perangkat Daerah (OPD)</label>
            <select x-model="filterOpd" class="w-full py-2.5 px-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-gray-700">
                <option value="all">Semua Perangkat Daerah (143 Dinas)</option>
                @foreach ($daftarOpd as $opd)
                    <option value="{{ $opd }}">{{ $opd }}</option>
                @endforeach
            </select>
        </div>
        <div class="md:col-span-2">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Status Sistem</label>
            <select x-model="filterStatus" class="w-full py-2.5 px-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-gray-700">
                <option value="all">Semua Status</option>
                <option value="butuh_validasi">Butuh Validasi</option>
                <option value="menunggu_ocr">Menunggu OCR</option>
                <option value="ai_selesai">AI Selesai</option>
                <option value="selesai">Selesai Validasi</option>
                <option value="perlu_revisi">Perlu Revisi</option>
            </select>
        </div>
        <div class="md:col-span-2">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Rentang Waktu</label>
            <select x-model="filterPeriode" class="w-full py-2.5 px-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-gray-700">
                <option value="all">Semua Waktu</option>
                <option value="hari_ini">Hari Ini</option>
                <option value="minggu_ini">7 Hari Terakhir</option>
                <option value="bulan_ini">Bulan Ini (Sep 2026)</option>
                <option value="triwulan">Triwulan III (Jul - Sep)</option>
            </select>
        </div>
    </div>
</div>