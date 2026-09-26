<?php

namespace App\Http\Controllers\Inovator;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PengajuanInovasiController extends Controller
{
    /**
     * Get 17 SDGs master data
     */
    public static function getSdgsList(): array
    {
        return [
            ['no' => 1, 'nama' => 'Tanpa Kemiskinan', 'warna' => 'bg-red-600', 'en' => 'No Poverty'],
            ['no' => 2, 'nama' => 'Tanpa Kelaparan', 'warna' => 'bg-amber-600', 'en' => 'Zero Hunger'],
            ['no' => 3, 'nama' => 'Kehidupan Sehat dan Sejahtera', 'warna' => 'bg-emerald-600', 'en' => 'Good Health and Well-being'],
            ['no' => 4, 'nama' => 'Pendidikan Berkualitas', 'warna' => 'bg-red-700', 'en' => 'Quality Education'],
            ['no' => 5, 'nama' => 'Kesetaraan Gender', 'warna' => 'bg-orange-600', 'en' => 'Gender Equality'],
            ['no' => 6, 'nama' => 'Air Bersih dan Sanitasi Layak', 'warna' => 'bg-cyan-600', 'en' => 'Clean Water and Sanitation'],
            ['no' => 7, 'nama' => 'Energi Bersih dan Terjangkau', 'warna' => 'bg-yellow-500', 'en' => 'Affordable and Clean Energy'],
            ['no' => 8, 'nama' => 'Pekerjaan Layak dan Pertumbuhan Ekonomi', 'warna' => 'bg-rose-700', 'en' => 'Decent Work and Economic Growth'],
            ['no' => 9, 'nama' => 'Industri, Inovasi dan Infrastruktur', 'warna' => 'bg-orange-500', 'en' => 'Industry, Innovation and Infrastructure'],
            ['no' => 10, 'nama' => 'Berkurangnya Kesenjangan', 'warna' => 'bg-pink-600', 'en' => 'Reduced Inequalities'],
            ['no' => 11, 'nama' => 'Kota dan Pemukiman Berkelanjutan', 'warna' => 'bg-amber-500', 'en' => 'Sustainable Cities and Communities'],
            ['no' => 12, 'nama' => 'Konsumsi dan Produksi Bertanggung Jawab', 'warna' => 'bg-yellow-600', 'en' => 'Responsible Consumption and Production'],
            ['no' => 13, 'nama' => 'Penanganan Perubahan Iklim', 'warna' => 'bg-green-700', 'en' => 'Climate Action'],
            ['no' => 14, 'nama' => 'Ekosistem Lautan', 'warna' => 'bg-blue-600', 'en' => 'Life Below Water'],
            ['no' => 15, 'nama' => 'Ekosistem Daratan', 'warna' => 'bg-emerald-700', 'en' => 'Life on Land'],
            ['no' => 16, 'nama' => 'Perdamaian, Keadilan dan Kelembagaan Tangguh', 'warna' => 'bg-blue-800', 'en' => 'Peace, Justice and Strong Institutions'],
            ['no' => 17, 'nama' => 'Kemitraan untuk Mencapai Tujuan', 'warna' => 'bg-indigo-900', 'en' => 'Partnerships for the Goals'],
        ];
    }

    /**
     * Get 20 Indikator BRIDA master data
     */
    public static function getIndikator20List(): array
    {
        return [
            [
                'no' => 1,
                'judul' => '1. REGULASI INOVASI DAERAH',
                'panduan' => [
                    'star1' => 'PERATURAN KEPALA DAERAH/ PERATURAN DAERAH',
                    'star2' => 'SK KEPALA DAERAH',
                    'star3' => 'SK KEPALA PERANGKAT DAERAH',
                ],
            ],
            [
                'no' => 2,
                'judul' => '2. KETERSEDIAAN SDM TERHADAP INOVASI DAERAH',
                'panduan' => [
                    'star1' => 'LEBIH DARI 30',
                    'star2' => '11-30',
                    'star3' => '1-10',
                ],
            ],
            [
                'no' => 3,
                'judul' => '3. Dukungan Anggaran',
                'panduan' => [
                    'star1' => 'ANGGARAN DIALOKASIKAN PADA KEGIATAN PENERAPAN INOVASI DI T-0, T-1 DAN T-2',
                    'star2' => 'ANGGARAN DIALOKASIKAN PADA BOBOT KEGIATAN PENERAPAN INOVASI DI T-1 ATAU T-2',
                    'star3' => 'ANGGARAN DIALOKASIKAN PADA KEGIATAN PENERAPAN INOVASI DI T-0 (TAHUN BERJALAN)',
                ],
            ],
            [
                'no' => 4,
                'judul' => '4. BIMTEK INOVASI',
                'panduan' => [
                    'star1' => 'DALAM 2 TAHUN TERAKHIR PERNAH LEBIH DARI 2 KALI BIMTEK (BIMTEK,TRAINING DAN TOT)',
                    'star2' => 'DALAM 2 TAHUN TERAKHIR PERNAH 2 KALI BIMTEK (BIMTEK, TRAINING DAN TOT)',
                    'star3' => 'DALAM 2 TAHUN TERAKHIR PERNAH 1 KALI KEGIATAN TRANSFER PENGETAHUAN (BIMTEK, SHARING, FGD, ATAU KEGIATAN TRANSFER PENGETAHUAN YANG LAIN)',
                ],
            ],
            [
                'no' => 5,
                'judul' => '5. INTEGRASI PROGRAM DAN KEGIATAN INOVASI DALAM RKPD',
                'panduan' => [
                    'star1' => 'PEMERINTAH DAERAH SUDAH MENUANGKAN PROGRAM INOVASI DAERAH DALAM RKPD T-1, T-2 DAN TO',
                    'star2' => 'PEMERINTAH DAERAH SUDAH MENUANGKAN PROGRAM INOVASI DAERAH DALAM RKPD T-1 DAN T-2',
                    'star3' => 'PEMERINTAH DAERAH SUDAH MENUANGKAN PROGRAM INOVASI DAERAH DALAM RKPD T-1 ATAU T-2',
                ],
            ],
            [
                'no' => 6,
                'judul' => '6. KETERLIBATAN AKTOR INOVASI',
                'panduan' => [
                    'star1' => 'INOVASI MELIBATKAN LEBIH DARI 5 AKTOR',
                    'star2' => 'INOVASI MELIBATKAN LEBIH DARI 4 AKTOR',
                    'star3' => 'INOVASI MELIBATKAN LEBIH DARI 3 AKTOR',
                ],
            ],
            [
                'no' => 7,
                'judul' => '7. PELAKSANA INOVASI DAERAH',
                'panduan' => [
                    'star1' => 'ADA PELAKSANA DAN DITETAPKAN DENGAN SK KEPALA DAERAH',
                    'star2' => 'ADA PELAKSANA DAN DITETAPKAN DENGAN SK KEPALA PERANGKAT DAERAH',
                    'star3' => 'ADA PELAKSANA NAMUN TIDAK DITETAPKAN DENGAN SK KEPALA PERANGKAT DAERAH',
                ],
            ],
            [
                'no' => 8,
                'judul' => '8. JEJARING INOVASI DAERAH',
                'panduan' => [
                    'star1' => 'INOVASI MELIBATKAN 5 ATAU LEBIH PERANGKAT DAERAH',
                    'star2' => 'INOVASI MELIBATKAN 3-4 PERANGKAT DAERAH',
                    'star3' => 'INOVASI MELIBATKAN 1-2 PERANGKAT DAERAH ATAU LEBIH',
                ],
            ],
            [
                'no' => 9,
                'judul' => '9. SOSIALISASI INOVASI DAERAH',
                'panduan' => [
                    'star1' => 'MEDIA BERITA',
                    'star2' => 'KONTEN MELALUI MEDIA SOSIAL',
                    'star3' => 'FOTO KEGIATAN YANG BERLATAR KEGIATAN INOVASI YANG DITERAPKAN',
                ],
            ],
            [
                'no' => 10,
                'judul' => '10. PEDOMAN TEKNIS',
                'panduan' => [
                    'star1' => 'TELAH TERDAPAT PEDOMAN TEKNIS BERUPA BUKU YANG DAPAT DIAKSES SECARA ONLINE',
                    'star2' => 'TELAH TERDAPAT PEDOMAN TEKNIS BERUPA BUKU DALAM BENTUK ELEKTRONIK',
                    'star3' => 'TELAH TERDAPAT PEDOMAN TEKNIS BERUPA MANUAL/ CETAK BUKU',
                ],
            ],
            [
                'no' => 11,
                'judul' => '11. KUANTITAS / JUMLAH MEDIA INFORMASI LAYANAN',
                'panduan' => [
                    'star1' => 'LAYANAN MELALUI 3 MEDIA ATAU LEBIH (3/4 ATAU 4/4)',
                    'star2' => 'LAYANAN MELALUI 2 MEDIA (2/4)',
                    'star3' => 'LAYANAN MELALUI 1 MEDIA (1/4)',
                ],
            ],
            [
                'no' => 12,
                'judul' => '12. KEMUDAHAN PROSES INOVASI YANG DIHASILKAN',
                'panduan' => [
                    'star1' => 'HASIL INOVASI DIPEROLEH DALAM WAKTU 1 HARI',
                    'star2' => 'HASIL INOVASI DIPEROLEH DALAM WAKTU 2-5 HARI',
                    'star3' => 'HASIL INOVASI DIPEROLEH DALAM WAKTU 6 HARI ATAU LEBIH',
                ],
            ],
            [
                'no' => 13,
                'judul' => '13. INTEGRASI LAYANAN',
                'sub_jenis' => true,
                'daring' => [
                    'judul' => 'Layanan Daring (Online / Digital)',
                    'star1' => 'ADA DUKUNGAN MELALUI INFORMASI WEBSITE/SOSIAL MEDIA/WEB APLIKASI/MOBILE (ANDROID/ IOS) YG BERJALAN TERPISAH',
                    'star2' => 'ADA DUKUNGAN MELALUI INFORMASI WEBSITE, SOSIAL MEDIA, WEB APLIKASI/MOBILE (ANDROID/IOS) YG TELAH TERINTEGRASI DALAM SATU PORTAL PADA UNIT ORGANISASI BERSANGKUTAN',
                    'star3' => 'ADA DUKUNGAN MELALUI WEB APLIKASI/MOBILE (ANDROID/IOS) YG LAYANAN SUDAH TERINTEGRASI DGN UNIT ORGANISASI LAIN',
                ],
                'luring' => [
                    'judul' => 'Layanan Luring (Tatap Muka / Fisik)',
                    'star1' => 'LAYANAN INOVASI BERJALAN SECARA TERSENDIRI (MANDIRI/INDEPENDEN)',
                    'star2' => 'LAYANAN TELAH TERINTEGRASI DENGAN LAYANAN LAIN PADA PROGRAM ATAU KEGIATAN LAIN PADA SATU UNIT ORGANISASI ATAU DALAM SATU URUSAN PEMERINTAHAN.',
                    'star3' => 'LAYANAN TELAH TERINTEGRASI DENGAN LAYANAN LAIN PADA PROGRAM ATAU KEGIATAN PADA UNIT ORGANISASI LAIN ATAU DALAM LEBIH DARI SATU URUSAN PEMERINTAHAN.',
                ],
            ],
            [
                'no' => 14,
                'judul' => '14. REPLIKASI',
                'panduan' => [
                    'star1' => 'PERNAH 3 KALI DIREPLIKASI DI DAERAH LAIN YANG BERBEDA',
                    'star2' => 'PERNAH 2 KALI DIREPLIKASI DI DAERAH LAIN YANG BERBEDA',
                    'star3' => 'PERNAH 1 KALI DIREPLIKASI DI DAERAH LAIN YANG BERBEDA',
                ],
            ],
            [
                'no' => 15,
                'judul' => '15. ALAT KERJA',
                'panduan' => [
                    'star1' => 'PELAKSANAAN KERJA SUDAH DIDUKUNG SISTEM INFORMASI ONLINE/ DARING Contoh: pemanfaatan platform media sosial, Al, loT, super-app, dll.',
                    'star2' => 'PELAKSANAAN KERJA DIDUKUNG DENGAN PERANGKAT ELEKTRONIK Contoh: mesin edc, telp.',
                    'star3' => 'PELAKSANAAN KERJA SECARA MANUAL/NON ELEKTRONIK, Contoh: tatap muka/jemput bola/noken',
                ],
            ],
            [
                'no' => 16,
                'judul' => '16. KEMANFAATAN INOVASI DAERAH',
                'panduan' => [
                    'star1' => 'JUMLAH PENGGUNA ATAU PENERIMA MANFAAT 201 ORANG KEATAS / PENINGKATAN JUMLAH UNIT 50 % / EFISIENSI BELANJA SEBESAR 20,1 -30 %/ EFISIENSI BELANJA SEBESAR LEBI DARI SAMA DENGAN 100 % / JUMLAH PRODUK YANG DIHASILKAN ATAU DIPERJUALBELIKAN 201 ORANG ATAU LEBIH',
                    'star2' => 'JUMLAH PENGGUNA ATAU PENERIMA MANFAAT 101-200 ORANG / PENINGKATAN JUMLAH UNIT 20,1- 50 %/ EFISIENSI BELANJA SEBESAR 10,1 -20 % / PENINGKATAN PENDAPATAN SEBESAR 50-99,99 % / JUMLAH PRODUK YANG DIHASILKAN ATAU DIPERJUALBELIKAN 101-200 ORANG',
                    'star3' => 'JUMLAH PENGGUNA ATAU PENERIMA MANFAAT 1-100 ORANG / PENINGKATAN JUMLAH UNIT 5 -20%/ EFISIENSI BELANJA SEBESAR 0,1 -10% / PENINGKATAN PENDAPATAN SEBESAR 0,1 - 49,99 / JUMLAH PRODUK YANG DIHASILKAN ATAU DIPERJUALBELIKAN 1-100 ORANG',
                ],
            ],
            [
                'no' => 17,
                'judul' => '17. KECEPATAN PENCIPTAAN INOVASI DAERAH',
                'panduan' => [
                    'star1' => 'Dampak dirasakan terbatas kelompok internal',
                    'star2' => 'Dampak peningkatan kepuasan & penghematan biaya OPD',
                    'star3' => 'Dampak luas peningkatan PAD / kesejahteraan warga terukur',
                ],
            ],
            [
                'no' => 18,
                'judul' => '18. Kepuasan Pengguna (Survei SKM)',
                'panduan' => [
                    'star1' => 'INOVASI DAPAT DICIPTAKAN DALAM WAKTU 1-4 BULAN',
                    'star2' => 'INOVASI DAPAT DICIPTAKAN DALAM WAKTU 5-8 BULAN',
                    'star3' => 'INOVASI DAPAT DICIPTAKAN DALAM WAKTU 9 BULAN KEATAS',
                ],
            ],
            [
                'no' => 19,
                'judul' => '19. PENYELESAIAN LAYANAN PENGADUAN',
                'panduan' => [
                    'star1' => '≥ 86%',
                    'star2' => '51% S.D. 85%',
                    'star3' => '≤ 50% TIDAK ADA PENGADUAN',
                ],
            ],
            [
                'no' => 20,
                'judul' => '20. MONITORING & EVALUASI INOVASI DAERAH',
                'panduan' => [
                    'star1' => 'Hasil laporan monev eksternal berdasarkan hasil penelitian/kajian/analisis',
                    'star2' => 'Hasil pengukuran kepuasaan pengguna dari evaluasi Survei Kepuasan Masyarakat ',
                    'star3' => 'Hasil laporan monev internal perangkat daerah',
                ],
            ],
            [
                'no' => 21,
                'judul' => '21. KUALITAS INOVASI DAERAH',
                'panduan' => [
                    'star1' => 'Memenuhi 5 unsur substansi',
                    'star2' => 'Memenuhi 3 atau 4 unsur substansi',
                    'star3' => 'Memenuhi 1 atau 2 unsur substansi',
                ],
            ],
        ];
    }

    /**
     * Retrieve or initialize draft data in session
     */
    protected function getDraft(Request $request): array
    {
        $user = Auth::user();
        $defaultOpd = 'Dinas Komunikasi dan Informatika Kota Makassar';

        $draft = $request->session()->get('pengajuan_inovasi_draft', [
            'kategori' => 'Pelayanan Publik',
            'nama_pic' => $user->name ?? '',
            'nip_pic' => '198507142010011008',
            'jabatan_pic' => 'Pranata Komputer Ahli Muda',
            'kontak_pic' => '081234567890',

            'judul_inovasi' => '',
            'waktu_uji_coba' => date('Y-m-d', strtotime('-3 months')),
            'waktu_implementasi' => date('Y-m-d', strtotime('-1 month')),
            'nama_opd' => $defaultOpd,

            'rancang_bangun' => '<p>Jelaskan latar belakang permasalahan di Kota Makassar, urgensi penciptaan inovasi, serta ide kebaruan yang diusung oleh inovasi ini...</p>',
            'tujuan_inovasi' => '<p>1. Mempercepat proses pelayanan birokrasi kepada masyarakat.<br>2. Meningkatkan transparansi dan akuntabilitas kinerja perangkat daerah.<br>3. Mendorong efisiensi waktu dan anggaran operasional.</p>',
            'manfaat_inovasi' => '<p>• <strong>Bagi Masyarakat:</strong> Akses layanan lebih cepat, mudah, dan transparan dari mana saja.<br>• <strong>Bagi Pemerintah Kota:</strong> Ketersediaan data analitik real-time untuk pengambilan kebijakan strategis berbasis bukti.</p>',

            'sdgs' => [3, 9, 11],
            'indikator_files' => [],
            'pakta_integritas' => false,
        ]);

        return $draft;
    }

    /**
     * Redirect root pengajuan to Tahap 1
     */
    public function redirectStart(): RedirectResponse
    {
        return redirect()->route('inovator.pengajuan.tahap1');
    }

    /**
     * Tahap 1: Kategori & PIC
     */
    public function tahap1(Request $request): View
    {
        $draft = $this->getDraft($request);
        $kategoriList = [
            'Pelayanan Publik',
            'Tata Kelola Pemerintahan Daerah',
            'Inovasi Daerah Lainnya sesuai Urusan Pemerintahan',
            'Kesehatan & Kesejahteraan Sosial',
            'Pendidikan, Riset & Kebudayaan',
            'Lingkungan Hidup & Kebersihan',
            'Ekonomi Kreatif, Pariwisata & UMKM',
            'Teknologi Informasi & Smart City',
        ];

        return view('inovator.pengajuan.tahap1', compact('draft', 'kategoriList'));
    }

    public function simpanTahap1(Request $request): RedirectResponse
    {
        $request->validate([
            'kategori' => ['required', 'string'],
            'nama_pic' => ['required', 'string', 'max:255'],
            'nip_pic' => ['required', 'string', 'max:50'],
            'jabatan_pic' => ['required', 'string', 'max:255'],
            'kontak_pic' => ['required', 'string', 'max:50'],
        ]);

        $draft = $this->getDraft($request);
        $draft['kategori'] = $request->input('kategori');
        $draft['nama_pic'] = $request->input('nama_pic');
        $draft['nip_pic'] = $request->input('nip_pic');
        $draft['jabatan_pic'] = $request->input('jabatan_pic');
        $draft['kontak_pic'] = $request->input('kontak_pic');

        $request->session()->put('pengajuan_inovasi_draft', $draft);

        if ($request->input('action') === 'draft') {
            return redirect()->back()->with('status_draft', 'Draft Tahap 1 berhasil disimpan.');
        }

        return redirect()->route('inovator.pengajuan.tahap2')->with('status_draft', 'Tahap 1 tersimpan. Melanjutkan ke Tahap 2.');
    }

    /**
     * Tahap 2: Metadata Inovasi
     */
    public function tahap2(Request $request): View
    {
        $draft = $this->getDraft($request);

        return view('inovator.pengajuan.tahap2', compact('draft'));
    }

    public function simpanTahap2(Request $request): RedirectResponse
    {
        $request->validate([
            'judul_inovasi' => ['required', 'string', 'max:255'],
            'waktu_uji_coba' => ['required', 'date'],
            'waktu_implementasi' => ['required', 'date'],
            'nama_opd' => ['required', 'string', 'max:255'],
        ]);

        $draft = $this->getDraft($request);
        $draft['judul_inovasi'] = $request->input('judul_inovasi');
        $draft['waktu_uji_coba'] = $request->input('waktu_uji_coba');
        $draft['waktu_implementasi'] = $request->input('waktu_implementasi');
        $draft['nama_opd'] = $request->input('nama_opd');

        $request->session()->put('pengajuan_inovasi_draft', $draft);

        if ($request->input('action') === 'draft') {
            return redirect()->back()->with('status_draft', 'Draft Tahap 2 berhasil disimpan.');
        }

        return redirect()->route('inovator.pengajuan.tahap3')->with('status_draft', 'Tahap 2 tersimpan. Melanjutkan ke Tahap 3.');
    }

    /**
     * Tahap 3: Deskripsi Inovasi (Rich Text)
     */
    public function tahap3(Request $request): View
    {
        $draft = $this->getDraft($request);

        return view('inovator.pengajuan.tahap3', compact('draft'));
    }

    public function simpanTahap3(Request $request): RedirectResponse
    {
        $request->validate([
            'rancang_bangun' => ['required', 'string'],
            'tujuan_inovasi' => ['required', 'string'],
            'manfaat_inovasi' => ['required', 'string'],
        ]);

        $draft = $this->getDraft($request);
        $draft['rancang_bangun'] = $request->input('rancang_bangun');
        $draft['tujuan_inovasi'] = $request->input('tujuan_inovasi');
        $draft['manfaat_inovasi'] = $request->input('manfaat_inovasi');

        $request->session()->put('pengajuan_inovasi_draft', $draft);

        if ($request->input('action') === 'draft') {
            return redirect()->back()->with('status_draft', 'Draft Tahap 3 berhasil disimpan.');
        }

        return redirect()->route('inovator.pengajuan.tahap4')->with('status_draft', 'Tahap 3 tersimpan. Melanjutkan ke Tahap 4.');
    }

    /**
     * Tahap 4: Pemetaan SDGs
     */
    public function tahap4(Request $request): View
    {
        $draft = $this->getDraft($request);
        $sdgsList = self::getSdgsList();

        return view('inovator.pengajuan.tahap4', compact('draft', 'sdgsList'));
    }

    public function simpanTahap4(Request $request): RedirectResponse
    {
        $request->validate([
            'sdgs' => ['nullable', 'array'],
            'sdgs.*' => ['integer', 'min:1', 'max:17'],
        ]);

        $draft = $this->getDraft($request);
        $draft['sdgs'] = array_map('intval', $request->input('sdgs', []));

        $request->session()->put('pengajuan_inovasi_draft', $draft);

        if ($request->input('action') === 'draft') {
            return redirect()->back()->with('status_draft', 'Draft Tahap 4 berhasil disimpan.');
        }

        return redirect()->route('inovator.pengajuan.tahap5')->with('status_draft', 'Tahap 4 tersimpan. Melanjutkan ke Tahap 5.');
    }

    /**
     * Tahap 5: Unggah Berkas Bukti Indikator
     */
    public function tahap5(Request $request): View
    {
        $draft = $this->getDraft($request);
        $indikatorList = self::getIndikator20List();

        $isRevisi = $request->boolean('revisi') || $request->has('revisi');
        $inovasiId = $request->input('inovasi_id', 4);
        $revisiList = [];

        if ($isRevisi) {
            // Indikator yang spesifik ditandai salah oleh BRIDA
            $revisiList = [
                1 => 'Dokumen SK belum mencantumkan tanda tangan basah / barcode TTE Kepala Daerah.',
                6 => 'Dokumen MoU kemitraan komunitas belum melampirkan lembar pengesahan resmi.',
            ];

            // Pastikan seluruh dokumen indikator lain sudah berstatus terisi dan valid
            for ($i = 1; $i <= 21; $i++) {
                if (! isset($draft['indikator_files'][$i])) {
                    $draft['indikator_files'][$i] = [
                        'filename' => 'Dokumen_Indikator_'.$i.'_Valid.pdf',
                        'size' => rand(650, 2200).' KB',
                        'uploaded_at' => '05 Sep 2026 11:30',
                    ];
                }
            }
            $request->session()->put('pengajuan_inovasi_draft', $draft);
        } elseif (empty($draft['indikator_files'])) {
            // Sample initial files if empty for demonstration
            $draft['indikator_files'] = [
                1 => ['filename' => 'SK_Walikota_Inovasi_2026.pdf', 'size' => '1.8 MB', 'uploaded_at' => '24 Sep 2026 14:20'],
                2 => ['filename' => 'SK_Tim_Pengelola_OPD.pdf', 'size' => '850 KB', 'uploaded_at' => '24 Sep 2026 14:22'],
            ];
            $request->session()->put('pengajuan_inovasi_draft', $draft);
        }

        return view('inovator.pengajuan.tahap5', compact('draft', 'indikatorList', 'isRevisi', 'revisiList', 'inovasiId'));
    }

    /**
     * AJAX Single PDF Upload per indikator
     */
    public function uploadIndikator(Request $request): JsonResponse
    {
        $request->validate([
            'indikator_no' => ['required', 'integer', 'min:1', 'max:21'],
            'file' => ['required', 'file', 'mimes:pdf', 'max:20480'], // max 20MB
        ]);

        $no = (int) $request->input('indikator_no');
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileSize = round($file->getSize() / 1024, 1).' KB';
        if ($file->getSize() > 1024 * 1024) {
            $fileSize = round($file->getSize() / (1024 * 1024), 2).' MB';
        }

        // Save file to storage
        $storedPath = $file->storeAs('uploads/inovasi/indikator_'.$no, time().'_'.$fileName, 'public');

        $draft = $this->getDraft($request);
        $draft['indikator_files'][$no] = [
            'filename' => $fileName,
            'size' => $fileSize,
            'uploaded_at' => date('d M Y H:i'),
            'path' => $storedPath,
        ];

        $request->session()->put('pengajuan_inovasi_draft', $draft);

        return response()->json([
            'success' => true,
            'message' => 'Berkas indikator '.$no.' berhasil diunggah.',
            'file_info' => $draft['indikator_files'][$no],
        ]);
    }

    /**
     * Simpan Draft Tahap 5
     */
    public function simpanTahap5(Request $request): RedirectResponse
    {
        $draft = $this->getDraft($request);
        $draft['pakta_integritas'] = (bool) $request->has('pakta_integritas');
        $request->session()->put('pengajuan_inovasi_draft', $draft);

        return redirect()->back()->with('status_draft', 'Draft Tahap 5 berhasil disimpan.');
    }

    /**
     * Kirim Pengajuan Final ke BRIDA
     */
    public function kirimFinal(Request $request): RedirectResponse
    {
        $request->validate([
            'pakta_integritas' => ['accepted'],
        ], [
            'pakta_integritas.accepted' => 'Anda wajib menyetujui pernyataan konfirmasi pakta integritas sebelum mengirim pengajuan evaluasi.',
        ]);

        $draft = $this->getDraft($request);
        $draft['status'] = 'Validasi BRIDA';
        $draft['submitted_at'] = now();

        // Di sini nantinya tersimpan ke tabel Database `inovasis`.
        // Untuk saat ini simpan status di session dan redirect ke dashboard inovator.
        $request->session()->flash('success_pengajuan', 'Pengajuan inovasi "'.($draft['judul_inovasi'] ?: 'Inovasi Baru').'" berhasil dikirim ke BRIDA Kota Makassar! Sistem AI sedang memproses analisis indikator.');

        return redirect()->route('inovator.dashboard');
    }
}
