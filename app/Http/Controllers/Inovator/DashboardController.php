<?php

namespace App\Http\Controllers\Inovator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the Innovator dashboard.
     */
    public function index(Request $request): View
    {
        // Data statistik cepat
        $stats = [
            'total_diajukan' => 1,
            'draft_belum_selesai' => 1,
            'menunggu_evaluasi' => 1,
            'revisi_diperlukan' => 1,
        ];

        // Riwayat pengajuan inovasi
        $riwayatInovasi = [
            [
                'id' => 1,
                'nama' => 'Sistem Antrean Puskesmas Digital (SAPA Sehat)',
                'kategori' => 'Pelayanan Publik & Kesehatan',
                'dinas' => 'Dinas Kesehatan',
                'tanggal_pengajuan' => '20 Sep 2026',
                'status' => 'Validasi BRIDA',
                'status_type' => 'validasi',
                'skor' => 87.5,
                'tahap' => 'Tahap 4 dari 5',
            ],
        ];

        return view('inovator.dashboard', compact('stats', 'riwayatInovasi'));
    }
}
