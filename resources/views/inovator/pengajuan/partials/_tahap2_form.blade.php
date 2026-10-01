<!-- Form Card Tahap 2 -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="p-6 sm:p-8 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <span class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-extrabold text-lg">
                2
            </span>
            <div>
                <h2 class="text-xl font-bold text-gray-900">Tahap 2: Metadata Inovasi</h2>
                <p class="text-sm text-gray-500 mt-0.5">Lengkapi judul resmi inovasi, jadwal uji coba, dan perangkat daerah pengusul.</p>
            </div>
        </div>
    </div>

    <form id="wizard-form" method="POST" action="{{ route('inovator.pengajuan.simpanTahap2') }}" class="p-6 sm:p-8 space-y-8">
        @csrf

        <!-- Judul Inovasi Daerah -->
        <div>
            <x-input-label for="judul_inovasi" value="Judul Inovasi Daerah *" class="font-bold text-gray-800 text-base" />
            <p class="text-xs text-gray-500 mt-0.5 mb-2">Gunakan nama yang ringkas, mudah diingat, dan mencerminkan esensi terobosan (maksimal 255 karakter).</p>
            <x-text-input id="judul_inovasi"
                          name="judul_inovasi"
                          type="text"
                          class="block w-full rounded-xl text-base py-3"
                          :value="old('judul_inovasi', $draft['judul_inovasi'] ?? '')"
                          placeholder="Contoh: Sistem Antrean Puskesmas Digital (SAPA Sehat Kota Makassar)"
                          required />
            <x-input-error :messages="$errors->get('judul_inovasi')" class="mt-2" />
        </div>

        <!-- Perangkat Daerah Pengusul (Read-only / Terisi Otomatis) -->
        <div class="p-5 rounded-2xl bg-blue-50/50 border border-blue-100/80">
            <div class="flex items-start gap-3">
                <div class="w-9 h-9 rounded-xl bg-blue-600 text-white flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 19V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div class="w-full">
                    <div class="flex items-center justify-between">
                        <x-input-label for="nama_opd" value="Nama Perangkat Daerah / OPD Pengusul *" class="font-bold text-gray-900" />
                        <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-blue-700 bg-blue-100/70 px-2 py-0.5 rounded-full">
                            <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                            Otomatis dari Akun Login
                        </span>
                    </div>
                    <p class="text-xs text-gray-500 mt-0.5 mb-2">Instansi pengusul terkunci berdasarkan profil dinas akun yang sedang aktif.</p>
                    <x-text-input id="nama_opd"
                                  name="nama_opd"
                                  type="text"
                                  class="block w-full rounded-xl bg-white/80 border-blue-200 text-gray-700 font-semibold cursor-not-allowed"
                                  :value="old('nama_opd', $draft['nama_opd'] ?? 'Dinas Komunikasi dan Informatika Kota Makassar')"
                                  readonly
                                  required />
                    <x-input-error :messages="$errors->get('nama_opd')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- Pemilih Tanggal (Date Pickers): Waktu Uji Coba & Waktu Implementasi -->
        <div class="space-y-4 pt-2">
            <div class="border-b border-gray-100 pb-3">
                <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Jadwal Pelaksanaan & Kematangan Inovasi
                </h3>
                <p class="text-xs text-gray-500 mt-0.5">Sesuai pedoman IID Kemendagri, inovasi harus telah diuji coba dan diterapkan.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Waktu Uji Coba Inovasi -->
                <div class="p-4 rounded-xl border border-gray-200 bg-white">
                    <x-input-label for="waktu_uji_coba" value="Waktu Awal Uji Coba Inovasi *" class="font-bold text-gray-800" />
                    <p class="text-xs text-gray-500 mt-0.5 mb-2">Tanggal saat purwarupa / sistem pertama kali diujicobakan.</p>
                    <input type="date"
                           id="waktu_uji_coba"
                           name="waktu_uji_coba"
                           value="{{ old('waktu_uji_coba', $draft['waktu_uji_coba'] ?? '') }}"
                           required
                           class="block w-full rounded-xl border-gray-300 shadow-xs focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5">
                    <x-input-error :messages="$errors->get('waktu_uji_coba')" class="mt-2" />
                </div>

                <!-- Waktu Implementasi Inovasi -->
                <div class="p-4 rounded-xl border border-gray-200 bg-white">
                    <x-input-label for="waktu_implementasi" value="Waktu Penerapan / Implementasi Resmi *" class="font-bold text-gray-800" />
                    <p class="text-xs text-gray-500 mt-0.5 mb-2">Tanggal peluncuran / peresmian layanan kepada publik.</p>
                    <input type="date"
                           id="waktu_implementasi"
                           name="waktu_implementasi"
                           value="{{ old('waktu_implementasi', $draft['waktu_implementasi'] ?? '') }}"
                           required
                           class="block w-full rounded-xl border-gray-300 shadow-xs focus:border-blue-500 focus:ring-blue-500 text-sm py-2.5">
                    <x-input-error :messages="$errors->get('waktu_implementasi')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- Footer Action Buttons -->
        <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('inovator.pengajuan.tahap1') }}"
                   class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:text-gray-900 bg-gray-100 hover:bg-gray-200 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Kembali ke Tahap 1</span>
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
