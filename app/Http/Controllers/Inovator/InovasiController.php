<?php

namespace App\Http\Controllers\Inovator;

use App\Http\Controllers\Controller;
use App\Models\Inovasi;
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
        $inovasiModel = Inovasi::with(['user', 'evaluator', 'berkas', 'penilaian'])->findOrFail($id);

        // Petakan SDGs ke master data
        $masterSdgs = collect(PengajuanInovasiController::getSdgsList())->keyBy('no');
        $mappedSdgs = [];
        $rawSdgs = is_array($inovasiModel->sdgs) ? $inovasiModel->sdgs : [];
        foreach ($rawSdgs as $sdgItem) {
            if (is_numeric($sdgItem) && $masterSdgs->has((int) $sdgItem)) {
                $mappedSdgs[] = $masterSdgs->get((int) $sdgItem);
            } elseif (is_array($sdgItem) && isset($sdgItem['no'])) {
                $mappedSdgs[] = $sdgItem;
            }
        }

        // Helper format teks deskripsi
        $formatDeskripsi = function (?string $text, string $defaultPlaceholder): string {
            if (! $text || trim(strip_tags($text)) === '') {
                return '<p class="text-gray-400 italic">' . e($defaultPlaceholder) . '</p>';
            }
            if (str_contains($text, '<p>') || str_contains($text, '<br>')) {
                return $text;
            }
            return nl2br(e($text));
        };

        // Kumpulkan catatan AI dari catatan inovasi dan indikator
        $penilaianByIndikator = $inovasiModel->penilaian->keyBy('nomor_indikator');
        $aiCatatan = [];
        if (! empty($inovasiModel->catatan_ai)) {
            $aiCatatan[] = $inovasiModel->catatan_ai;
        }
        foreach ($penilaianByIndikator as $p) {
            if ($p->status_verifikasi === 'ditolak' && ! empty($p->catatan_evaluator)) {
                $aiCatatan[] = "Indikator {$p->nomor_indikator} ({$p->nama_indikator}): {$p->catatan_evaluator}";
            }
        }
        if (empty($aiCatatan)) {
            $aiCatatan[] = 'Berkas bukti dukung sedang/telah diproses dalam sistem evaluasi BRIDA.';
        }

        $evaluatorNama = $inovasiModel->evaluator_ketua
            ?: ($inovasiModel->evaluator?->name ?? 'Tim Evaluator BRIDA Kota Makassar');

        $evaluatorTanggal = $inovasiModel->verified_at
            ? $inovasiModel->verified_at->translatedFormat('d M Y H:i') . ' WITA'
            : ($inovasiModel->updated_at ? $inovasiModel->updated_at->translatedFormat('d M Y H:i') . ' WITA' : '-');

        $evaluatorCatatan = $inovasiModel->catatan_revisi_umum
            ?: ($inovasiModel->rekomendasi_final
                ?: ($inovasiModel->status === 'selesai'
                    ? 'Inovasi telah diverifikasi dan disahkan oleh Tim Evaluator BRIDA Kota Makassar.'
                    : ($inovasiModel->status === 'revisi'
                        ? 'Terdapat berkas indikator yang perlu diperbaiki. Silakan periksa catatan indikator dan unggah ulang berkas perbaikan.'
                        : 'Berkas pengajuan telah diterima lengkap dan dalam antrean evaluasi verifikator BRIDA.')));

        // Data inovasi terstruktur untuk view
        $inovasi = [
            'id' => $inovasiModel->id,
            'kode' => $inovasiModel->kode,
            'judul' => $inovasiModel->judul_inovasi,
            'kategori' => $inovasiModel->kategori ?? 'Umum',
            'opd' => $inovasiModel->nama_opd ?: ($inovasiModel->user?->nama_instansi ?: 'Perangkat Daerah Kota Makassar'),
            'status' => $inovasiModel->status_sistem,
            'status_type' => $inovasiModel->status_type,
            'tanggal_pengajuan' => $inovasiModel->submitted_at ? $inovasiModel->submitted_at->translatedFormat('d F Y') : ($inovasiModel->created_at ? $inovasiModel->created_at->translatedFormat('d F Y') : '-'),
            'tanggal_evaluasi' => $inovasiModel->verified_at ? $inovasiModel->verified_at->translatedFormat('d F Y') : ($inovasiModel->updated_at ? $inovasiModel->updated_at->translatedFormat('d F Y') : '-'),
            'pic' => [
                'nama' => $inovasiModel->pic_nama ?: ($inovasiModel->user?->name ?: '-'),
                'nip' => $inovasiModel->pic_nip ?: '-',
                'jabatan' => $inovasiModel->pic_jabatan ?: '-',
                'kontak' => $inovasiModel->pic_telepon ?: ($inovasiModel->pic_email ?: ($inovasiModel->user?->email ?: '-')),
            ],
            'jadwal' => [
                'uji_coba' => $inovasiModel->waktu_uji_coba ? $inovasiModel->waktu_uji_coba->translatedFormat('d F Y') : '-',
                'implementasi' => $inovasiModel->waktu_implementasi ? $inovasiModel->waktu_implementasi->translatedFormat('d F Y') : '-',
            ],
            'deskripsi' => [
                'rancang_bangun' => $formatDeskripsi($inovasiModel->rancang_bangun, 'Belum ada keterangan rancang bangun.'),
                'tujuan' => $formatDeskripsi($inovasiModel->tujuan_inovasi, 'Belum ada keterangan tujuan inovasi.'),
                'manfaat' => $formatDeskripsi($inovasiModel->manfaat_inovasi, 'Belum ada keterangan manfaat inovasi.'),
            ],
            'sdgs' => $mappedSdgs,
            'feedback' => [
                'ai' => [
                    'ringkasan' => $inovasiModel->catatan_ai ?: 'Hasil analisis pemrosesan berkas inovasi oleh sistem AI BRIDA.',
                    'catatan' => $aiCatatan,
                    'skor_prediksi' => round((float) ($inovasiModel->skor_ai_total ?? 0.0), 1),
                ],
                'evaluator' => [
                    'nama' => $evaluatorNama,
                    'tanggal' => $evaluatorTanggal,
                    'catatan' => $evaluatorCatatan,
                ],
            ],
        ];

        // Master 21 indikator dengan bobot
        $masterIndikator = self::getBobotIndikatorList();

        $totalSkor = 0;
        $totalBobot = 0;
        $indikatorDetail = [];
        $adaRevisi = false;
        $jumlahPerluRevisi = 0;

        foreach ($masterIndikator as $no => $m) {
            $p = $penilaianByIndikator->get($no);
            $bobot = (float) $m['bobot'];

            // Tentukan bintang dari skor evaluator jika sudah ada, atau skor AI, default ke 2
            $bintang = 2;
            if ($p) {
                $bintang = $p->skor_evaluator_bintang ?? ($p->skor_ai_bintang ?? 2);
            }

            $skorIndikator = $bintang * $bobot;
            $totalSkor += $skorIndikator;
            $totalBobot += (3 * $bobot);

            // Deteksi apakah indikator ini memerlukan revisi
            $perluRevisi = false;
            if ($p && ($p->status_verifikasi === 'ditolak' || str_contains(strtolower($p->catatan_evaluator ?? ''), 'revisi'))) {
                $perluRevisi = true;
            } elseif ($inovasiModel->status === 'revisi' && $bintang === 1) {
                $perluRevisi = true;
            }

            if ($perluRevisi) {
                $adaRevisi = true;
                $jumlahPerluRevisi++;
            }

            $catatan = $p?->catatan_evaluator ?: ($p?->ringkasan_ai ?: 'Sesuai dengan kriteria indikator.');

            $indikatorDetail[$no] = [
                'no' => $no,
                'judul' => $m['judul'],
                'bobot' => $bobot,
                'bintang' => $bintang,
                'skor' => $skorIndikator,
                'skor_maksimal' => 3 * $bobot,
                'catatan' => $catatan,
                'perlu_revisi' => $perluRevisi,
            ];
        }

        if ($inovasiModel->status === 'revisi' && ! $adaRevisi) {
            $adaRevisi = true;
            $jumlahPerluRevisi = max(1, $jumlahPerluRevisi);
        }

        // Skor akhir
        if ($inovasiModel->skor_final !== null && (float) $inovasiModel->skor_final > 0) {
            $persentaseSkor = round((float) $inovasiModel->skor_final, 1);
        } else {
            $persentaseSkor = $totalBobot > 0 ? round(($totalSkor / $totalBobot) * 100, 1) : 0;
        }

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
