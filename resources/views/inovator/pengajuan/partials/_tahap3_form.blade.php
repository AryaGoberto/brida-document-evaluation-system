<!-- Form Card Tahap 3 -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="p-6 sm:p-8 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <span class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-extrabold text-lg">
                3
            </span>
            <div>
                <h2 class="text-xl font-bold text-gray-900">Tahap 3: Deskripsi & Substansi Inovasi</h2>
                <p class="text-sm text-gray-500 mt-0.5">Uraikan rancang bangun, tujuan, dan manfaat inovasi menggunakan editor teks berformat.</p>
            </div>
        </div>
    </div>

    <form id="wizard-form" method="POST" action="{{ route('inovator.pengajuan.simpanTahap3') }}" class="p-6 sm:p-8 space-y-8">
        @csrf

        <!-- 1. Rich Text Editor: Rancang Bangun / Latar Belakang -->
        <div x-data="richEditor('rancang_bangun_input', {{ json_encode(old('rancang_bangun', $draft['rancang_bangun'] ?? '')) }})" class="space-y-2">
            <div class="flex items-center justify-between">
                <label class="block font-bold text-gray-800 text-base">
                    1. Rancang Bangun & Latar Belakang Inovasi *
                </label>
                <span class="text-xs text-blue-600 bg-blue-50 px-2 py-0.5 rounded-md font-medium border border-blue-200">
                    Minimal 300 Kata untuk Skor Maksimal AI
                </span>
            </div>
            <p class="text-xs text-gray-500">
                Jelaskan dasar permasalahan yang dihadapi, kondisi sebelum adanya inovasi, ide kebaruan yang diusulkan, serta alur teknis penerapannya.
            </p>

            <!-- Toolbar -->
            <div class="rounded-2xl border border-gray-300 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500/20 overflow-hidden shadow-xs">
                <div class="flex flex-wrap items-center gap-1 p-2 bg-gray-50 border-b border-gray-200 text-gray-700">
                    <button type="button" @click="format('bold')" title="Tebal (Bold)"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 font-bold text-sm w-8 h-8 flex items-center justify-center">
                        B
                    </button>
                    <button type="button" @click="format('italic')" title="Miring (Italic)"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 italic text-sm w-8 h-8 flex items-center justify-center">
                        I
                    </button>
                    <button type="button" @click="format('underline')" title="Garis Bawah (Underline)"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 underline text-sm w-8 h-8 flex items-center justify-center">
                        U
                    </button>
                    <span class="w-px h-5 bg-gray-300 mx-1"></span>
                    <button type="button" @click="format('insertUnorderedList')" title="Bullet Points"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 text-sm flex items-center justify-center gap-1 px-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16M2 6h.01M2 12h.01M2 18h.01"></path>
                        </svg>
                        <span class="text-xs">Bullets</span>
                    </button>
                    <button type="button" @click="format('insertOrderedList')" title="Numbered List"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 text-sm flex items-center justify-center gap-1 px-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 6h13M7 12h13M7 18h13M3 6h.01M3 12h.01M3 18h.01"></path>
                        </svg>
                        <span class="text-xs">Nomor</span>
                    </button>
                </div>
                <!-- Editable Content Area -->
                <div x-ref="editor"
                     contenteditable="true"
                     @input="updateContent"
                     class="p-4 min-h-[160px] max-h-[300px] overflow-y-auto focus:outline-none text-sm text-gray-800 leading-relaxed bg-white prose prose-sm max-w-none">
                </div>
            </div>
            <input type="hidden" name="rancang_bangun" id="rancang_bangun_input" :value="content" required>
            <x-input-error :messages="$errors->get('rancang_bangun')" class="mt-2" />
        </div>

        <!-- 2. Rich Text Editor: Tujuan Inovasi -->
        <div x-data="richEditor('tujuan_inovasi_input', {{ json_encode(old('tujuan_inovasi', $draft['tujuan_inovasi'] ?? '')) }})" class="space-y-2 pt-2">
            <label class="block font-bold text-gray-800 text-base">
                2. Tujuan Inovasi Daerah *
            </label>
            <p class="text-xs text-gray-500">
                Uraikan sasaran spesifik, terukur, dan dampak target yang ingin dicapai melalui penerapan inovasi ini.
            </p>

            <!-- Toolbar -->
            <div class="rounded-2xl border border-gray-300 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500/20 overflow-hidden shadow-xs">
                <div class="flex flex-wrap items-center gap-1 p-2 bg-gray-50 border-b border-gray-200 text-gray-700">
                    <button type="button" @click="format('bold')" title="Tebal (Bold)"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 font-bold text-sm w-8 h-8 flex items-center justify-center">
                        B
                    </button>
                    <button type="button" @click="format('italic')" title="Miring (Italic)"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 italic text-sm w-8 h-8 flex items-center justify-center">
                        I
                    </button>
                    <button type="button" @click="format('underline')" title="Garis Bawah (Underline)"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 underline text-sm w-8 h-8 flex items-center justify-center">
                        U
                    </button>
                    <span class="w-px h-5 bg-gray-300 mx-1"></span>
                    <button type="button" @click="format('insertUnorderedList')" title="Bullet Points"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 text-sm flex items-center justify-center gap-1 px-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16M2 6h.01M2 12h.01M2 18h.01"></path>
                        </svg>
                        <span class="text-xs">Bullets</span>
                    </button>
                    <button type="button" @click="format('insertOrderedList')" title="Numbered List"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 text-sm flex items-center justify-center gap-1 px-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 6h13M7 12h13M7 18h13M3 6h.01M3 12h.01M3 18h.01"></path>
                        </svg>
                        <span class="text-xs">Nomor</span>
                    </button>
                </div>
                <!-- Editable Content Area -->
                <div x-ref="editor"
                     contenteditable="true"
                     @input="updateContent"
                     class="p-4 min-h-[120px] max-h-[250px] overflow-y-auto focus:outline-none text-sm text-gray-800 leading-relaxed bg-white prose prose-sm max-w-none">
                </div>
            </div>
            <input type="hidden" name="tujuan_inovasi" id="tujuan_inovasi_input" :value="content" required>
            <x-input-error :messages="$errors->get('tujuan_inovasi')" class="mt-2" />
        </div>

        <!-- 3. Rich Text Editor: Manfaat yang Diperoleh -->
        <div x-data="richEditor('manfaat_inovasi_input', {{ json_encode(old('manfaat_inovasi', $draft['manfaat_inovasi'] ?? '')) }})" class="space-y-2 pt-2">
            <label class="block font-bold text-gray-800 text-base">
                3. Manfaat yang Diperoleh *
            </label>
            <p class="text-xs text-gray-500">
                Jelaskan nilai tambah nyata baik bagi penerima layanan masyarakat maupun bagi efektivitas internal pemerintah daerah.
            </p>

            <!-- Toolbar -->
            <div class="rounded-2xl border border-gray-300 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500/20 overflow-hidden shadow-xs">
                <div class="flex flex-wrap items-center gap-1 p-2 bg-gray-50 border-b border-gray-200 text-gray-700">
                    <button type="button" @click="format('bold')" title="Tebal (Bold)"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 font-bold text-sm w-8 h-8 flex items-center justify-center">
                        B
                    </button>
                    <button type="button" @click="format('italic')" title="Miring (Italic)"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 italic text-sm w-8 h-8 flex items-center justify-center">
                        I
                    </button>
                    <button type="button" @click="format('underline')" title="Garis Bawah (Underline)"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 underline text-sm w-8 h-8 flex items-center justify-center">
                        U
                    </button>
                    <span class="w-px h-5 bg-gray-300 mx-1"></span>
                    <button type="button" @click="format('insertUnorderedList')" title="Bullet Points"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 text-sm flex items-center justify-center gap-1 px-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16M2 6h.01M2 12h.01M2 18h.01"></path>
                        </svg>
                        <span class="text-xs">Bullets</span>
                    </button>
                    <button type="button" @click="format('insertOrderedList')" title="Numbered List"
                            class="p-1.5 rounded hover:bg-gray-200 text-gray-700 text-sm flex items-center justify-center gap-1 px-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 6h13M7 12h13M7 18h13M3 6h.01M3 12h.01M3 18h.01"></path>
                        </svg>
                        <span class="text-xs">Nomor</span>
                    </button>
                </div>
                <!-- Editable Content Area -->
                <div x-ref="editor"
                     contenteditable="true"
                     @input="updateContent"
                     class="p-4 min-h-[120px] max-h-[250px] overflow-y-auto focus:outline-none text-sm text-gray-800 leading-relaxed bg-white prose prose-sm max-w-none">
                </div>
            </div>
            <input type="hidden" name="manfaat_inovasi" id="manfaat_inovasi_input" :value="content" required>
            <x-input-error :messages="$errors->get('manfaat_inovasi')" class="mt-2" />
        </div>

        <!-- Footer Action Buttons -->
        <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('inovator.pengajuan.tahap2') }}"
                   class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:text-gray-900 bg-gray-100 hover:bg-gray-200 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Kembali ke Tahap 2</span>
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
                <span>Lanjut ke Tahap 4: Pemetaan SDGs</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>
        </div>

    </form>
</div>
