<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara Penilaian - {{ $inovasi['kode'] }} - BRIDA Kota Makassar</title>
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
                font-size: 11pt;
            }
            .page-break {
                page-break-before: always;
            }
            @page {
                size: A4 portrait;
                margin: 15mm 15mm 15mm 15mm;
            }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased min-h-screen py-6 print:py-0 print:bg-white">

    <!-- FLOATING TOP ACTION BAR (HIDDEN IN PRINT) -->
    <div class="no-print max-w-4xl mx-auto mb-6 px-4">
        <div class="bg-slate-900 text-white p-4 rounded-2xl shadow-xl flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('evaluator.riwayat.show', $inovasi['id']) }}" class="p-2 rounded-xl bg-white/10 hover:bg-white/20 text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h4 class="font-bold text-sm">Pratinjau Dokumen Berita Acara</h4>
                    <p class="text-xs text-slate-300">Siap cetak atau simpan sebagai PDF laporan pimpinan BRIDA</p>
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
                    <span>Cetak Dokumen Sekarang (PDF)</span>
                </button>
            </div>
        </div>
    </div>

    <!-- MAIN A4 DOCUMENT CONTAINER -->
    <div class="max-w-4xl mx-auto bg-white p-8 sm:p-12 rounded-2xl shadow-md border border-gray-200 print:shadow-none print:border-none print:p-0">

        <!-- KOP SURAT RESMI PEMKOT MAKASSAR - BRIDA -->
        <div class="text-center relative pb-3 border-b-4 border-double border-gray-900">
            <div class="flex items-center justify-between">
                <div class="w-20 h-20 flex items-center justify-center">
                    <img 
                        src="/images/logo-brida.png" 
                        alt="Logo Pemkot" 
                        class="h-16 w-auto object-contain"
                        onerror="this.style.display='none'; document.getElementById('logo-fallback').style.display='flex';"
                    />
                    <div id="logo-fallback" style="display:none;" class="w-16 h-16 rounded-xl bg-slate-900 text-white flex items-center justify-center font-black text-xs text-center p-1">
                        BRIDA MKS
                    </div>
                </div>
                <div class="flex-1 px-4">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-gray-800">Pemerintah Kota Makassar</h3>
                    <h2 class="text-lg sm:text-xl font-black uppercase tracking-tight text-gray-900">Badan Riset dan Inovasi Daerah</h2>
                    <h1 class="text-xl sm:text-2xl font-black tracking-tight text-blue-900">(BRIDA)</h1>
                    <p class="text-[11px] text-gray-600 mt-1">
                        Jl. Teduh Bersinar No. 1, Balai Kota Makassar, Sulawesi Selatan 90222<br>
                        Laman: <em>brida.makassarkota.go.id</em> | Pos-el: <em>brida@makassarkota.go.id</em>
                    </p>
                </div>
                <div class="w-20 h-20 flex items-center justify-center">
                    <!-- Placeholder Garuda / QR -->
                    <div class="w-16 h-16 border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center text-[9px] text-gray-400 font-mono text-center">
                        <span class="font-bold">VERIFIKASI</span>
                        <span>RESMI</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- JUDUL DOKUMEN BERITA ACARA -->
        <div class="text-center my-6 space-y-1">
            <h2 class="text-base sm:text-lg font-black uppercase tracking-wide text-gray-900 underline decoration-2 underline-offset-4">
                Berita Acara Hasil Verifikasi dan Penilaian Teknis
            </h2>
            <h3 class="text-xs sm:text-sm font-bold uppercase text-gray-700">
                Pengukuran Indeks Inovasi Daerah Kota Makassar Tahun 2026
            </h3>
            <p class="text-xs font-mono font-bold text-gray-600">
                Nomor: {{ $inovasi['nomor_ba'] }}
            </p>
        </div>

        <!-- KATA PENGANTAR / PREAMBULE -->
        <div class="text-xs leading-relaxed text-justify space-y-2 mb-4 text-gray-800">
            <p>
                Pada hari ini, bertempat di Kantor Badan Riset dan Inovasi Daerah (BRIDA) Kota Makassar, Tim Verifikator dan Evaluator Penilaian Inovasi Daerah telah melaksanakan rapat pleno verifikasi dan validasi teknis terhadap berkas usulan inovasi daerah sebagai berikut:
            </p>
        </div>

        <!-- TABEL IDENTITAS INOVASI -->
        <table class="w-full text-xs mb-6 border border-gray-300">
            <tbody>
                <tr class="border-b border-gray-200">
                    <td class="w-48 py-2 px-3 bg-gray-50 font-bold text-gray-700 border-r border-gray-200">Nomor Registrasi / Kode</td>
                    <td class="py-2 px-3 font-mono font-bold text-gray-900">{{ $inovasi['kode'] }}</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="py-2 px-3 bg-gray-50 font-bold text-gray-700 border-r border-gray-200">Judul Inovasi</td>
                    <td class="py-2 px-3 font-bold text-gray-900">{{ $inovasi['judul'] }}</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="py-2 px-3 bg-gray-50 font-bold text-gray-700 border-r border-gray-200">Perangkat Daerah (OPD)</td>
                    <td class="py-2 px-3 font-medium text-gray-900">{{ $inovasi['opd'] }}</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="py-2 px-3 bg-gray-50 font-bold text-gray-700 border-r border-gray-200">Kategori / Urusan</td>
                    <td class="py-2 px-3 text-gray-900">{{ $inovasi['kategori'] }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-3 bg-gray-50 font-bold text-gray-700 border-r border-gray-200">Tanggal Pengesahan Sidang</td>
                    <td class="py-2 px-3 font-semibold text-gray-900">{{ $inovasi['tanggal_sidang'] }}</td>
                </tr>
            </tbody>
        </table>

        <!-- HASIL REKAPITULASI PENILAIAN 21 INDIKATOR -->
        <div class="mb-4">
            <h4 class="text-xs font-bold uppercase tracking-wider text-gray-800 mb-2">
                A. Rekapitulasi Rincian 21 Indikator Satuan
            </h4>
            <table class="w-full text-left text-[11px] border border-gray-300">
                <thead class="bg-gray-100 font-bold text-gray-700 border-b border-gray-300">
                    <tr>
                        <th class="py-1.5 px-2 text-center w-8 border-r border-gray-300">No</th>
                        <th class="py-1.5 px-3 border-r border-gray-300">Indikator Penilaian</th>
                        <th class="py-1.5 px-2 text-center w-14 border-r border-gray-300">Bobot</th>
                        <th class="py-1.5 px-2 text-center w-20 border-r border-gray-300">Bintang</th>
                        <th class="py-1.5 px-2 text-center w-20 border-r border-gray-300">Nilai Poin</th>
                        <th class="py-1.5 px-2 text-center w-20">Maksimal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($rincianIndikator as $item)
                        <tr>
                            <td class="py-1 px-2 text-center font-semibold text-gray-600 border-r border-gray-200">{{ $item['no'] }}</td>
                            <td class="py-1 px-3 text-gray-900 border-r border-gray-200">{{ $item['judul'] }}</td>
                            <td class="py-1 px-2 text-center font-mono border-r border-gray-200">{{ $item['bobot'] }}x</td>
                            <td class="py-1 px-2 text-center font-bold text-amber-600 border-r border-gray-200">{{ $item['bintang'] }} ★</td>
                            <td class="py-1 px-2 text-center font-bold text-gray-900 border-r border-gray-200">{{ number_format($item['skor'], 1) }}</td>
                            <td class="py-1 px-2 text-center text-gray-500 font-mono">{{ number_format($item['skor_maksimal'], 1) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-100 font-bold border-t-2 border-gray-400">
                    <tr>
                        <td colspan="4" class="py-2 px-3 text-right uppercase tracking-wider text-xs">Total Skor Final:</td>
                        <td class="py-2 px-2 text-center font-black text-xs text-blue-900 border-r border-gray-300">{{ number_format($totalSkor, 1) }}</td>
                        <td class="py-2 px-2 text-center text-xs text-gray-700 font-mono">{{ number_format($totalMaks, 1) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- B. HASIL KEPUTUSAN PLENO & REKOMENDASI -->
        <div class="mb-6 space-y-2">
            <h4 class="text-xs font-bold uppercase tracking-wider text-gray-800">
                B. Penetapan Predikat & Rekomendasi
            </h4>
            <div class="p-3 bg-gray-50 rounded-xl border border-gray-300 text-xs space-y-2">
                <div class="flex items-center gap-2">
                    <span class="font-bold text-gray-700">Skor Total Akhir:</span>
                    <span class="font-black text-sm text-gray-900">{{ number_format($inovasi['skor_final'], 1) }} / 111.0</span>
                    <span class="text-gray-500">({{ $inovasi['persentase'] }}% Indeks Kematangan)</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="font-bold text-gray-700">Status Kelulusan:</span>
                    <span class="px-2.5 py-0.5 rounded-md font-black text-xs uppercase {{ $inovasi['status_kelulusan'] === 'Sangat Inovatif' ? 'bg-emerald-100 text-emerald-800' : ($inovasi['status_kelulusan'] === 'Inovatif' ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800') }}">
                        {{ $inovasi['status_kelulusan'] }}
                    </span>
                </div>
                <div>
                    <span class="font-bold text-gray-700 block mb-0.5">Rekomendasi Sidang Evaluator:</span>
                    <p class="italic text-gray-800 leading-relaxed">
                        "{{ $inovasi['rekomendasi'] }}"
                    </p>
                </div>
            </div>
        </div>

        <!-- KLAUSUL PENUTUP -->
        <p class="text-xs leading-relaxed text-gray-800 mb-8 text-justify">
            Demikian Berita Acara ini dibuat dengan sebenarnya dalam rangkap secukupnya, untuk dipergunakan sebagaimana mestinya dan dijadikan sebagai dasar penyusunan Laporan Indeks Inovasi Daerah Kota Makassar Tahun 2026.
        </p>

        <!-- TANDA TANGAN TIM VERIFIKATOR & KEPALA BRIDA -->
        <div class="grid grid-cols-2 gap-8 text-xs pt-4">
            
            <!-- Kiri: Anggota Verifikator -->
            <div class="text-center space-y-14">
                <div>
                    <p class="text-gray-600">Anggota Tim Verifikator,</p>
                </div>
                <div>
                    <p class="font-bold text-gray-900 underline underline-offset-2">{{ $inovasi['evaluator_anggota'] }}</p>
                    <p class="text-gray-500 text-[10px]">Verifikator Teknis BRIDA</p>
                </div>
            </div>

            <!-- Kanan: Ketua Tim Verifikator -->
            <div class="text-center space-y-14">
                <div>
                    <p class="text-gray-600">Ketua Tim Verifikator,</p>
                </div>
                <div>
                    <p class="font-bold text-gray-900 underline underline-offset-2">{{ $inovasi['evaluator_ketua'] }}</p>
                    <p class="text-gray-600 font-mono text-[10px]">NIP. {{ $inovasi['evaluator_nip'] }}</p>
                </div>
            </div>

        </div>

        <!-- Pengesahan Kepala Badan (Tengah Bawah) -->
        <div class="mt-8 pt-4 border-t border-gray-200 flex flex-col items-center justify-center text-center text-xs">
            <p class="text-gray-600">Mengetahui & Menyetujui,</p>
            <p class="font-bold text-gray-900">KEPALA BADAN RISET DAN INOVASI DAERAH (BRIDA)<br>KOTA MAKASSAR</p>
            
            <!-- Simbol Barcode TTE BSrE -->
            <div class="my-3 p-2 bg-gray-50 border border-gray-200 rounded-lg flex items-center gap-3">
                <div class="w-12 h-12 bg-white border border-gray-300 rounded flex items-center justify-center font-mono text-[8px] text-gray-400">
                    [QR-TTE]
                </div>
                <div class="text-left text-[10px] text-gray-500 leading-tight">
                    <span class="font-bold text-gray-700 block">Ditandatangani secara elektronik oleh:</span>
                    <span>Sertifikat Elektronik Balai Sertifikasi Elektronik (BSrE) - BSSN</span><br>
                    <span class="font-mono text-[9px] text-gray-400">UUID: {{ md5($inovasi['nomor_ba']) }}</span>
                </div>
            </div>

            <p class="font-bold text-gray-900 underline underline-offset-2 mt-1">Dr. H. Ruslan, M.Si</p>
            <p class="text-gray-600 font-mono text-[10px]">Pembina Utama Muda (IV/c) - NIP. 197508121998031004</p>
        </div>

    </div>

</body>
</html>
