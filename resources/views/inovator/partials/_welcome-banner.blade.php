<div class="bg-gradient-to-r from-blue-900 via-indigo-900 to-slate-900 rounded-2xl p-6 text-white shadow-xl relative overflow-hidden">
    <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-blue-500/10 rounded-full blur-2xl"></div>
    <div class="absolute -left-10 -top-10 w-48 h-48 bg-indigo-500/10 rounded-full blur-2xl"></div>
    
    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-blue-200 border border-white/10">
                <svg class="w-3.5 h-3.5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                </svg>
                Sistem Evaluasi Berbantuan AI BRIDA Makassar
            </div>
            <h2 class="text-xl font-bold tracking-tight text-white sm:text-2xl">
                Selamat Datang, {{ Auth::user()->name }}
            </h2>
            <p class="text-sm text-blue-100/90 max-w-2xl leading-relaxed">
                Setiap proposal inovasi akan melewati telaah otomatis model AI sebelum divalidasi oleh tim penilai BRIDA Kota Makassar guna memastikan kelengkapan indikator dan kematangan inovasi.
            </p>
        </div>
        
        <!-- Indikator 5 Tahap Wizard -->
        <div class="grid grid-cols-5 gap-1.5 sm:gap-2 bg-white/10 p-3 rounded-xl backdrop-blur-sm border border-white/10 max-w-md">
            <div class="text-center">
                <span class="w-6 h-6 mx-auto flex items-center justify-center rounded-full bg-blue-500 text-[11px] font-bold">1</span>
                <span class="text-[10px] text-blue-200 mt-1 block">Profil</span>
            </div>
            <div class="text-center">
                <span class="w-6 h-6 mx-auto flex items-center justify-center rounded-full bg-blue-500 text-[11px] font-bold">2</span>
                <span class="text-[10px] text-blue-200 mt-1 block">Masalah</span>
            </div>
            <div class="text-center">
                <span class="w-6 h-6 mx-auto flex items-center justify-center rounded-full bg-indigo-500 text-[11px] font-bold">3</span>
                <span class="text-[10px] text-blue-200 mt-1 block">Skoring AI</span>
            </div>
            <div class="text-center">
                <span class="w-6 h-6 mx-auto flex items-center justify-center rounded-full bg-indigo-500 text-[11px] font-bold">4</span>
                <span class="text-[10px] text-blue-200 mt-1 block">Bukti</span>
            </div>
            <div class="text-center">
                <span class="w-6 h-6 mx-auto flex items-center justify-center rounded-full bg-emerald-500 text-[11px] font-bold">5</span>
                <span class="text-[10px] text-emerald-300 mt-1 block">Kirim</span>
            </div>
        </div>
    </div>
</div>