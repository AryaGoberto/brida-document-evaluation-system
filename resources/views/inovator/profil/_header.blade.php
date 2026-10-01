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
