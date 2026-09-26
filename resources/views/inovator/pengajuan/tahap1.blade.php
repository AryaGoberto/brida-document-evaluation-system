<x-app-layout>
    <div class="py-8 bg-gray-50/70 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Progress Bar & Wizard Header -->
            @include('inovator.pengajuan.partials.wizard-header', ['currentStep' => 1])

            <!-- Form Card Tahap 1 -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-6 sm:p-8 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-extrabold text-lg">
                            1
                        </span>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Tahap 1: Kategori Inovasi & Data PIC</h2>
                            <p class="text-sm text-gray-500 mt-0.5">Tentukan klasifikasi inovasi daerah dan data kontak penanggung jawab teknis.</p>
                        </div>
                    </div>
                </div>

                <form id="wizard-form" method="POST" action="{{ route('inovator.pengajuan.simpanTahap1') }}" class="p-6 sm:p-8 space-y-8">
                    @csrf

                    <!-- Bagian A: Kategori Inovasi -->
                    <div class="space-y-4">
                        <div class="border-b border-gray-100 pb-3">
                            <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                A. Klasifikasi Kategori Inovasi
                            </h3>
                            <p class="text-xs text-gray-500 mt-0.5">Pilih kategori utama yang paling merepresentasikan fokus penerapan inovasi Anda.</p>
                        </div>

                        <div>
                            <x-input-label for="kategori" value="Kategori Inovasi Daerah *" class="font-bold text-gray-800" />
                            <select id="kategori"
                                    name="kategori"
                                    required
                                    class="mt-2 block w-full rounded-xl border-gray-300 shadow-xs focus:border-blue-500 focus:ring-blue-500 text-sm">
                                <option value="" disabled {{ empty($draft['kategori']) ? 'selected' : '' }}>-- Pilih Kategori Inovasi --</option>
                                @foreach ($kategoriList as $kategori)
                                    <option value="{{ $kategori }}" {{ ($draft['kategori'] ?? '') === $kategori ? 'selected' : '' }}>
                                        {{ $kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                            <p class="text-xs text-gray-400 mt-1.5">
                                Kategori ini akan menentukan bobot parameter dan indikator evaluasi kesesuaian dari Kemendagri & BRIDA.
                            </p>
                        </div>
                    </div>

                    <!-- Bagian B: Data Penanggung Jawab (PIC) -->
                    <div class="space-y-4 pt-4">
                        <div class="border-b border-gray-100 pb-3">
                            <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                B. Data Penanggung Jawab Teknis (Person in Charge / PIC)
                            </h3>
                            <p class="text-xs text-gray-500 mt-0.5">Petugas atau pejabat teknis yang dapat dihubungi oleh Tim Evaluator BRIDA.</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Nama PIC -->
                            <div>
                                <x-input-label for="nama_pic" value="Nama Lengkap PIC *" class="font-bold text-gray-800" />
                                <x-text-input id="nama_pic"
                                              name="nama_pic"
                                              type="text"
                                              class="mt-2 block w-full rounded-xl"
                                              :value="old('nama_pic', $draft['nama_pic'] ?? '')"
                                              placeholder="Contoh: Dr. H. Ahmad Sudirman, S.STP., M.Si"
                                              required />
                                <x-input-error :messages="$errors->get('nama_pic')" class="mt-2" />
                            </div>

                            <!-- NIP PIC -->
                            <div>
                                <x-input-label for="nip_pic" value="Nomor Induk Pegawai (NIP) *" class="font-bold text-gray-800" />
                                <x-text-input id="nip_pic"
                                              name="nip_pic"
                                              type="text"
                                              class="mt-2 block w-full rounded-xl"
                                              :value="old('nip_pic', $draft['nip_pic'] ?? '')"
                                              placeholder="18 digit NIP tanpa spasi"
                                              required />
                                <x-input-error :messages="$errors->get('nip_pic')" class="mt-2" />
                            </div>

                            <!-- Jabatan PIC -->
                            <div>
                                <x-input-label for="jabatan_pic" value="Jabatan Kedinasan *" class="font-bold text-gray-800" />
                                <x-text-input id="jabatan_pic"
                                              name="jabatan_pic"
                                              type="text"
                                              class="mt-2 block w-full rounded-xl"
                                              :value="old('jabatan_pic', $draft['jabatan_pic'] ?? '')"
                                              placeholder="Contoh: Kepala Bidang Aplikasi & Informatika"
                                              required />
                                <x-input-error :messages="$errors->get('jabatan_pic')" class="mt-2" />
                            </div>

                            <!-- Nomor Kontak -->
                            <div>
                                <x-input-label for="kontak_pic" value="Nomor Kontak WhatsApp / HP *" class="font-bold text-gray-800" />
                                <x-text-input id="kontak_pic"
                                              name="kontak_pic"
                                              type="text"
                                              class="mt-2 block w-full rounded-xl"
                                              :value="old('kontak_pic', $draft['kontak_pic'] ?? '')"
                                              placeholder="Contoh: 081234567890"
                                              required />
                                <x-input-error :messages="$errors->get('kontak_pic')" class="mt-2" />
                                <p class="text-[11px] text-gray-400 mt-1">Digunakan untuk konfirmasi jadwal klarifikasi & validasi lapangan.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Action Buttons -->
                    <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <button type="submit"
                                name="action"
                                value="draft"
                                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 shadow-xs transition-colors order-2 sm:order-1">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                            </svg>
                            <span>Simpan Sebagai Draft</span>
                        </button>

                        <button type="submit"
                                name="action"
                                value="next"
                                class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-blue-700 hover:bg-blue-800 shadow-md shadow-blue-500/20 hover:shadow-lg transition-all duration-150 order-1 sm:order-2">
                            <span>Lanjut ke Tahap 2: Metadata Inovasi</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
