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
