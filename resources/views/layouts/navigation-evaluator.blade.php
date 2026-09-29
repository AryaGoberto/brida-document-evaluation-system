<nav x-data="{ open: false }" class="bg-slate-900 border-b border-slate-800 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo + Label Peran -->
                <div class="shrink-0 flex items-center gap-3">
                    <a href="{{ route('evaluator.dashboard') }}" class="flex items-center gap-2.5">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                        <span class="hidden sm:inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-indigo-600/30 text-indigo-300 border border-indigo-500/40 text-[11px] font-bold uppercase tracking-wider">
                            Evaluator BRIDA
                        </span>
                    </a>
                </div>

                <!-- Nav Links (Desktop) -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-8 sm:flex items-center">
                    <a 
                        href="{{ route('evaluator.dashboard') }}"
                        class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-150
                            {{ request()->routeIs('evaluator.dashboard') 
                                ? 'bg-white/10 text-white' 
                                : 'text-slate-300 hover:text-white hover:bg-white/5' }}"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dasbor
                    </a>

                    <a 
                        href="{{ route('evaluator.antrean') }}"
                        class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-150
                            {{ request()->routeIs('evaluator.antrean*') 
                                ? 'bg-white/10 text-white' 
                                : 'text-slate-300 hover:text-white hover:bg-white/5' }}"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Antrean Inovasi
                        <!-- Badge jumlah antrian (bisa dinamis nanti) -->
                        <span class="ml-0.5 w-5 h-5 rounded-full bg-amber-500 text-white text-[10px] font-black flex items-center justify-center flex-shrink-0">
                            14
                        </span>
                    </a>

                    <a 
                        href="{{ route('evaluator.riwayat') }}"
                        class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-150
                            {{ request()->routeIs('evaluator.riwayat*') 
                                ? 'bg-white/10 text-white' 
                                : 'text-slate-300 hover:text-white hover:bg-white/5' }}"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        Riwayat & Rekap
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-2 border border-white/10 rounded-xl text-sm font-medium text-slate-200 bg-white/5 hover:bg-white/10 hover:border-white/20 focus:outline-none transition ease-in-out duration-150">
                            <span class="w-7 h-7 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs font-black flex-shrink-0">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                            <div class="text-left hidden lg:block">
                                <div class="text-xs font-bold text-white leading-none">{{ Auth::user()->name }}</div>
                                <div class="text-[10px] text-slate-400 mt-0.5">Evaluator BRIDA</div>
                            </div>
                            <svg class="fill-current h-3.5 w-3.5 text-slate-400 ml-1" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-xs font-bold text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-[11px] text-gray-500">{{ Auth::user()->email }}</p>
                            <span class="mt-1 inline-block text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-700 border border-indigo-200">
                                Evaluator BRIDA
                            </span>
                        </div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-red-600 hover:text-red-700 hover:bg-red-50">
                                <svg class="w-4 h-4 mr-2 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Keluar Sistem
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-white hover:bg-white/10 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-slate-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('evaluator.dashboard')" :active="request()->routeIs('evaluator.dashboard')" class="text-slate-300 hover:text-white hover:bg-white/10">
                Dasbor
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('evaluator.antrean')" :active="request()->routeIs('evaluator.antrean*')" class="text-slate-300 hover:text-white hover:bg-white/10">
                Antrean Inovasi
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('evaluator.riwayat')" :active="request()->routeIs('evaluator.riwayat*')" class="text-slate-300 hover:text-white hover:bg-white/10">
                Riwayat & Rekap
            </x-responsive-nav-link>
        </div>

        <!-- Responsive User Info -->
        <div class="pt-4 pb-1 border-t border-slate-700">
            <div class="px-4 flex items-center gap-3">
                <span class="w-9 h-9 rounded-full bg-indigo-600 text-white flex items-center justify-center text-sm font-black flex-shrink-0">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
                <div>
                    <div class="font-bold text-sm text-white">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-slate-400">Evaluator BRIDA Kota Makassar</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-slate-300 hover:text-white hover:bg-white/10">
                        Keluar Sistem
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
