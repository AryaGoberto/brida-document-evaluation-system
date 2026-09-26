<?php

namespace App\Http\Controllers\Inovator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InovasiController extends Controller
{
    /**
     * Data master 21 indikator dengan bobot standar evaluasi BRIDA & Kemendagri
     */
    public static function getBobotIndikatorList(): array
    {
        return [
            1 => ['no' => 1, 'judul' => '1. REGULASI INOVASI DAERAH', 'bobot' => 3.0],
            2 => ['no' => 2, 'judul' => '2. KETERSEDIAAN SDM TERHADAP INOVASI DAERAH', 'bobot' => 2.0],
            3 => ['no' => 3, 'judul' => '3. Dukungan Anggaran', 'bobot' => 2.0],
            4 => ['no' => 4, 'judul' => '4. BIMTEK INOVASI', 'bobot' => 1.0],
            5 => ['no' => 5, 'judul' => '5. INTEGRASI PROGRAM DAN KEGIATAN INOVASI DALAM RKPD', 'bobot' => 2.0],
            6 => ['no' => 6, 'judul' => '6. KETERLIBATAN AKTOR INOVASI', 'bobot' => 1.0],
            7 => ['no' => 7, 'judul' => '7. PELAKSANA INOVASI DAERAH', 'bobot' => 1.0],
            8 => ['no' => 8, 'judul' => '8. JEJARING INOVASI DAERAH', 'bobot' => 1.0],
            9 => ['no' => 9, 'judul' => '9. SOSIALISASI INOVASI DAERAH', 'bobot' => 1.0],
            10 => ['no' => 10, 'judul' => '10. PEDOMAN TEKNIS', 'bobot' => 1.0],
            11 => ['no' => 11, 'judul' => '11. KUANTITAS / JUMLAH MEDIA INFORMASI LAYANAN', 'bobot' => 1.0],
            12 => ['no' => 12, 'judul' => '12. KEMUDAHAN PROSES INOVASI YANG DIHASILKAN', 'bobot' => 2.0],
            13 => ['no' => 13, 'judul' => '13. INTEGRASI LAYANAN', 'bobot' => 2.0],
            14 => ['no' => 14, 'judul' => '14. REPLIKASI', 'bobot' => 3.0],
            15 => ['no' => 15, 'judul' => '15. ALAT KERJA', 'bobot' => 2.0],
            16 => ['no' => 16, 'judul' => '16. KEMANFAATAN INOVASI DAERAH', 'bobot' => 3.0],
            17 => ['no' => 17, 'judul' => '17. KECEPATAN PENCIPTAAN INOVASI DAERAH', 'bobot' => 2.0],
            18 => ['no' => 18, 'judul' => '18. Kepuasan Pengguna (Survei SKM)', 'bobot' => 1.0],
            19 => ['no' => 19, 'judul' => '19. PENYELESAIAN LAYANAN PENGADUAN', 'bobot' => 2.0],
            20 => ['no' => 20, 'judul' => '20. MONITORING & EVALUASI INOVASI DAERAH', 'bobot' => 2.0],
            21 => ['no' => 21, 'judul' => '21. KUALITAS INOVASI DAERAH', 'bobot' => 4.0],
        ];
    }

    /**
     * Menampilkan Halaman Detail & Evaluasi Inovasi
     */
    public function show(int $id, Request $request): View
    {
        // Dataset contoh inovasi realistis
        $daftarInovasi = [
            4 => [
                'id' => 4,
                'judul' => 'Sistem Pengaduan Kebersihan Lingkungan (SIPASSA)',
                'kategori' => 'Kebersihan & Lingkungan Hidup',
                'opd' => 'Dinas Lingkungan Hidup Kota Makassar',
                'status' => 'Revisi Diperlukan',
                'status_type' => 'revisi',
                'tanggal_pengajuan' => '05 September 2026',
                'tanggal_evaluasi' => '22 September 2026',
                'pic' => [
                    'nama' => 'Ir. Andi Bau Massepe, M.Si',
                    'nip' => '197904122005011006',
                    'jabatan' => 'Kepala Bidang Pengelolaan Sampah & Limbah B3',
                    'kontak' => '081144238910',
                ],
                'jadwal' => [
                    'uji_coba' => '10 Februari 2026',
                    'implementasi' => '01 Mei 2026',
                ],
                'deskripsi' => [
                    'rancang_bangun' => '<p>SIPASSA merupakan platform partisipasi publik berbasis web dan WhatsApp bot yang memungkinkan warga Kota Makassar melaporkan titik tumpukan sampah liar secara geotagging real-time. Sistem ini mengintegrasikan armada truk sampah kebersihan kecamatan dengan pantauan dashboard komando Dinas Lingkungan Hidup.</p>',
                    'tujuan' => '<p>1. Memangkas waktu respons pengangkutan sampah liar dari rata-rata 3 hari menjadi kurang dari 4 jam.<br>2. Mengoptimalkan rute bahan bakar armada operasional kebersihan.<br>3. Mendorong kesadaran pemilahan sampah organik dan anorganik dari tingkat RT/RW.</p>',
                    'manfaat' => '<p>• <strong>Bagi Warga:</strong> Kepastian tindak lanjut aduan dengan notifikasi foto sebelum & sesudah pembersihan.<br>• <strong>Bagi Pemkot Makassar:</strong> Penghematan biaya bahan bakar armada sebesar 22% dan peningkatan skor Adipura Kota.</p>',
                ],
                'sdgs' => [
                    ['no' => 3, 'nama' => 'Kehidupan Sehat dan Sejahtera', 'warna' => 'bg-emerald-600'],
                    ['no' => 11, 'nama' => 'Kota dan Pemukiman Berkelanjutan', 'warna' => 'bg-amber-500'],
                    ['no' => 12, 'nama' => 'Konsumsi dan Produksi Bertanggung Jawab', 'warna' => 'bg-yellow-600'],
                    ['no' => 13, 'nama' => 'Penanganan Perubahan Iklim', 'warna' => 'bg-green-700'],
                ],
                'feedback' => [
                    'ai' => [
                        'ringkasan' => 'Analisis AI mendeteksi 2 ketidaksesuaian dokumen bukti dukung:',
                        'catatan' => [
                            'Indikator 1 (Regulasi): Dokumen SK yang diunggah belum mencantumkan tanda tangan basah / barcode TTE Kepala Daerah.',
                            'Indikator 6 (Keterlibatan Aktor): Dokumen MoU kolaborasi komunitas bank sampah belum melampirkan lembar pengesahan resmi.',
                        ],
                        'skor_prediksi' => 64.8,
                    ],
                    'evaluator' => [
                        'nama' => 'Drs. H. M. Rusli, M.Si (Tim Evaluator BRIDA)',
                        'tanggal' => '22 Sep 2026 15:45 WITA',
                        'catatan' => 'Proposal inovasi SIPASSA sangat prospektif dan berdampak langsung ke masyarakat. Namun berkas dikembalikan untuk REVISI pada Indikator 1 dan 6. Silakan unggah ulang dokumen perbaikan melalui tombol [Perbaiki Berkas] sebelum 30 September 2026 agar dapat diteruskan ke tahap penetapan akhir.',
                    ],
                ],
                'indikator_penilaian' => [
                    1 => ['bintang' => 1, 'catatan' => 'Skor diturunkan ke Bintang 1: Dokumen SK belum ditandatangani Kepala Daerah.', 'perlu_revisi' => true],
                    2 => ['bintang' => 2, 'catatan' => 'Ketersediaan SDM memadai (22 orang personil).', 'perlu_revisi' => false],
                    3 => ['bintang' => 2, 'catatan' => 'Terdapat DPA tahun anggaran 2026.', 'perlu_revisi' => false],
                    4 => ['bintang' => 2, 'catatan' => 'Bimtek terlaksana 2 kali dalam 2 tahun terakhir.', 'perlu_revisi' => false],
                    5 => ['bintang' => 2, 'catatan' => 'Tercantum dalam dokumen RKPD T-1 dan T-2.', 'perlu_revisi' => false],
                    6 => ['bintang' => 1, 'catatan' => 'Skor diturunkan: Lembar MoU kemitraan bank sampah belum disahkan.', 'perlu_revisi' => true],
                    7 => ['bintang' => 2, 'catatan' => 'Struktur penugasan tim pelaksana jelas dalam SK Kepala Perangkat Daerah.', 'perlu_revisi' => false],
                    8 => ['bintang' => 2, 'catatan' => 'Inovasi melibatkan 4 perangkat daerah terkait.', 'perlu_revisi' => false],
                    9 => ['bintang' => 2, 'catatan' => 'Sosialisasi aktif melalui konten media sosial.', 'perlu_revisi' => false],
                    10 => ['bintang' => 2, 'catatan' => 'Terdapat pedoman teknis berupa buku elektronik.', 'perlu_revisi' => false],
                    11 => ['bintang' => 2, 'catatan' => 'Layanan informasi melalui 2 media (aplikasi web dan WA bot).', 'perlu_revisi' => false],
                    12 => ['bintang' => 3, 'catatan' => 'Hasil layanan inovasi diperoleh dalam waktu 1 hari.', 'perlu_revisi' => false],
                    13 => ['bintang' => 2, 'catatan' => 'Layanan daring telah terintegrasi dalam satu portal unit organisasi.', 'perlu_revisi' => false],
                    14 => ['bintang' => 2, 'catatan' => 'Pernah 2 kali direplikasi di daerah lain yang berbeda.', 'perlu_revisi' => false],
                    15 => ['bintang' => 3, 'catatan' => 'Pelaksanaan kerja sudah didukung sistem informasi online/daring.', 'perlu_revisi' => false],
                    16 => ['bintang' => 2, 'catatan' => 'Penerima manfaat mencapai 185 orang dengan efisiensi belanja.', 'perlu_revisi' => false],
                    17 => ['bintang' => 2, 'catatan' => 'Dampak peningkatan kepuasan & penghematan biaya OPD terukur.', 'perlu_revisi' => false],
                    18 => ['bintang' => 2, 'catatan' => 'Inovasi dapat diciptakan dalam rentang waktu 6 bulan.', 'perlu_revisi' => false],
                    19 => ['bintang' => 2, 'catatan' => 'Tingkat penyelesaian layanan pengaduan mencapai 75%.', 'perlu_revisi' => false],
                    20 => ['bintang' => 2, 'catatan' => 'Hasil pengukuran kepuasan pengguna dari evaluasi Survei Kepuasan Masyarakat.', 'perlu_revisi' => false],
                    21 => ['bintang' => 2, 'catatan' => 'Memenuhi 4 unsur substansi kualitas inovasi daerah.', 'perlu_revisi' => false],
                ],
            ],
            1 => [
                'id' => 1,
                'judul' => 'Sistem Antrean Puskesmas Digital (SAPA Sehat)',
                'kategori' => 'Pelayanan Publik & Kesehatan',
                'opd' => 'Dinas Kesehatan Kota Makassar',
                'status' => 'Validasi BRIDA',
                'status_type' => 'validasi',
                'tanggal_pengajuan' => '20 September 2026',
                'tanggal_evaluasi' => '24 September 2026',
                'pic' => [
                    'nama' => 'dr. Hj. Ratna Sari Dewi, M.Kes',
                    'nip' => '198203152008042003',
                    'jabatan' => 'Kepala Seksi Pelayanan Kesehatan Primer',
                    'kontak' => '081242339900',
                ],
                'jadwal' => [
                    'uji_coba' => '15 Januari 2026',
                    'implementasi' => '01 April 2026',
                ],
                'deskripsi' => [
                    'rancang_bangun' => '<p>SAPA Sehat mendigitalisasi antrean di 47 Puskesmas se-Kota Makassar terhubung dengan nomor NIK kependudukan dan integrasi BPJS Mobile JKN.</p>',
                    'tujuan' => '<p>Mengeliminasi penumpukan pasien di ruang tunggu fasilitas kesehatan primer dan memberikan estimasi waktu kedatangan yang akurat.</p>',
                    'manfaat' => '<p>Waktu tunggu berkurang dari 120 menit menjadi rata-rata 25 menit per kunjungan poli.</p>',
                ],
                'sdgs' => [
                    ['no' => 3, 'nama' => 'Kehidupan Sehat dan Sejahtera', 'warna' => 'bg-emerald-600'],
                    ['no' => 9, 'nama' => 'Industri, Inovasi dan Infrastruktur', 'warna' => 'bg-orange-500'],
                ],
                'feedback' => [
                    'ai' => [
                        'ringkasan' => 'Analisis AI memvalidasi seluruh berkas 21 indikator lengkap dengan probabilitas orisinalitas 98.2%.',
                        'catatan' => [
                            'Kelengkapan berkas memenuhi ambang batas bintang 2 dan bintang 3.',
                        ],
                        'skor_prediksi' => 87.5,
                    ],
                    'evaluator' => [
                        'nama' => 'Tim Verifikator BRIDA Makassar',
                        'tanggal' => '24 Sep 2026 10:15 WITA',
                        'catatan' => 'Dokumen sedang dalam proses sidang pleno penilai BRIDA. Tidak ada tindakan sanggahan yang dibutuhkan saat ini.',
                    ],
                ],
                'indikator_penilaian' => array_fill(1, 21, ['bintang' => 2, 'catatan' => 'Tervalidasi sesuai syarat.', 'perlu_revisi' => false]),
            ],
            3 => [
                'id' => 3,
                'judul' => 'Lorong Wisata Cerdas Berbasis Komunitas (Longwis Smart)',
                'kategori' => 'Pariwisata & Ekonomi Kreatif',
                'opd' => 'Dinas Pariwisata Kota Makassar',
                'status' => 'Selesai',
                'status_type' => 'selesai',
                'tanggal_pengajuan' => '10 September 2026',
                'tanggal_evaluasi' => '18 September 2026',
                'pic' => [
                    'nama' => 'Muhammad Yusuf, S.STP., M.AP',
                    'nip' => '198401102007011002',
                    'jabatan' => 'Kepala Bidang Pengembangan Destinasi Wisata',
                    'kontak' => '081355442211',
                ],
                'jadwal' => [
                    'uji_coba' => '01 November 2025',
                    'implementasi' => '15 Januari 2026',
                ],
                'deskripsi' => [
                    'rancang_bangun' => '<p>Pengembangan sistem katalog digital QR Code dan virtual tour untuk 1.000 lorong wisata di Kota Makassar.</p>',
                    'tujuan' => '<p>Mendorong perputaran ekonomi UMKM lorong berbasis kuliner lokal dan kerajinan kreatif.</p>',
                    'manfaat' => '<p>Peningkatan omzet pelaku usaha lorong sebesar 45% dan kunjungan turis domestik.</p>',
                ],
                'sdgs' => [
                    ['no' => 8, 'nama' => 'Pekerjaan Layak dan Pertumbuhan Ekonomi', 'warna' => 'bg-rose-700'],
                    ['no' => 11, 'nama' => 'Kota dan Pemukiman Berkelanjutan', 'warna' => 'bg-amber-500'],
                ],
                'feedback' => [
                    'ai' => [
                        'ringkasan' => 'Evaluasi AI memberikan skor kematangan Sangat Inovatif (94.2/100).',
                        'catatan' => [
                            'Seluruh bukti dukung dan kemanfaatan ekonomi terverifikasi akurat.',
                        ],
                        'skor_prediksi' => 94.2,
                    ],
                    'evaluator' => [
                        'nama' => 'Kepala BRIDA Kota Makassar',
                        'tanggal' => '18 Sep 2026 14:00 WITA',
                        'catatan' => 'Inovasi dinyatakan lolos final dengan predikat SANGAT INOVATIF dan direkomendasikan untuk mewakili Kota Makassar pada IGA Kemendagri 2026.',
                    ],
                ],
                'indikator_penilaian' => array_fill(1, 21, ['bintang' => 3, 'catatan' => 'Memenuhi syarat bintang 3 maksimal.', 'perlu_revisi' => false]),
            ],
        ];

        // Jika ID belum terdaftar di dataset, buat fallback data dinamis berdasarkan ID
        $inovasi = $daftarInovasi[$id] ?? [
            'id' => $id,
            'judul' => 'Inovasi Daerah Layanan Terpadu #' . $id,
            'kategori' => 'Pelayanan Publik',
            'opd' => 'Perangkat Daerah Kota Makassar',
            'status' => 'Validasi BRIDA',
            'status_type' => 'validasi',
            'tanggal_pengajuan' => date('d F Y', strtotime('-5 days')),
            'tanggal_evaluasi' => date('d F Y', strtotime('-1 days')),
            'pic' => [
                'nama' => 'Budi Santoso, S.Kom., M.Si',
                'nip' => '198501012010011001',
                'jabatan' => 'Pranata Komputer Ahli Muda',
                'kontak' => '081234567890',
            ],
            'jadwal' => [
                'uji_coba' => date('d F Y', strtotime('-4 months')),
                'implementasi' => date('d F Y', strtotime('-2 months')),
            ],
            'deskripsi' => [
                'rancang_bangun' => '<p>Inovasi ini dirancang untuk menyelesaikan hambatan pelayanan publik melalui digitalisasi proses terpadu.</p>',
                'tujuan' => '<p>Meningkatkan efisiensi dan transparansi pelayanan publik.</p>',
                'manfaat' => '<p>Mempercepat waktu pelayanan dan mempermudah akses warga.</p>',
            ],
            'sdgs' => [
                ['no' => 9, 'nama' => 'Industri, Inovasi dan Infrastruktur', 'warna' => 'bg-orange-500'],
                ['no' => 11, 'nama' => 'Kota dan Pemukiman Berkelanjutan', 'warna' => 'bg-amber-500'],
            ],
            'feedback' => [
                'ai' => [
                    'ringkasan' => 'Dokumen inovasi sedang dalam antrean verifikasi komparatif model AI BRIDA.',
                    'catatan' => ['Pengecekan orisinalitas dokumen sedang berlangsung.'],
                    'skor_prediksi' => 78.0,
                ],
                'evaluator' => [
                    'nama' => 'Tim Verifikator BRIDA',
                    'tanggal' => date('d M Y H:i'),
                    'catatan' => 'Berkas pengajuan telah diterima lengkap dan dijadwalkan dalam agenda validasi tim evaluator.',
                ],
            ],
            'indikator_penilaian' => array_fill(1, 21, ['bintang' => 2, 'catatan' => 'Sesuai indikator dasar.', 'perlu_revisi' => false]),
        ];

        // Master 21 indikator dengan bobot
        $masterIndikator = self::getBobotIndikatorList();

        // Hitung total skor dari penilaian (Bintang x Bobot)
        $totalSkor = 0;
        $totalBobot = 0;
        $indikatorDetail = [];
        $adaRevisi = false;
        $jumlahPerluRevisi = 0;

        foreach ($masterIndikator as $no => $m) {
            $penilaian = $inovasi['indikator_penilaian'][$no] ?? ['bintang' => 2, 'catatan' => 'Valid', 'perlu_revisi' => false];
            $bintang = $penilaian['bintang'];
            $bobot = $m['bobot'];
            $skorIndikator = $bintang * $bobot;

            $totalSkor += $skorIndikator;
            $totalBobot += (3 * $bobot); // Skor maksimal jika semua 3 bintang

            if (!empty($penilaian['perlu_revisi'])) {
                $adaRevisi = true;
                $jumlahPerluRevisi++;
            }

            $indikatorDetail[$no] = [
                'no' => $no,
                'judul' => $m['judul'],
                'bobot' => $bobot,
                'bintang' => $bintang,
                'skor' => $skorIndikator,
                'skor_maksimal' => 3 * $bobot,
                'catatan' => $penilaian['catatan'],
                'perlu_revisi' => $penilaian['perlu_revisi'],
            ];
        }

        // Normalisasi skor ke skala 100
        $persentaseSkor = $totalBobot > 0 ? round(($totalSkor / $totalBobot) * 100, 1) : 0;

        return view('inovator.inovasi.detail', compact(
            'inovasi',
            'indikatorDetail',
            'totalSkor',
            'persentaseSkor',
            'adaRevisi',
            'jumlahPerluRevisi'
        ));
    }
}
