<?php

namespace App\Http\Controllers\Evaluator;

use App\Http\Controllers\Controller;
use App\Models\Inovasi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan Dasbor Utama Evaluator BRIDA
     * Mengambil metrik kinerja dan daftar tugas prioritas secara dinamis dari database.
     */
    public function index(Request $request): View
    {
        $hasData = Inovasi::count() > 0;

        // Hitung metrik dinamis dari tabel inovasis (fallback ke nilai standar jika db masih kosong)
        $countMenunggu = $hasData ? Inovasi::whereIn('status', ['butuh_validasi', 'sedang_diverifikasi'])->count() : 14;
        $countProsesAi = $hasData ? Inovasi::where('status', 'proses_ai')->count() : 6;
        $countSelesai  = $hasData ? Inovasi::where('status', 'selesai')->count() : 42;
        $countRevisi   = $hasData ? Inovasi::where('status', 'revisi')->count() : 5;

        // Widget Metrik Kinerja Verifikator
        $metrics = [
            'menunggu_verifikasi' => [
                'count'   => $countMenunggu,
                'label'   => 'Menunggu Verifikasi',
                'subtext' => 'Berkas siap diverifikasi manusia',
                'trend'   => 'up',
                'badge'   => 'Perlu Tindakan Segera',
                'color'   => 'amber',
            ],
            'sedang_proses_ai' => [
                'count'   => $countProsesAi,
                'label'   => 'Sedang Diproses AI',
                'subtext' => 'Analisis OCR & bukti 21 indikator',
                'trend'   => 'neutral',
                'badge'   => 'Otomasi Berjalan',
                'color'   => 'indigo',
            ],
            'verifikasi_selesai' => [
                'count'   => $countSelesai,
                'label'   => 'Verifikasi Selesai',
                'subtext' => 'Tervalidasi & terbit berita acara',
                'trend'   => 'up',
                'badge'   => 'Tercapai',
                'color'   => 'emerald',
            ],
            'dokumen_revisi' => [
                'count'   => $countRevisi,
                'label'   => 'Dokumen Dikembalikan (Revisi)',
                'subtext' => 'Menunggu perbaikan dokumen OPD',
                'trend'   => 'down',
                'badge'   => 'Dalam Masa Sanggah',
                'color'   => 'rose',
            ],
        ];

        // Daftar Tugas Prioritas (Task Inbox): 5-10 pengajuan yang selesai dinilai AI dan siap diverifikasi
        $inboxRecords = Inovasi::whereIn('status', ['butuh_validasi', 'sedang_diverifikasi', 'revisi'])
            ->latest('updated_at')
            ->take(10)
            ->get();

        if ($inboxRecords->isEmpty()) {
            $taskInbox = [
                [
                    'id'             => 1,
                    'kode'           => 'BRD-2026-0041',
                    'judul'          => 'Sistem Antrean Puskesmas Digital (SAPA Sehat)',
                    'opd'            => 'Dinas Kesehatan Kota Makassar',
                    'kategori'       => 'Pelayanan Publik & Kesehatan',
                    'tanggal_submit' => '20 Sep 2026',
                    'waktu_tunggu'   => '1 hari lalu',
                    'prioritas'      => 'Tinggi',
                    'ai'             => [
                        'skor'               => 87.5,
                        'predikat'           => 'Sangat Inovatif',
                        'probabilitas_valid' => 98.2,
                        'catatan'            => 'Berkas 21 indikator lengkap. TTE dan SK Walikota terverifikasi valid.',
                        'status_ai'          => 'Selesai',
                    ],
                ],
                [
                    'id'             => 4,
                    'kode'           => 'BRD-2026-0038',
                    'judul'          => 'Sistem Pengaduan Kebersihan Lingkungan (SIPASSA)',
                    'opd'            => 'Dinas Lingkungan Hidup Kota Makassar',
                    'kategori'       => 'Kebersihan & Lingkungan Hidup',
                    'tanggal_submit' => '19 Sep 2026',
                    'waktu_tunggu'   => '2 hari lalu',
                    'prioritas'      => 'Tinggi',
                    'ai'             => [
                        'skor'               => 74.0,
                        'predikat'           => 'Inovatif',
                        'probabilitas_valid' => 91.5,
                        'catatan'            => 'Catatan revisi: SK belum mencantumkan tanda tangan basah / TTE.',
                        'status_ai'          => 'Selesai',
                    ],
                ],
            ];
        } else {
            $taskInbox = $inboxRecords->map(function (Inovasi $item) {
                $isHighPriority = ($item->skor_ai_total ?? 0) >= 80;
                return [
                    'id'             => $item->id,
                    'kode'           => $item->kode_registrasi,
                    'judul'          => $item->judul_inovasi,
                    'opd'            => $item->nama_opd,
                    'kategori'       => $item->kategori,
                    'tanggal_submit' => $item->tanggal_pengajuan,
                    'waktu_tunggu'   => $item->submitted_at ? $item->submitted_at->diffForHumans() : 'Baru saja',
                    'prioritas'      => $isHighPriority ? 'Tinggi' : 'Sedang',
                    'ai'             => [
                        'skor'               => $item->skor_ai_total ?? 0.0,
                        'predikat'           => $item->predikat_ai ?? ($item->status === 'revisi' ? 'Perlu Revisi' : 'Inovatif'),
                        'probabilitas_valid' => 95.5,
                        'catatan'            => $item->catatan_ai ?? ($item->catatan_revisi_umum ?? 'Dokumen siap diverifikasi.'),
                        'status_ai'          => 'Selesai',
                    ],
                ];
            })->toArray();
        }

        // Log Aktivitas Verifikasi Terbaru
        $recentActivities = [
            [
                'tipe'      => 'approve',
                'evaluator' => 'Dr. H. Ruslan, M.Si',
                'aksi'      => 'Menyetujui telaah',
                'inovasi'   => 'Sistem Antrean Puskesmas Digital (SAPA Sehat)',
                'waktu'     => '15 menit lalu',
                'skor'      => '87.5 / 111',
            ],
            [
                'tipe'      => 'revision',
                'evaluator' => 'Andi Syahrir, S.Kom., M.T',
                'aksi'      => 'Meminta perbaikan dokumen',
                'inovasi'   => 'Sistem Pengaduan Kebersihan Lingkungan (SIPASSA)',
                'waktu'     => '1 jam lalu',
                'skor'      => '74.0 / 111',
            ],
            [
                'tipe'      => 'inspect',
                'evaluator' => 'Sistem AI BRIDA',
                'aksi'      => 'Selesai analisis OCR 21 indikator',
                'inovasi'   => 'E-Tax Retribusi Pasar Tradisional Digital',
                'waktu'     => '2 jam lalu',
                'skor'      => '88.0 / 111',
            ],
        ];

        return view('evaluator.dashboard', compact('metrics', 'taskInbox', 'recentActivities'));
    }
}
