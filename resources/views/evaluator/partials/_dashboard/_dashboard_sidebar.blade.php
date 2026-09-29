<div class="bg-gradient-to-br from-indigo-900 to-blue-900 rounded-3xl p-6 text-white shadow-lg">
    <div class="flex items-center gap-3 mb-4">
        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-amber-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        </div>
        <div>
            <h3 class="font-bold text-base text-white">Standar 21 Indikator BRIDA</h3>
            <p class="text-xs text-blue-200">Peraturan Kemendagri & Walikota Makassar</p>
        </div>
    </div>
    <p class="text-xs text-slate-300 leading-relaxed mb-4">
        Penetapan nilai bintang (1–3) verifikator mengalikan bobot resmi (1.0 s.d 4.0). Skor kelulusan rekomendasi IGA adalah minimal <strong>80.0 poin</strong>.
    </p>
    <div class="space-y-2 text-xs">
        <div class="flex justify-between items-center py-1.5 border-b border-white/10">
            <span class="text-slate-300">Regulasi & Legalitas (No 1)</span>
            <span class="font-bold text-amber-300">Bobot 3.0</span>
        </div>
        <div class="flex justify-between items-center py-1.5 border-b border-white/10">
            <span class="text-slate-300">Replikasi & Kemanfaatan (No 14 & 16)</span>
            <span class="font-bold text-amber-300">Bobot 3.0</span>
        </div>
        <div class="flex justify-between items-center py-1.5 border-b border-white/10">
            <span class="text-slate-300">Kualitas Inovasi Daerah (No 21)</span>
            <span class="font-bold text-amber-300">Bobot 4.0</span>
        </div>
    </div>
</div>

<div class="bg-white rounded-3xl p-6 border border-gray-200/80 shadow-sm">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-bold text-gray-900 text-sm flex items-center gap-2">
            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Log Aktivitas Verifikasi
        </h3>
        <span class="text-[11px] text-gray-400">Hari ini</span>
    </div>
    <div class="space-y-4">
        @foreach ($recentActivities as $act)
        <div class="flex items-start gap-3 text-xs">
            <div class="w-7 h-7 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 {{ $act['tipe'] === 'approve' ? 'bg-emerald-100 text-emerald-600' : ($act['tipe'] === 'revision' ? 'bg-rose-100 text-rose-600' : 'bg-blue-100 text-blue-600') }}">
                @if ($act['tipe'] === 'approve')
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                @elseif ($act['tipe'] === 'revision')
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                @else
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                @endif
            </div>
            <div class="flex-1">
                <p class="text-gray-900 font-semibold">{{ $act['evaluator'] }}</p>
                <p class="text-gray-600 mt-0.5">
                    {{ $act['aksi'] }}: <span class="font-medium text-gray-900">{{ $act['inovasi'] }}</span>
                </p>
                <div class="flex items-center gap-2 mt-1 text-[11px] text-gray-400">
                    <span>{{ $act['waktu'] }}</span> <span>•</span> <span class="font-bold text-gray-700">Skor: {{ $act['skor'] }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-3xl p-5 border border-amber-200">
    <div class="flex items-start gap-3">
        <div class="w-8 h-8 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <div>
            <h4 class="font-bold text-xs text-amber-900">Agenda Sidang Pleno BRIDA</h4>
            <p class="text-[11px] text-amber-800 mt-1 leading-relaxed">
                Sidang pleno penetapan skor inovasi tahap 2 dijadwalkan pada hari <strong>Jumat pukul 09:00 WITA</strong>. Pastikan verifikasi berkas prioritas selesai sebelum pleno.
            </p>
        </div>
    </div>
</div>