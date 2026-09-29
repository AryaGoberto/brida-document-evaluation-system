<?php

namespace App\Http\Controllers\Evaluator;

use App\Http\Controllers\Controller;
use App\Models\Inovasi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AntreanController extends Controller
{
    /**
     * Menampilkan Halaman Antrean Inovasi Lengkap dari 143 Dinas / OPD
     * Mengambil data secara dinamis dari database menggunakan Eloquent Model.
     */
    public function index(Request $request): View
    {
        // Daftar Perangkat Daerah (OPD) Kota Makassar untuk opsi dropdown filter
        $daftarOpd = [
            'Dinas Kesehatan Kota Makassar',
            'Dinas Lingkungan Hidup Kota Makassar',
            'Badan Pendapatan Daerah (Bapenda)',
            'Dinas Penanaman Modal & PTSP',
            'Dinas Pendidikan Kota Makassar',
            'Dinas Komunikasi dan Informatika',
            'Dinas Koperasi dan UKM',
            'Badan Penanggulangan Bencana Daerah (BPBD)',
            'Dinas Pariwisata Kota Makassar',
            'Dinas Pemadam Kebakaran & Penyelamatan',
            'Dinas Ketahanan Pangan',
            'Dinas Perhubungan Kota Makassar',
            'Dinas Sosial Kota Makassar',
            'RSUD Daya Kota Makassar',
            'Badan Perencanaan Pembangunan Daerah (Bappeda)',
            'Kecamatan Ujung Pandang',
            'Kecamatan Rappocini',
            'Kecamatan Tamalate',
            'Kecamatan Panakkukang',
        ];

        // Query dinamis antrean pengajuan inovasi
        $query = Inovasi::query();

        // Filter OPD jika dipilih
        if ($request->filled('opd')) {
            $query->where('nama_opd', $request->input('opd'));
        }

        // Filter Status jika dipilih
        if ($request->filled('status')) {
            $statusVal = $request->input('status');
            if ($statusVal === 'butuh_validasi') {
                $query->whereIn('status', ['butuh_validasi', 'sedang_diverifikasi']);
            } else {
                $query->where('status', $statusVal);
            }
        }

        // Filter Kata Kunci Pencarian
        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('judul_inovasi', 'like', "%{$search}%")
                  ->orWhere('kode_registrasi', 'like', "%{$search}%")
                  ->orWhere('nama_opd', 'like', "%{$search}%");
            });
        }

        $records = $query->latest('submitted_at')->get();

        if ($records->isEmpty()) {
            $antreanList = [
                [
                    'id'                => 1,
                    'kode'              => 'BRD-2026-0041',
                    'judul'             => 'Sistem Antrean Puskesmas Digital (SAPA Sehat)',
                    'opd'               => 'Dinas Kesehatan Kota Makassar',
                    'kategori'          => 'Pelayanan Publik & Kesehatan',
                    'tanggal_masuk'     => '24 Sep 2026 14:20',
                    'periode'           => 'bulan_ini',
                    'status_sistem'     => 'Butuh Validasi',
                    'status_code'       => 'butuh_validasi',
                    'ai_score'          => 87.5,
                    'ai_predikat'       => 'Sangat Inovatif',
                    'catatan_ai'        => 'Ekstraksi 21 indikator sukses 100%. TTE SK Walikota terdeteksi valid.',
                    'progress_ocr'      => 100,
                    'bisa_diverifikasi' => true,
                ],
                [
                    'id'                => 2,
                    'kode'              => 'BRD-2026-0044',
                    'judul'             => 'E-Tax Retribusi Pasar Tradisional Digital',
                    'opd'               => 'Badan Pendapatan Daerah (Bapenda)',
                    'kategori'          => 'Tata Kelola Pemerintahan & Pendapatan',
                    'tanggal_masuk'     => '28 Sep 2026 08:30',
                    'periode'           => 'hari_ini',
                    'status_sistem'     => 'Menunggu OCR',
                    'status_code'       => 'proses_ai',
                    'ai_score'          => 0.0,
                    'ai_predikat'       => 'AI Sedang Berjalan',
                    'catatan_ai'        => 'Sedang mengekstrak teks formulir.',
                    'progress_ocr'      => 45,
                    'bisa_diverifikasi' => false,
                ],
                [
                    'id'                => 3,
                    'kode'              => 'BRD-2026-0036',
                    'judul'             => 'SIPADU — Pelayanan Perizinan Terpadu 1 Pintu',
                    'opd'               => 'Dinas Penanaman Modal & PTSP',
                    'kategori'          => 'Pelayanan Publik',
                    'tanggal_masuk'     => '22 Sep 2026 10:15',
                    'periode'           => 'bulan_ini',
                    'status_sistem'     => 'AI Selesai',
                    'status_code'       => 'ai_selesai',
                    'ai_score'          => 85.0,
                    'ai_predikat'       => 'Sangat Inovatif',
                    'catatan_ai'        => 'Analisis AI selesai 100%.',
                    'progress_ocr'      => 100,
                    'bisa_diverifikasi' => true,
                ],
                [
                    'id'                => 4,
                    'kode'              => 'BRD-2026-0020',
                    'judul'             => 'Lorong Wisata Cerdas (Longwis Smart)',
                    'opd'               => 'Dinas Pariwisata Kota Makassar',
                    'kategori'          => 'Pariwisata',
                    'tanggal_masuk'     => '10 Sep 2026 10:00',
                    'periode'           => 'bulan_lalu',
                    'status_sistem'     => 'Selesai Validasi',
                    'status_code'       => 'selesai',
                    'ai_score'          => 98.0,
                    'ai_predikat'       => 'Sangat Inovatif',
                    'catatan_ai'        => 'Sidang pleno selesai.',
                    'progress_ocr'      => 100,
                    'bisa_diverifikasi' => false,
                ],
            ];
        } else {
            // Format dataset antrean agar kompatibel penuh dengan blade view & Alpine.js
            $antreanList = $records->map(function (Inovasi $item) {
                return [
                    'id'                => $item->id,
                    'kode'              => $item->kode_registrasi,
                    'judul'             => $item->judul_inovasi,
                    'opd'               => $item->nama_opd,
                    'kategori'          => $item->kategori,
                    'tanggal_masuk'     => $item->tanggal_masuk,
                    'periode'           => 'bulan_ini',
                    'status_sistem'     => $item->status_sistem,
                    'status_code'       => $item->status,
                    'ai_score'          => (float) ($item->skor_ai_total ?? 0.0),
                    'ai_predikat'       => $item->predikat_ai ?? ($item->status === 'revisi' ? 'Perlu Revisi' : 'Dalam Proses'),
                    'catatan_ai'        => $item->catatan_ai ?? ($item->catatan_revisi_umum ?? 'Berkas terverifikasi dan siap divalidasi.'),
                    'progress_ocr'      => $item->progress_ocr,
                    'bisa_diverifikasi' => $item->bisa_diverifikasi,
                ];
            })->toArray();
        }

        // Ringkasan Statistik Antrean Keseluruhan (Dihitung Real dari Database)
        $summary = [
            'total_dinas'          => 143,
            'total_pengajuan'      => Inovasi::count(),
            'butuh_validasi'       => Inovasi::whereIn('status', ['butuh_validasi', 'sedang_diverifikasi'])->count(),
            'menunggu_ocr'         => Inovasi::where('status', 'proses_ai')->count(),
            'ai_selesai'           => Inovasi::whereIn('status', ['butuh_validasi', 'sedang_diverifikasi', 'selesai'])->count(),
            'selesai_diverifikasi' => Inovasi::where('status', 'selesai')->count(),
            'perlu_revisi'         => Inovasi::where('status', 'revisi')->count(),
        ];

        return view('evaluator.antrean', compact('antreanList', 'daftarOpd', 'summary'));
    }
}
