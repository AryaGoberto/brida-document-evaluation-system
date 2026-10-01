{{-- BAGIAN 2: FORMULIR PEMBARUAN KATA SANDI AKUN --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden"
     x-data="{
        showCurrent: false,
        showNew: false,
        showConfirm: false
     }">

    {{-- Card Header --}}
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

    {{-- Alert Sukses Pembaruan Password --}}
    @if (session('status_password'))
        <div class="mx-6 sm:mx-8 mt-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <span class="font-medium">{{ session('status_password') }}</span>
        </div>
    @endif

    {{-- Form Password --}}
    <form method="POST" action="{{ route('inovator.profil.password') }}" class="p-6 sm:p-8 space-y-6 max-w-2xl">
        @csrf
        @method('PUT')

        {{-- Helper macro untuk ikon mata --}}
        @php
            $eyeOpen  = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            $eyeSlash = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>';
        @endphp

        {{-- Kata Sandi Saat Ini --}}
        <div>
            <x-input-label for="current_password" value="Kata Sandi Saat Ini *" class="font-bold text-gray-800" />
            <div class="relative mt-2">
                <input id="current_password" name="current_password"
                       :type="showCurrent ? 'text' : 'password'"
                       class="block w-full rounded-xl border-gray-300 pr-10 shadow-xs focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                       placeholder="Masukkan kata sandi lama Anda" required />
                <button type="button" @click="showCurrent = !showCurrent"
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

        {{-- Kata Sandi Baru --}}
        <div>
            <x-input-label for="password" value="Kata Sandi Baru *" class="font-bold text-gray-800" />
            <div class="relative mt-2">
                <input id="password" name="password"
                       :type="showNew ? 'text' : 'password'"
                       class="block w-full rounded-xl border-gray-300 pr-10 shadow-xs focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                       placeholder="Minimal 8 karakter kombinasi" required />
                <button type="button" @click="showNew = !showNew"
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

        {{-- Konfirmasi Kata Sandi Baru --}}
        <div>
            <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi Baru *" class="font-bold text-gray-800" />
            <div class="relative mt-2">
                <input id="password_confirmation" name="password_confirmation"
                       :type="showConfirm ? 'text' : 'password'"
                       class="block w-full rounded-xl border-gray-300 pr-10 shadow-xs focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                       placeholder="Ulangi kata sandi baru" required />
                <button type="button" @click="showConfirm = !showConfirm"
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

        {{-- Tombol Simpan Kata Sandi --}}
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
