<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="flex items-center space-x-2 text-xs font-semibold text-blue-700 uppercase tracking-wider mb-1">
                    <a href="{{ route('inovator.dashboard') }}" class="hover:underline flex items-center gap-1 text-gray-500 hover:text-blue-600">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Dasbor Inovator
                    </a>
                    <span>/</span>
                    <span>Profil & Pengaturan</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
                    Profil & Pengaturan Akun
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola data instansi untuk keperluan kop cetak laporan evaluasi dan perbarui kata sandi akun Anda.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    Akun Inovator BRIDA Terverifikasi
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50/70 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- BAGIAN 1: DETAIL INFORMASI INSTANSI DASAR (UNTUK CETAK LAPORAN OTOMATIS) -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden"
                 x-data="{
                    namaInstansi: {{ json_encode(old('nama_instansi', $user->nama_instansi ?? 'Dinas Komunikasi dan Informatika Kota Makassar')) }},
                    alamatKantor: {{ json_encode(old('alamat_kantor', $user->alamat_kantor ?? 'Jl. Teduh Bersinar No. 1, Balai Kota Makassar, Sulawesi Selatan 90111')) }},
                    emailDinas: {{ json_encode(old('email_dinas', $user->email_dinas ?? 'diskominfo@makassarkota.go.id')) }},
                    teleponKantor: {{ json_encode(old('telepon_kantor', $user->telepon_kantor ?? '(0411) 3612345')) }},
                    websiteDinas: {{ json_encode(old('website_dinas', $user->website_dinas ?? 'https://makassarkota.go.id')) }},
                    namaPimpinan: {{ json_encode(old('nama_pimpinan', $user->nama_pimpinan ?? 'Dr. H. Ismawaty Nur, S.STP., M.Si')) }},
                    nipPimpinan: {{ json_encode(old('nip_pimpinan', $user->nip_pimpinan ?? '197608141995012001')) }}
                 }">
                
                <div class="p-6 sm:p-8 border-b border-gray-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-extrabold text-lg">
                            <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </span>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Informasi Instansi & Perangkat Daerah</h2>
                            <p class="text-xs sm:text-sm text-gray-500 mt-0.5">
                                Data ini dicetak otomatis pada <strong>Kop Surat Berita Acara, Laporan Proposal Inovasi, & Lembar Pengesahan BRIDA</strong>.
                            </p>
                        </div>
                    </div>

                    <span class="text-xs font-semibold px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-800 border border-emerald-200 self-start md:self-auto flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Sinkronisasi Cetak PDF Aktif
                    </span>
                </div>

                <!-- Alert Sukses Pembaruan Instansi -->
                @if (session('status_instansi'))
                    <div class="mx-6 sm:mx-8 mt-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-medium">{{ session('status_instansi') }}</span>
                    </div>
                @endif

                <!-- LIVE PREVIEW KOP LAPORAN OTOMATIS -->
                <div class="px-6 sm:px-8 pt-6">
                    <div class="p-5 rounded-2xl bg-gradient-to-br from-slate-50 to-blue-50/40 border border-slate-200">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-200 text-xs text-gray-500">
                            <span class="font-bold text-gray-700 uppercase tracking-wider flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Pratinjau Langsung (Live Preview Kop Dokumen Laporan)
                            </span>
                            <span class="text-[11px] text-blue-700 italic">Otomatis Tergenerate pada Dokumen PDF</span>
                        </div>

                        <!-- Mockup Kop Surat -->
                        <div class="bg-white p-6 rounded-xl border border-gray-300 mt-3 shadow-xs text-center space-y-1">
                            <h4 class="text-xs font-bold uppercase tracking-widest text-gray-500">Pemerintah Kota Makassar</h4>
                            <h3 class="text-base sm:text-lg font-black uppercase tracking-tight text-gray-900" x-text="namaInstansi || 'NAMA PERANGKAT DAERAH'"></h3>
                            <p class="text-xs text-gray-600 leading-snug font-medium" x-text="alamatKantor || 'Alamat Kantor Dinas Lengkap'"></p>
                            <p class="text-[11px] text-gray-500 font-mono space-x-2">
                                <span>Email: <span class="font-bold text-blue-700" x-text="emailDinas || 'email@dinas.go.id'"></span></span>
                                <span>•</span>
                                <span>Telp: <span x-text="teleponKantor || '-'"></span></span>
                                <span>•</span>
                                <span>Website: <span x-text="websiteDinas || '-'"></span></span>
                            </p>
                            <div class="w-full border-t-2 border-b border-gray-900 pt-0.5 mt-3"></div>
                        </div>
                    </div>
                </div>

                <!-- FORM PEMBARUAN INFORMASI INSTANSI -->
                <form method="POST" action="{{ route('inovator.profil.instansi') }}" class="p-6 sm:p-8 space-y-6">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Nama Akun PIC (Pengguna) -->
                        <div>
                            <x-input-label for="name" value="Nama Lengkap Penanggung Jawab Akun (PIC) *" class="font-bold text-gray-800" />
                            <x-text-input id="name"
                                          name="name"
                                          type="text"
                                          class="mt-2 block w-full rounded-xl"
                                          :value="old('name', $user->name)"
                                          required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Akun Login (Readonly / Informative) -->
                        <div>
                            <x-input-label for="email" value="Email Akun Login (Kredensial Autentikasi)" class="font-bold text-gray-800" />
                            <x-text-input id="email"
                                          type="email"
                                          class="mt-2 block w-full rounded-xl bg-gray-100 text-gray-500 cursor-not-allowed"
                                          :value="$user->email"
                                          readonly />
                            <p class="text-[11px] text-gray-400 mt-1">Email login utama untuk masuk ke dalam sistem evaluasi inovasi.</p>
                        </div>

                        <!-- Nama Perangkat Daerah / Instansi -->
                        <div class="md:col-span-2">
                            <x-input-label for="nama_instansi" value="Nama Instansi / Perangkat Daerah (OPD) *" class="font-bold text-gray-800" />
                            <x-text-input id="nama_instansi"
                                          name="nama_instansi"
                                          type="text"
                                          x-model="namaInstansi"
                                          class="mt-2 block w-full rounded-xl font-semibold text-gray-900"
                                          placeholder="Contoh: Dinas Komunikasi dan Informatika Kota Makassar"
                                          required />
                            <x-input-error :messages="$errors->get('nama_instansi')" class="mt-2" />
                            <p class="text-[11px] text-gray-400 mt-1">Dicetak sebagai nama instansi pengusul pada cover dan tajuk surat resmi.</p>
                        </div>

                        <!-- Alamat Kantor Resmi -->
                        <div class="md:col-span-2">
                            <x-input-label for="alamat_kantor" value="Alamat Kantor Resmi Dinas *" class="font-bold text-gray-800" />
                            <textarea id="alamat_kantor"
                                      name="alamat_kantor"
                                      rows="3"
                                      x-model="alamatKantor"
                                      class="mt-2 block w-full rounded-xl border-gray-300 shadow-xs focus:border-blue-500 focus:ring-blue-500 text-sm leading-relaxed"
                                      placeholder="Contoh: Jl. Teduh Bersinar No. 1, Balai Kota Makassar, Sulawesi Selatan 90111"
                                      required>{{ old('alamat_kantor', $user->alamat_kantor ?? '') }}</textarea>
                            <x-input-error :messages="$errors->get('alamat_kantor')" class="mt-2" />
                            <p class="text-[11px] text-gray-400 mt-1">Wajib memuat nama jalan, nomor kantor, kelurahan/kecamatan, dan kode pos untuk validitas korespondensi BRIDA.</p>
                        </div>

                        <!-- Email Resmi Kedinasan -->
                        <div>
                            <x-input-label for="email_dinas" value="Email Resmi Kedinasan (Domain @makassarkota.go.id) *" class="font-bold text-gray-800" />
                            <x-text-input id="email_dinas"
                                          name="email_dinas"
                                          type="email"
                                          x-model="emailDinas"
                                          class="mt-2 block w-full rounded-xl font-mono text-sm"
                                          placeholder="Contoh: diskominfo@makassarkota.go.id"
                                          required />
                            <x-input-error :messages="$errors->get('email_dinas')" class="mt-2" />
                            <p class="text-[11px] text-gray-400 mt-1">Email kedinasan yang tertera pada kop surat dan pengiriman salinan rekap hasil evaluasi.</p>
                        </div>

                        <!-- Telepon Kantor -->
                        <div>
                            <x-input-label for="telepon_kantor" value="Nomor Telepon Kantor / Fax" class="font-bold text-gray-800" />
                            <x-text-input id="telepon_kantor"
                                          name="telepon_kantor"
                                          type="text"
                                          x-model="teleponKantor"
                                          class="mt-2 block w-full rounded-xl font-mono text-sm"
                                          placeholder="Contoh: (0411) 3612345"
                                          :value="old('telepon_kantor', $user->telepon_kantor ?? '')" />
                            <x-input-error :messages="$errors->get('telepon_kantor')" class="mt-2" />
                        </div>

                        <!-- Website Resmi Dinas -->
                        <div>
                            <x-input-label for="website_dinas" value="Alamat Website Resmi Instansi" class="font-bold text-gray-800" />
                            <x-text-input id="website_dinas"
                                          name="website_dinas"
                                          type="url"
                                          x-model="websiteDinas"
                                          class="mt-2 block w-full rounded-xl font-mono text-sm"
                                          placeholder="Contoh: https://diskominfo.makassarkota.go.id"
                                          :value="old('website_dinas', $user->website_dinas ?? '')" />
                            <x-input-error :messages="$errors->get('website_dinas')" class="mt-2" />
                        </div>

                        <!-- Nama Pimpinan / Kepala OPD -->
                        <div>
                            <x-input-label for="nama_pimpinan" value="Nama Lengkap Kepala OPD / Pimpinan Instansi" class="font-bold text-gray-800" />
                            <x-text-input id="nama_pimpinan"
                                          name="nama_pimpinan"
                                          type="text"
                                          x-model="namaPimpinan"
                                          class="mt-2 block w-full rounded-xl text-sm"
                                          placeholder="Contoh: Dr. H. Ismawaty Nur, S.STP., M.Si"
                                          :value="old('nama_pimpinan', $user->nama_pimpinan ?? '')" />
                            <x-input-error :messages="$errors->get('nama_pimpinan')" class="mt-2" />
                            <p class="text-[11px] text-gray-400 mt-1">Pejabat yang menandatangani lembar komitmen pimpinan & pakta integritas.</p>
                        </div>

                        <!-- NIP Kepala OPD -->
                        <div>
                            <x-input-label for="nip_pimpinan" value="NIP Kepala OPD / Pimpinan" class="font-bold text-gray-800" />
                            <x-text-input id="nip_pimpinan"
                                          name="nip_pimpinan"
                                          type="text"
                                          x-model="nipPimpinan"
                                          class="mt-2 block w-full rounded-xl font-mono text-sm"
                                          placeholder="18 digit NIP tanpa spasi"
                                          :value="old('nip_pimpinan', $user->nip_pimpinan ?? '')" />
                            <x-input-error :messages="$errors->get('nip_pimpinan')" class="mt-2" />
                        </div>

                    </div>

                    <!-- Tombol Simpan Informasi Instansi -->
                    <div class="pt-6 border-t border-gray-100 flex items-center justify-end">
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl font-bold text-sm text-white bg-blue-700 hover:bg-blue-800 shadow-md shadow-blue-500/20 hover:shadow-lg transition-all duration-150">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Simpan Detail Informasi Instansi</span>
                        </button>
                    </div>

                </form>
            </div>

            <!-- BAGIAN 2: FORMULIR PEMBARUAN KATA SANDI AKUN -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden"
                 x-data="{
                    showCurrent: false,
                    showNew: false,
                    showConfirm: false
                 }">
                
                <div class="p-6 sm:p-8 border-b border-gray-100 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-extrabold text-lg">
                        <svg class="w-5 h-5 text-indigo-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </span>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Pembaruan Kata Sandi Akun</h2>
                        <p class="text-xs sm:text-sm text-gray-500 mt-0.5">
                            Pastikan kata sandi akun Anda menggunakan kombinasi karakter yang kuat dan aman untuk melindungi integritas berkas evaluasi.
                        </p>
                    </div>
                </div>

                <!-- Alert Sukses Pembaruan Password -->
                @if (session('status_password'))
                    <div class="mx-6 sm:mx-8 mt-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-medium">{{ session('status_password') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('inovator.profil.password') }}" class="p-6 sm:p-8 space-y-6 max-w-2xl">
                    @csrf
                    @method('PUT')

                    <!-- Kata Sandi Saat Ini -->
                    <div>
                        <x-input-label for="current_password" value="Kata Sandi Saat Ini *" class="font-bold text-gray-800" />
                        <div class="relative mt-2">
                            <input id="current_password"
                                   name="current_password"
                                   :type="showCurrent ? 'text' : 'password'"
                                   class="block w-full rounded-xl border-gray-300 pr-10 shadow-xs focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                                   placeholder="Masukkan kata sandi lama Anda"
                                   required />
                            <button type="button"
                                    @click="showCurrent = !showCurrent"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg x-show="!showCurrent" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg x-show="showCurrent" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                    </div>

                    <!-- Kata Sandi Baru -->
                    <div>
                        <x-input-label for="password" value="Kata Sandi Baru *" class="font-bold text-gray-800" />
                        <div class="relative mt-2">
                            <input id="password"
                                   name="password"
                                   :type="showNew ? 'text' : 'password'"
                                   class="block w-full rounded-xl border-gray-300 pr-10 shadow-xs focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                                   placeholder="Minimal 8 karakter kombinasi"
                                   required />
                            <button type="button"
                                    @click="showNew = !showNew"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg x-show="!showNew" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg x-show="showNew" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Konfirmasi Kata Sandi Baru -->
                    <div>
                        <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi Baru *" class="font-bold text-gray-800" />
                        <div class="relative mt-2">
                            <input id="password_confirmation"
                                   name="password_confirmation"
                                   :type="showConfirm ? 'text' : 'password'"
                                   class="block w-full rounded-xl border-gray-300 pr-10 shadow-xs focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                                   placeholder="Ulangi kata sandi baru"
                                   required />
                            <button type="button"
                                    @click="showConfirm = !showConfirm"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg x-show="!showConfirm" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg x-show="showConfirm" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Tombol Simpan Kata Sandi -->
                    <div class="pt-4 flex items-center justify-start">
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl font-bold text-sm text-white bg-indigo-700 hover:bg-indigo-800 shadow-md shadow-indigo-500/20 hover:shadow-lg transition-all duration-150">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <span>Perbarui Kata Sandi</span>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
