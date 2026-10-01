<!-- SECTION: 19 INDIKATOR KEMATANGAN INOVASI DAERAH -->
<section id="indikator" class="py-20 lg:py-28 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold text-blue-400 uppercase tracking-wider bg-blue-500/10 px-3 py-1 rounded-full border border-blue-500/20">Rubrik Resmi Kemendagri &amp; BRIDA</span>
            <h2 class="text-3xl sm:text-4xl font-black text-white mt-3 tracking-tight">
                19 Indikator Kematangan Inovasi Daerah
            </h2>
            <p class="text-slate-400 text-sm sm:text-base mt-3">
                Setiap indikator memiliki bobot resmi mulai dari 1.0 hingga 4.0 dengan total kalkulasi skor maksimal 106 poin.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @php
                $indikatorList = [
                    ['no' => 1,  'judul' => 'Regulasi Inovasi Daerah',       'bobot' => '3.0', 'ket' => 'Perda / Perwali / SK Walikota'],
                    ['no' => 2,  'judul' => 'Ketersediaan SDM Inovasi',      'bobot' => '2.0', 'ket' => 'SK penetapan tim pelaksana'],
                    ['no' => 3,  'judul' => 'Dukungan Anggaran',             'bobot' => '2.0', 'ket' => 'Alokasi dalam DPA OPD'],
                    ['no' => 4,  'judul' => 'Bimtek / Pelatihan Inovasi',   'bobot' => '1.0', 'ket' => 'Sertifikat & laporan pelatihan'],
                    ['no' => 5,  'judul' => 'Integrasi RKPD Daerah',        'bobot' => '2.0', 'ket' => 'Pencantuman dalam RKPD'],
                    ['no' => 6,  'judul' => 'Keterlibatan Aktor Inovasi',   'bobot' => '1.0', 'ket' => 'Pentahelix (kampus, swasta, warga)'],
                    ['no' => 7,  'judul' => 'Pelaksana Inovasi Daerah',     'bobot' => '1.0', 'ket' => 'Kualifikasi jabatan personil'],
                    ['no' => 8,  'judul' => 'Jejaring Inovasi Daerah',      'bobot' => '1.0', 'ket' => 'MoU / Kerjasama kemitraan'],
                    ['no' => 9,  'judul' => 'Sosialisasi Inovasi Daerah',   'bobot' => '1.0', 'ket' => 'Liputan media / leaflet / workshop'],
                    ['no' => 10, 'judul' => 'Pedoman Teknis (SOP)',         'bobot' => '1.0', 'ket' => 'Buku pedoman teknis resmi'],
                    ['no' => 11, 'judul' => 'Media Informasi Layanan',      'bobot' => '1.0', 'ket' => 'Website / Medsos / Aplikasi'],
                    ['no' => 12, 'judul' => 'Kemudahan Proses Layanan',     'bobot' => '2.0', 'ket' => 'Pemangkasan alur & persyaratan'],
                    ['no' => 13, 'judul' => 'Integrasi Sistem Layanan',     'bobot' => '2.0', 'ket' => 'Integrasi API / Satu Data'],
                    ['no' => 14, 'judul' => 'Replikasi Inovasi',            'bobot' => '3.0', 'ket' => 'Diadopsi oleh daerah/dinas lain'],
                    ['no' => 15, 'judul' => 'Alat Kerja / Perlengkapan',    'bobot' => '2.0', 'ket' => 'Dukungan infrastruktur fisik/TI'],
                    ['no' => 16, 'judul' => 'Kemanfaatan Inovasi Daerah',   'bobot' => '3.0', 'ket' => 'Efisiensi waktu & anggaran nyata'],
                    ['no' => 17, 'judul' => 'Kecepatan Penciptaan',         'bobot' => '2.0', 'ket' => 'Realisasi ide hingga implementasi'],
                    ['no' => 18, 'judul' => 'Kepuasan Pengguna (SKM)',      'bobot' => '1.0', 'ket' => 'Laporan survei indeks kepuasan'],
                    ['no' => 19, 'judul' => 'Penyelesaian Pengaduan',       'bobot' => '2.0', 'ket' => 'SOP & tindak lanjut komplain'],
                    ['no' => 20, 'judul' => 'Monitoring & Evaluasi',        'bobot' => '2.0', 'ket' => 'Laporan berkala hasil monev'],
                    ['no' => 19, 'judul' => 'Kualitas Inovasi Daerah',      'bobot' => '4.0', 'ket' => 'Video dokumentasi & dampak luas'],
                ];
            @endphp

            @foreach ($indikatorList as $ind)
                <div class="p-4 rounded-xl bg-slate-800/70 border border-slate-700/80 hover:border-blue-500/50 hover:bg-slate-800 transition-all flex items-start gap-3">
                    <span class="w-7 h-7 rounded-lg bg-blue-600/30 text-blue-400 font-black text-xs flex items-center justify-center border border-blue-500/30 flex-shrink-0">
                        {{ $ind['no'] }}
                    </span>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2">
                            <h4 class="font-bold text-white text-xs truncate">{{ $ind['judul'] }}</h4>
                            <span class="text-[10px] font-bold text-cyan-300 bg-cyan-950/60 px-1.5 py-0.5 rounded border border-cyan-800/60 flex-shrink-0">
                                Bobot {{ $ind['bobot'] }}
                            </span>
                        </div>
                        <p class="text-[11px] text-slate-400 mt-1 truncate">{{ $ind['ket'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
