<!-- NAVIGATION HEADER -->
<header class="fixed top-0 inset-x-0 z-50 bg-slate-900/80 backdrop-blur-lg border-b border-slate-800/80 transition-all duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            <!-- Logo & Brand Identity -->
            <a href="{{ url('/') }}" class="flex items-center group">
                <div class="bg-white px-3 py-1.5 rounded-xl shadow-sm flex items-center group-hover:scale-105 transition-transform duration-200">
                    <img src="{{ asset('images/brida.png') }}" alt="Logo BRIDA Kota Makassar" class="h-8 sm:h-9 w-auto object-contain">
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-300">
                <a href="#tentang" class="hover:text-white transition-colors">Tentang Sistem</a>
                <a href="#alur" class="hover:text-white transition-colors">Alur 5 Tahap</a>
                <a href="#indikator" class="hover:text-white transition-colors">19 Indikator</a>
                <a href="#ai-engine" class="hover:text-white transition-colors flex items-center gap-1.5">
                    <span>Model AI</span>
                    <span class="px-1.5 py-0.2 rounded text-[10px] bg-indigo-500/30 text-indigo-300 border border-indigo-500/40">OCR</span>
                </a>
                <a href="#peran" class="hover:text-white transition-colors">Akses Peran</a>
            </nav>

            <!-- Auth Action Buttons -->
            <div class="hidden sm:flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white text-sm font-bold shadow-lg shadow-blue-600/30 hover:shadow-blue-600/50 transition-all duration-200 hover:-translate-y-0.5">
                        <span>Buka Dasbor</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2.5 text-sm font-bold text-slate-300 hover:text-white transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white text-sm font-bold shadow-lg shadow-blue-600/30 hover:shadow-blue-600/50 transition-all duration-200 hover:-translate-y-0.5">
                        <span>Mulai Akses</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div x-show="mobileMenuOpen" x-cloak class="md:hidden bg-slate-900 border-b border-slate-800 px-4 pt-3 pb-6 space-y-3">
        <a href="#tentang" @click="mobileMenuOpen = false" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white">Tentang Sistem</a>
        <a href="#alur" @click="mobileMenuOpen = false" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white">Alur 5 Tahap</a>
        <a href="#indikator" @click="mobileMenuOpen = false" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white">19 Indikator Kematangan</a>
        <a href="#ai-engine" @click="mobileMenuOpen = false" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white">Model AI</a>
        <a href="#peran" @click="mobileMenuOpen = false" class="block py-2 text-sm font-semibold text-slate-300 hover:text-white">Akses Peran</a>
        <div class="pt-3 border-t border-slate-800 flex flex-col gap-2">
            <a href="{{ route('login') }}" class="w-full text-center py-2.5 rounded-xl bg-blue-600 text-white font-bold text-sm">
                Masuk ke Sistem
            </a>
        </div>
    </div>
</header>
