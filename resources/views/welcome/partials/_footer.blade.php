<!-- FOOTER -->
<footer class="bg-slate-950 text-slate-400 py-12 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Divider Section: Branding + Nav -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pb-10 border-b border-slate-800">
            
            <!-- Brand Block -->
            <div class="md:col-span-1 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="bg-white px-2.5 py-1 rounded-xl inline-block">
                        <img src="{{ asset('images/brida.png') }}" alt="BRIDA Kota Makassar" class="h-8 w-auto object-contain">
                    </div>
                </div>
                <p class="text-slate-500 text-xs leading-relaxed max-w-xs">
                    Sistem Informasi Inovasi Daerah (SID-BRIDA) dikelola oleh Badan Riset dan Inovasi Daerah Kota Makassar. Dikembangkan sesuai standar evaluasi IGA Kemendagri.
                </p>
                <div class="text-xs text-slate-600">
                    &copy; {{ date('Y') }} BRIDA Kota Makassar. Hak Cipta Dilindungi.
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <h4 class="text-slate-300 font-bold text-xs uppercase tracking-wider">Navigasi</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="#tentang" class="hover:text-white transition-colors">Tentang Sistem</a></li>
                    <li><a href="#alur" class="hover:text-white transition-colors">Alur 5 Tahap</a></li>
                    <li><a href="#indikator" class="hover:text-white transition-colors">19 Indikator Kematangan</a></li>
                    <li><a href="#peran" class="hover:text-white transition-colors">Akses Peran</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Login / Akses Sistem</a></li>
                </ul>
            </div>

            <!-- Regulasi & Landasan Hukum -->
            <div class="space-y-4">
                <h4 class="text-slate-300 font-bold text-xs uppercase tracking-wider">Landasan Hukum</h4>
                <ul class="space-y-2 text-xs text-slate-500">
                    <li>PP No. 38 Tahun 2017 tentang Inovasi Daerah</li>
                    <li>Permendagri No. 104 Tahun 2018</li>
                    <li>Kepmendagri No. 100.3.3-5765 Tahun 2019</li>
                    <li>Perwali Makassar tentang IDA 2024</li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-600">
            <span>Dikembangkan oleh Arya Gunava Rogoberto | Mahasiswa Skripsi UIN Alauddin Makassar</span>
            <span class="flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Versi 0.8 · Build Stabil
            </span>
        </div>
    </div>
</footer>
