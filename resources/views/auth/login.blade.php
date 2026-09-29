<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Sistem Evaluasi Inovasi</h2>
        <p class="text-sm text-gray-600 mt-2">BRIDA Kota Makassar</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Alamat Email / NIP" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Kata Sandi" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">Ingat Saya</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    Lupa Kata Sandi?
                </a>
            @endif

            <x-primary-button class="ms-3 bg-blue-700 hover:bg-blue-800">
                Masuk Sistem
            </x-primary-button>
        </div>
    </form>

    <!-- Demo Credentials Helper -->
    <div class="mt-8 pt-6 border-t border-gray-200">
        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-3 text-center">Akun Uji Coba (Demo Access)</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
            <button type="button" 
                onclick="document.getElementById('email').value='test@example.com'; document.getElementById('password').value='password';"
                class="p-2.5 rounded-lg border border-blue-200 bg-blue-50/70 hover:bg-blue-100 text-left transition text-blue-900 group">
                <div class="flex items-center justify-between mb-1">
                    <span class="font-bold text-blue-700">🏢 Inovator (OPD)</span>
                    <span class="text-[10px] bg-blue-200 text-blue-800 px-1.5 py-0.5 rounded font-medium">Klik Isi</span>
                </div>
                <div class="text-gray-600 font-mono text-[11px]">test@example.com</div>
                <div class="text-gray-500 text-[10px]">Pass: <code class="bg-blue-100 px-1 rounded">password</code></div>
            </button>

            <button type="button" 
                onclick="document.getElementById('email').value='evaluator@example.com'; document.getElementById('password').value='password';"
                class="p-2.5 rounded-lg border border-indigo-200 bg-indigo-50/70 hover:bg-indigo-100 text-left transition text-indigo-900 group">
                <div class="flex items-center justify-between mb-1">
                    <span class="font-bold text-indigo-700">⚖️ Evaluator BRIDA</span>
                    <span class="text-[10px] bg-indigo-200 text-indigo-800 px-1.5 py-0.5 rounded font-medium">Klik Isi</span>
                </div>
                <div class="text-gray-600 font-mono text-[11px]">evaluator@example.com</div>
                <div class="text-gray-500 text-[10px]">Pass: <code class="bg-indigo-100 px-1 rounded">password</code></div>
            </button>
        </div>
    </div>
</x-guest-layout>