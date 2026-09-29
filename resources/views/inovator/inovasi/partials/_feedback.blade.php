<!-- PANEL UMPAN BALIK (FEEDBACK EVALUATOR & AI) -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8 space-y-6">
    <div class="flex items-center justify-between border-b border-gray-100 pb-4">
        <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
            Panel Umpan Balik & Evaluasi (BRIDA & AI)
        </h3>
        <span class="text-xs text-gray-500 font-medium">Diperbarui: {{ $inovasi['tanggal_evaluasi'] }}</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Feedback dari Model Otomatis AI BRIDA -->
        <div class="rounded-2xl p-5 bg-gradient-to-br from-indigo-50/80 to-purple-50/50 border border-indigo-100 space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2 text-indigo-900 font-bold text-sm">
                    <span class="w-7 h-7 rounded-lg bg-indigo-600 text-white flex items-center justify-center text-xs">
                        AI
                    </span>
                    <span>Kutipan Telaah Otomatis Sistem AI BRIDA</span>
                </div>
                <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-800">
                    Prediksi Skor: {{ $inovasi['feedback']['ai']['skor_prediksi'] }}%
                </span>
            </div>
            <p class="text-xs sm:text-sm text-indigo-950 font-medium leading-relaxed">
                {{ $inovasi['feedback']['ai']['ringkasan'] }}
            </p>
            <ul class="space-y-1.5 pt-1 text-xs text-indigo-900/80">
                @foreach ($inovasi['feedback']['ai']['catatan'] as $catatanAi)
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-indigo-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $catatanAi }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Feedback dari Tim Evaluator BRIDA Manusia -->
        <div class="rounded-2xl p-5 bg-gradient-to-br from-blue-50/80 to-slate-50/80 border border-blue-100 space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2 text-blue-900 font-bold text-sm">
                    <span class="w-7 h-7 rounded-lg bg-blue-700 text-white flex items-center justify-center text-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </span>
                    <span>Catatan Resmi Tim Penilai BRIDA</span>
                </div>
                <span class="text-[11px] text-gray-500 font-medium">
                    {{ $inovasi['feedback']['evaluator']['tanggal'] }}
                </span>
            </div>
            <p class="text-xs sm:text-sm text-gray-800 leading-relaxed italic bg-white/70 p-3 rounded-xl border border-blue-100">
                "{{ $inovasi['feedback']['evaluator']['catatan'] }}"
            </p>
            <div class="flex items-center justify-between text-xs text-gray-500 pt-1">
                <span class="font-medium text-gray-700">{{ $inovasi['feedback']['evaluator']['nama'] }}</span>
                @if ($inovasi['status_type'] === 'revisi')
                    <span class="text-rose-600 font-semibold">Tenggat Sanggahan: 30 Sep 2026</span>
                @endif
            </div>
        </div>

    </div>
</div>
