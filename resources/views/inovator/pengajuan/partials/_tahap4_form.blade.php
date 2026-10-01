<!-- Form Card Tahap 4 -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden"
     x-data="{
        selectedSdgs: {{ json_encode($draft['sdgs'] ?? []) }},
        toggle(num) {
            const index = this.selectedSdgs.indexOf(num);
            if (index > -1) {
                this.selectedSdgs.splice(index, 1);
            } else {
                this.selectedSdgs.push(num);
            }
        },
        isSelected(num) {
            return this.selectedSdgs.includes(num);
        },
        selectAll() {
            this.selectedSdgs = Array.from({length: 17}, (_, i) => i + 1);
        },
        clearAll() {
            this.selectedSdgs = [];
        }
     }">
    <div class="p-6 sm:p-8 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-extrabold text-lg">
                    4
                </span>
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Tahap 4: Pemetaan Target SDGs</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Pilih satu atau lebih dari 17 Tujuan Pembangunan Berkelanjutan (TPB/SDGs).</p>
                </div>
            </div>

            <!-- Counter Terpilih & Helper Button -->
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    <span x-text="selectedSdgs.length"></span> dari 17 SDGs Dipilih
                </span>
                <button type="button" @click="clearAll()" class="text-xs text-gray-500 hover:text-rose-600 underline">
                    Reset
                </button>
            </div>
        </div>
    </div>

    <form id="wizard-form" method="POST" action="{{ route('inovator.pengajuan.simpanTahap4') }}" class="p-6 sm:p-8 space-y-6">
        @csrf

        <div class="p-4 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 text-blue-900 text-xs sm:text-sm flex items-start gap-3">
            <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            <p class="leading-relaxed">
                Pemetaan SDGs ini digunakan oleh Pemerintah Kota Makassar dan Bappeda untuk mengukur kontribusi langsung inovasi daerah terhadap pencapaian indikator global dan Rencana Aksi Daerah (RAD) TPB.
            </p>
        </div>

        <!-- Grid Visual 17 Checkboxes SDGs -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3.5">
            @foreach ($sdgsList as $sdg)
                <div @click="toggle({{ $sdg['no'] }})"
                     :class="isSelected({{ $sdg['no'] }}) ? 'border-blue-600 bg-blue-50/60 ring-2 ring-blue-500/20 shadow-sm' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/50'"
                     class="cursor-pointer p-4 rounded-xl border transition-all duration-150 relative flex items-start gap-3 select-none">
                    
                    <!-- Hidden Real Input Checkbox -->
                    <input type="checkbox"
                           name="sdgs[]"
                           value="{{ $sdg['no'] }}"
                           :checked="isSelected({{ $sdg['no'] }})"
                           class="hidden">

                    <!-- Custom Visual Checkbox -->
                    <div class="mt-0.5 flex-shrink-0 w-5 h-5 rounded-md flex items-center justify-center transition-colors border"
                         :class="isSelected({{ $sdg['no'] }}) ? 'bg-blue-600 border-blue-600 text-white' : 'border-gray-300 bg-white'">
                        <svg x-show="isSelected({{ $sdg['no'] }})" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>

                    <!-- SDG Icon Badge & Title -->
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-md font-extrabold text-[11px] text-white {{ $sdg['warna'] }}">
                                {{ $sdg['no'] }}
                            </span>
                            <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">
                                SDG #{{ $sdg['no'] }}
                            </span>
                        </div>
                        <h4 class="text-sm font-bold text-gray-900 leading-snug">
                            {{ $sdg['nama'] }}
                        </h4>
                        <p class="text-xs text-gray-500 italic mt-0.5">
                            {{ $sdg['en'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Footer Action Buttons -->
        <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('inovator.pengajuan.tahap3') }}"
                   class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:text-gray-900 bg-gray-100 hover:bg-gray-200 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Kembali ke Tahap 3</span>
                </a>

                <button type="submit"
                        name="action"
                        value="draft"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 shadow-xs transition-colors">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                    </svg>
                    <span>Simpan Draft</span>
                </button>
            </div>

            <button type="submit"
                    name="action"
                    value="next"
                    class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-blue-700 hover:bg-blue-800 shadow-md shadow-blue-500/20 hover:shadow-lg transition-all duration-150">
                <span>Lanjut ke Tahap 5: Unggah Bukti Indikator</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>
        </div>

    </form>
</div>
