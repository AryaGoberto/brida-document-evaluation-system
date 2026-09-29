<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Penilaian Inovasi Daerah 2026 - BRIDA Kota Makassar</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: white !important;
                color: black !important;
                font-size: 10pt;
            }
            @page {
                size: A4 landscape;
                margin: 12mm 12mm 12mm 12mm;
            }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased min-h-screen py-6 print:py-0 print:bg-white">

    <!-- FLOATING TOP ACTION BAR -->
    <div class="no-print max-w-6xl mx-auto mb-6 px-4">
        <div class="bg-slate-900 text-white p-4 rounded-2xl shadow-xl flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('evaluator.riwayat') }}" class="p-2 rounded-xl bg-white/10 hover:bg-white/20 text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h4 class="font-bold text-sm">Laporan Rekapitulasi Eksekutif untuk Pimpinan BRIDA</h4>
                    <p class="text-xs text-slate-300">Format cetak lanskap resmi untuk bukti fisik & arsip pimpinan</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button 
                    onclick="window.print()" 
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold shadow-md transition-all cursor-pointer"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    <span>Cetak Laporan Rekap (PDF)</span>
                </button>
            </div>
        </div>
    </div>

    <!-- MAIN A4 LANDSCAPE DOCUMENT CONTAINER -->
    <div class="max-w-6xl mx-auto bg-white p-8 sm:p-10 rounded-2xl shadow-md border border-gray-200 print:shadow-none print:border-none print:p-0">

        <!-- KOP SURAT RESMI PEMKOT MAKASSAR - BRIDA -->
        <div class="text-center relative pb-3 border-b-4 border-double border-gray-900 mb-6">
            <div class="flex items-center justify-between">
                <div class="w-20 h-20 flex items-center justify-center">
                    <div class="w-16 h-16 rounded-xl bg-slate-900 text-white flex items-center justify-center font-black text-xs text-center p-1">
                        BRIDA MKS
                    </div>
                </div>
                <div class="flex-1 px-4 text-center">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-gray-800">Pemerintah Kota Makassar</h3>
                    <h2 class="text-base sm:text-lg font-black uppercase tracking-tight text-gray-900">Badan Riset dan Inovasi Daerah (BRIDA)</h2>
                    <p class="text-[10px] text-gray-600 mt-0.5">
                        Jl. Teduh Bersinar No. 1, Balai Kota Makassar, Sulawesi Selatan 90222 | Laman: brida.makassarkota.go.id
                    </p>
                </div>
                <div class="w-20 h-20 flex items-center justify-center">
                    <div class="w-16 h-16 border border-gray-300 rounded flex flex-col items-center justify-center text-[8px] text-gray-400 font-mono text-center">
                        <span>ARSIP</span>
                        <span>RESMI</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- JUDUL LAPORAN -->
        <div class="text-center mb-6 space-y-1">
            <h2 class="text-sm sm:text-base font-black uppercase tracking-wider text-gray-900 underline decoration-2 underline-offset-4">
                Laporan Rekapitulasi Hasil Sidang Verifikasi Inovasi Daerah
            </h2>
            <h3 class="text-xs font-bold uppercase text-gray-700">
                Peringkat & Kelulusan Indeks Inovasi Daerah Kota Makassar Tahun 2026
            </h3>
        </div>

        <!-- RINGKASAN METRIK CAPAIAN KOTA -->
        <div class="grid grid-cols-4 gap-3 mb-6 text-xs">
            <div class="p-2.5 rounded-lg border border-gray-300 bg-gray-50 text-center">
                <span class="text-[10px] text-gray-500 font-bold uppercase block">Total Disidangkan</span>
                <span class="text-lg font-black text-gray-900">74 Inovasi</span>
            </div>
            <div class="p-2.5 rounded-lg border border-emerald-300 bg-emerald-50 text-center">
                <span class="text-[10px] text-emerald-700 font-bold uppercase block">Sangat Inovatif (Lolos IGA)</span>
                <span class="text-lg font-black text-emerald-800">52 Inovasi</span>
            </div>
            <div class="p-2.5 rounded-lg border border-blue-300 bg-blue-50 text-center">
                <span class="text-[10px] text-blue-700 font-bold uppercase block">Inovatif (Binaan Daerah)</span>
                <span class="text-lg font-black text-blue-800">18 Inovasi</span>
            </div>
            <div class="p-2.5 rounded-lg border border-amber-300 bg-amber-50 text-center">
                <span class="text-[10px] text-amber-700 font-bold uppercase block">Perlu Perbaikan</span>
                <span class="text-lg font-black text-amber-800">4 Inovasi</span>
            </div>
        </div>

        <!-- TABEL DATA REKAPITULASI LENGKAP -->
        <table class="w-full text-left text-[11px] border border-gray-300 mb-6">
            <thead class="bg-gray-100 font-bold text-gray-700 border-b border-gray-300 uppercase tracking-wider text-[10px]">
                <tr>
                    <th class="py-2 px-2 text-center w-8 border-r border-gray-300">No</th>
                    <th class="py-2 px-2 border-r border-gray-300 w-24">No. Registrasi</th>
                    <th class="py-2 px-3 border-r border-gray-300">Nama Inovasi & Perangkat Daerah (OPD)</th>
                    <th class="py-2 px-2 border-r border-gray-300 w-28">Kategori</th>
                    <th class="py-2 px-2 border-r border-gray-300 text-center w-20">Tgl Sidang</th>
                    <th class="py-2 px-2 border-r border-gray-300 text-center w-24">Skor Final (/111)</th>
                    <th class="py-2 px-2 border-r border-gray-300 text-center w-16">Kematangan</th>
                    <th class="py-2 px-2 border-r border-gray-300 text-center w-28">Status Kelulusan</th>
                    <th class="py-2 px-2 text-center w-36">Nomor Berita Acara</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @php $no = 1; @endphp
                @foreach ($riwayatList as $item)
                    <tr>
                        <td class="py-1.5 px-2 text-center font-bold text-gray-500 border-r border-gray-200">{{ $no++ }}</td>
                        <td class="py-1.5 px-2 font-mono font-semibold text-gray-700 border-r border-gray-200">{{ $item['kode'] }}</td>
                        <td class="py-1.5 px-3 border-r border-gray-200">
                            <span class="font-bold text-gray-900 block">{{ $item['judul'] }}</span>
                            <span class="text-[10px] text-gray-500">{{ $item['opd'] }}</span>
                        </td>
                        <td class="py-1.5 px-2 text-gray-700 border-r border-gray-200 text-[10px]">{{ $item['kategori'] }}</td>
                        <td class="py-1.5 px-2 text-center text-gray-600 border-r border-gray-200 text-[10px]">{{ $item['tanggal_sidang'] }}</td>
                        <td class="py-1.5 px-2 text-center font-black border-r border-gray-200 {{ $item['skor_final'] >= 88 ? 'text-emerald-700' : ($item['skor_final'] >= 67 ? 'text-blue-700' : 'text-amber-700') }}">
                            {{ number_format($item['skor_final'], 1) }}
                        </td>
                        <td class="py-1.5 px-2 text-center font-semibold text-gray-700 border-r border-gray-200 text-[10px]">{{ $item['persentase'] }}%</td>
                        <td class="py-1.5 px-2 text-center border-r border-gray-200">
                            <span class="font-bold text-[10px] px-1.5 py-0.5 rounded {{ $item['status_kelulusan'] === 'Sangat Inovatif' ? 'bg-emerald-100 text-emerald-800' : ($item['status_kelulusan'] === 'Inovatif' ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800') }}">
                                {{ $item['status_kelulusan'] }}
                            </span>
                        </td>
                        <td class="py-1.5 px-2 text-center font-mono text-[9px] text-gray-600">{{ $item['nomor_ba'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- TANDA TANGAN PENGESAHAN LAPORAN -->
        <div class="flex items-end justify-between text-xs pt-4">
            <div class="text-[10px] text-gray-500">
                <p>Dokumen ini dihasilkan secara otomatis melalui Sistem Evaluasi Inovasi BRIDA.</p>
                <p>Dicetak pada: {{ date('d F Y - H:i') }} WITA</p>
            </div>

            <div class="text-center w-72 space-y-12">
                <div>
                    <p class="text-gray-600">Makassar, {{ date('d F Y') }}</p>
                    <p class="font-bold text-gray-900">Kepala Badan Riset dan Inovasi Daerah<br>Kota Makassar,</p>
                </div>
                <div>
                    <p class="font-bold text-gray-900 underline underline-offset-2">Dr. H. Ruslan, M.Si</p>
                    <p class="text-gray-600 font-mono text-[10px]">Pembina Utama Muda - NIP. 197508121998031004</p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
