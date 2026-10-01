<!-- SECTION: PUSAT KREDENSIAL DEMO / UJI COBA -->
<section class="py-16 bg-slate-100 border-b border-slate-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-2">Akses Cepat Pengujian (Demo Sandbox)</span>
        <h3 class="text-xl font-bold text-slate-900 mb-6">Gunakan Akun Simulasi Berikut untuk Menguji Sistem:</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-left">
            <!-- Demo Box 1: Inovator -->
            <div class="p-5 rounded-2xl bg-white border border-blue-200 shadow-sm">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-bold text-blue-700 text-sm">🏢 Akun Inovator (Dinkes)</span>
                    <span class="text-[10px] bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full font-bold">Inovator</span>
                </div>
                <div class="text-xs text-slate-600 space-y-1 font-mono">
                    <div>Email: <strong class="text-slate-900">test@example.com</strong></div>
                    <div>Password: <strong class="text-slate-900">password</strong></div>
                </div>
                <a href="{{ route('login') }}" class="mt-4 block text-center py-2 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold text-xs transition">
                    Buka Login Inovator &rarr;
                </a>
            </div>

            <!-- Demo Box 2: Evaluator -->
            <div class="p-5 rounded-2xl bg-white border border-indigo-200 shadow-sm">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-bold text-indigo-700 text-sm">⚖️ Akun Evaluator (BRIDA)</span>
                    <span class="text-[10px] bg-indigo-100 text-indigo-800 px-2 py-0.5 rounded-full font-bold">Evaluator</span>
                </div>
                <div class="text-xs text-slate-600 space-y-1 font-mono">
                    <div>Email: <strong class="text-slate-900">evaluator@example.com</strong></div>
                    <div>Password: <strong class="text-slate-900">password</strong></div>
                </div>
                <a href="{{ route('login') }}" class="mt-4 block text-center py-2 rounded-lg bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold text-xs transition">
                    Buka Login Evaluator &rarr;
                </a>
            </div>
        </div>
    </div>
</section>
