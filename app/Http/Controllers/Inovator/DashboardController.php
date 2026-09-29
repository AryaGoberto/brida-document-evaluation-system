<?php

namespace App\Http\Controllers\Inovator;

use App\Http\Controllers\Controller;
use App\Models\Inovasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the Innovator dashboard using live Eloquent Model data.
     */
    public function index(Request $request): View
    {
        $userId = Auth::id();

        // Ambil pengajuan inovasi milik user saat ini (atau jika admin/test tampilkan milik user atau dinas terkait)
        $query = Inovasi::where('user_id', $userId);
        
        // Jika user belum punya data sendiri, ambil data inovasi untuk representasi demo
        if ($query->count() === 0) {
            $query = Inovasi::query();
        }

        $inovasiList = $query->latest('updated_at')->get();

        // Hitung metrik ringkasan
        $stats = [
            'total_diajukan'      => $inovasiList->where('status', '!=', 'draft')->count(),
            'draft_belum_selesai' => $inovasiList->where('status', 'draft')->count(),
            'menunggu_evaluasi'   => $inovasiList->whereIn('status', ['proses_ai', 'butuh_validasi', 'sedang_diverifikasi'])->count(),
            'revisi_diperlukan'   => $inovasiList->where('status', 'revisi')->count(),
        ];

        // Format data riwayat inovasi agar kompatibel penuh dengan Alpine.js di blade
        $riwayatInovasi = $inovasiList->map(function (Inovasi $item) {
            return [
                'id'                => $item->id,
                'kode'              => $item->kode_registrasi,
                'nama'              => $item->judul_inovasi,
                'kategori'          => $item->kategori,
                'dinas'             => $item->nama_opd,
                'tanggal_pengajuan' => $item->tanggal_pengajuan,
                'status'            => $item->status_sistem,
                'status_type'       => $item->status_type,
                'skor'              => $item->skor_final ?? ($item->skor_ai_total ?? 0.0),
                'tahap'             => $item->tahap_label,
            ];
        })->values()->toArray();

        return view('inovator.dashboard', compact('stats', 'riwayatInovasi'));
    }
}
