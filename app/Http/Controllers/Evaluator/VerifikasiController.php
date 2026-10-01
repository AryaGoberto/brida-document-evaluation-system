<?php

namespace App\Http\Controllers\Evaluator;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Inovator\InovasiController;
use App\Models\Inovasi;
use App\Models\PenilaianIndikator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class VerifikasiController extends Controller
{
    /**
     * Ruang Kerja Validasi (Split-Screen Workspace)
     * Tempat evaluator membandingkan dokumen fisik dengan klaim AI secara real-time.
     */
    public function show(int $id, Request $request): View
    {
        // Dataset master 19 indikator dengan bobot resmi BRIDA
        $masterIndikator = InovasiController::getBobotIndikatorList();

        // Dataset inovasi contoh realistis
        $daftarInovasi = [
            1 => [
                'id' => 1,
                'kode' => 'BRD-2026-0041',
                'judul' => 'Sistem Antrean Puskesmas Digital (SAPA Sehat)',
                'opd' => 'Dinas Kesehatan Kota Makassar',
                'kategori' => 'Pelayanan Publik & Kesehatan',
                'tanggal_submit' => '24 Sep 2026 14:20',
                'pic' => [
                    'nama' => 'dr. Hj. Ratna Sari Dewi, M.Kes',
                    'nip' => '198203152008042003',
                    'jabatan' => 'Kepala Seksi Pelayanan Kesehatan Primer',
                    'kontak' => '081242339900',
                ],
                'skor_ai_total' => 87.5,
                'predikat_ai' => 'Sangat Inovatif',
                'status_verifikasi' => 'Sedang Diverifikasi',
            ],
            4 => [
                'id' => 4,
                'kode' => 'BRD-2026-0038',
                'judul' => 'Sistem Pengaduan Kebersihan Lingkungan (SIPASSA)',
                'opd' => 'Dinas Lingkungan Hidup Kota Makassar',
                'kategori' => 'Kebersihan & Lingkungan Hidup',
                'tanggal_submit' => '23 Sep 2026 09:15',
                'pic' => [
                    'nama' => 'Ir. Andi Bau Massepe, M.Si',
                    'nip' => '197904122005011006',
                    'jabatan' => 'Kepala Bidang Pengelolaan Sampah',
                    'kontak' => '081144238910',
                ],
                'skor_ai_total' => 74.0,
                'predikat_ai' => 'Inovatif',
                'status_verifikasi' => 'Perlu Revisi',
            ],
        ];

        $inovasiRecord = Inovasi::with(['berkas', 'penilaian', 'user'])->find($id);

        if ($inovasiRecord) {
            $inovasi = [
                'id'                => $inovasiRecord->id,
                'kode'              => $inovasiRecord->kode_registrasi,
                'judul'             => $inovasiRecord->judul_inovasi,
                'opd'               => $inovasiRecord->nama_opd,
                'kategori'          => $inovasiRecord->kategori,
                'tanggal_submit'    => $inovasiRecord->tanggal_masuk,
                'pic'               => $inovasiRecord->pic,
                'skor_ai_total'     => (float) ($inovasiRecord->skor_ai_total ?? 85.0),
                'predikat_ai'       => $inovasiRecord->predikat_ai ?? 'Sangat Inovatif',
                'status_verifikasi' => $inovasiRecord->status_sistem,
            ];
        } else {
            $inovasi = $daftarInovasi[$id] ?? [
                'id' => $id,
                'kode' => 'BRD-2026-'.str_pad((string) $id, 4, '0', STR_PAD_LEFT),
                'judul' => 'Inovasi Layanan Terpadu Daerah #'.$id,
                'opd' => 'Perangkat Daerah Kota Makassar',
                'kategori' => 'Pelayanan Publik',
                'tanggal_submit' => date('d M Y H:i', strtotime('-2 days')),
                'pic' => [
                    'nama' => 'Budi Santoso, S.Kom., M.Si',
                    'nip' => '198501012010011001',
                    'jabatan' => 'Pranata Komputer Ahli Muda',
                    'kontak' => '081234567890',
                ],
                'skor_ai_total' => 82.5,
                'predikat_ai' => 'Sangat Inovatif',
                'status_verifikasi' => 'Sedang Diverifikasi',
            ];
        }

        // Hasil analisis AI & bukti dukung LLM untuk masing-masing 19 indikator
        $evidenceKlaim = [
            1 => [
                'bintang' => 3,
                'evidence' => 'Ditemukan Peraturan Walikota Makassar Nomor 14 Tahun 2025 tentang Penyelenggaraan Pelayanan Kesehatan Terpadu pada Halaman 2, Paragraf 1. Barcode TTE Kepala Daerah terverifikasi sah melalui BSrE.',
                'halaman' => 2,
                'kutipan' => 'Menetapkan: PERATURAN WALIKOTA TENTANG PENERAPAN SISTEM ANTREAN DIGITAL PADA PUSKESMAS SE-KOTA MAKASSAR.',
                'filename' => 'Dokumen_01_Perwali_Makassar_No14_2025.pdf',
                'filesize' => '2.4 MB',
            ],
            2 => [
                'bintang' => 3,
                'evidence' => 'Daftar personil pengelola sistem berjumlah 47 orang (1 orang per Puskesmas dan 5 orang tim teknis Dinkes). Melampirkan SK Penetapan Tim Teknis.',
                'halaman' => 3,
                'kutipan' => 'Jumlah Tenaga Pengelola yang ditetapkan secara resmi: 47 personil fungsional pranata komputer dan perawat.',
                'filename' => 'Dokumen_02_SK_Penetapan_SDM_Pengelola.pdf',
                'filesize' => '1.8 MB',
            ],
            3 => [
                'bintang' => 3,
                'evidence' => 'Alokasi anggaran tercantum pada DPA Dinas Kesehatan TA 2024 (T-2), TA 2025 (T-1), dan TA 2026 (T-0) pada sub-kegiatan Pengelolaan Sistem Informasi Kesehatan.',
                'halaman' => 1,
                'kutipan' => 'Sub Kegiatan 1.02.02.2.01.0003 - Alokasi Anggaran Belanja Modal Pemeliharaan Server dan Aplikasi Antrean Rp 350.000.000,-',
                'filename' => 'Dokumen_03_DPA_Dinkes_Multi_Tahun.pdf',
                'filesize' => '3.1 MB',
            ],
            4 => [
                'bintang' => 2,
                'evidence' => 'Pelatihan TOT dan Bimtek telah dilaksanakan 2 kali dalam 2 tahun terakhir dengan 94 peserta petugas loket Puskesmas.',
                'halaman' => 4,
                'kutipan' => 'Laporan Pelaksanaan Bimtek Operasional Aplikasi SAPA Sehat Angkatan I & II Tahun 2025.',
                'filename' => 'Dokumen_04_Laporan_Bimtek_Aplikasi.pdf',
                'filesize' => '1.5 MB',
            ],
            5 => [
                'bintang' => 3,
                'evidence' => 'Program inovasi termuat dalam dokumen RKPD Kota Makassar Tahun 2025 dan 2026 pada Prioritas Peningkatan Mutu Layanan Publik.',
                'halaman' => 2,
                'kutipan' => 'Indikator Kinerja Utama 2.1: Persentase Faskes Primer Terkoneksi Sistem Antrean Digital Terintegrasi 100%.',
                'filename' => 'Dokumen_05_Ekstrak_RKPD_Kota_Makassar.pdf',
                'filesize' => '2.0 MB',
            ],
            6 => [
                'bintang' => 2,
                'evidence' => 'Inovasi melibatkan 4 aktor: Dinkes Makassar, BPJS Kesehatan Cabang Makassar, Disdukcapil (integrasi NIK), dan Puskesmas.',
                'halaman' => 1,
                'kutipan' => 'Pihak Terlibat: Dinas Kesehatan, BPJS Kesehatan, Dinas Dukcapil, dan Perwakilan Asosiasi Pasien.',
                'filename' => 'Dokumen_06_MoU_Keterlibatan_Aktor.pdf',
                'filesize' => '1.6 MB',
            ],
            7 => [
                'bintang' => 3,
                'evidence' => 'Terdapat SK Walikota Makassar Nomor 800/124/Kep/2025 tentang Tim Pelaksana dan Pengelola Inovasi Daerah.',
                'halaman' => 2,
                'kutipan' => 'Memutuskan: Menetapkan Tim Pelaksana Inovasi SAPA Sehat yang diketuai oleh Kepala Dinas Kesehatan Kota Makassar.',
                'filename' => 'Dokumen_07_SK_Walikota_Tim_Pelaksana.pdf',
                'filesize' => '1.9 MB',
            ],
            8 => [
                'bintang' => 2,
                'evidence' => 'Jejaring inovasi melibatkan 3 perangkat daerah: Dinas Kominfo (hosting cloud), Disdukcapil (API NIK), dan Dinas Kesehatan.',
                'halaman' => 2,
                'kutipan' => 'Perjanjian Kerja Sama Antar-OPD Penggunaan Jaringan Intra Pemerintah Daerah Kota Makassar.',
                'filename' => 'Dokumen_08_PKS_Jejaring_Inovasi_OPD.pdf',
                'filesize' => '1.7 MB',
            ],
            9 => [
                'bintang' => 3,
                'evidence' => 'Sosialisasi aktif melalui liputan media berita resmi pemkot, billboard digital, dan konten video edukasi di Instagram @dinkesmakassar.',
                'halaman' => 3,
                'kutipan' => 'Dokumentasi Publikasi Media Berita Nasional dan Akun Resmi Media Sosial Dinas Kesehatan.',
                'filename' => 'Dokumen_09_Dokumentasi_Sosialisasi_Media.pdf',
                'filesize' => '4.2 MB',
            ],
            10 => [
                'bintang' => 2,
                'evidence' => 'Pedoman teknis berupa modul buku elektronik (e-book) dengan ISBN dan panduan SOP pengoperasian sistem bagi operator.',
                'halaman' => 1,
                'kutipan' => 'Buku Manual Pedoman Teknis Pengoperasian Aplikasi SAPA Sehat Edisi Revisi 2026.',
                'filename' => 'Dokumen_10_Buku_Pedoman_Teknis_Aplikasi.pdf',
                'filesize' => '3.5 MB',
            ],
            11 => [
                'bintang' => 3,
                'evidence' => 'Layanan tersedia melalui 4 media: Web Portal, WhatsApp Bot Notifikasi, Mobile Apps (Android), dan Mesin Kios Antrean Fisik di Faskes.',
                'halaman' => 2,
                'kutipan' => 'Kanal Layanan: 1. Portal Web, 2. WhatsApp Gateway API, 3. Aplikasi Android, 4. Anjungan Mesin Antrean Faskes.',
                'filename' => 'Dokumen_11_Kanal_Media_Informasi_Layanan.pdf',
                'filesize' => '2.1 MB',
            ],
            12 => [
                'bintang' => 3,
                'evidence' => 'Pemotongan waktu tunggu dari 120 menit menjadi rata-rata 25 menit. Pasien menerima nomor antrean dan estimasi pelayanan secara instan.',
                'halaman' => 1,
                'kutipan' => 'Hasil waktu proses antrean diperoleh dalam waktu < 1 hari (real-time saat tiket diambil).',
                'filename' => 'Dokumen_12_Uji_Kemudahan_Waktu_Proses.pdf',
                'filesize' => '1.4 MB',
            ],
            13 => [
                'bintang' => 3,
                'evidence' => 'Layanan Daring terintegrasi dengan SatuData Makassar dan Mobile JKN BPJS. Layanan Luring terintegrasi loket resep obat farmasi.',
                'halaman' => 2,
                'kutipan' => 'Integrasi API SatuSehat Kemenkes RI dan Single Sign-On (SSO) Portal Layanan Publik Pemkot Makassar.',
                'filename' => 'Dokumen_13_Arsitektur_Integrasi_Layanan.pdf',
                'filesize' => '2.8 MB',
            ],
            14 => [
                'bintang' => 2,
                'evidence' => 'Telah direplikasi oleh Kabupaten Maros (2025) dan Kabupaten Gowa (2026) melalui transfer knowledge replikasi BRIDA.',
                'halaman' => 1,
                'kutipan' => 'Surat Permohonan dan Piagam Adopsi Replikasi Sistem dari Dinas Kesehatan Kabupaten Tetangga.',
                'filename' => 'Dokumen_14_Piagam_Replikasi_Daerah_Lain.pdf',
                'filesize' => '1.9 MB',
            ],
            15 => [
                'bintang' => 3,
                'evidence' => 'Alat kerja berbasis cloud server Diskominfo Makassar, microservices architecture, dan mesin anjungan mandiri touchscreen.',
                'halaman' => 2,
                'kutipan' => 'Infrastruktur: High-Availability Cloud Server, Cloudflare Protection, dan Thermal Printer Barcode Scanner.',
                'filename' => 'Dokumen_15_Spesifikasi_Alat_Kerja_Sistem.pdf',
                'filesize' => '2.2 MB',
            ],
            16 => [
                'bintang' => 3,
                'evidence' => 'Penerima manfaat mencapai 342.180 pasien per tahun di 47 Puskesmas dengan efisiensi waktu tunggu pelayanan mencapai 79%.',
                'halaman' => 4,
                'kutipan' => 'Laporan Dampak Kemanfaatan: 342.180 pengguna unik, efisiensi anggaran cetak karcis manual Rp 84.000.000,-/tahun.',
                'filename' => 'Dokumen_16_Laporan_Kemanfaatan_Nyata.pdf',
                'filesize' => '3.8 MB',
            ],
            17 => [
                'bintang' => 2,
                'evidence' => 'Dampak nyata berupa peningkatan indeks kepuasan pasien dan penurunan keluhan antrean di kanal aduan SP4N LAPOR sebesar 65%.',
                'halaman' => 2,
                'kutipan' => 'Statistik Penurunan Aduan Antrean dari 42 aduan/bulan menjadi rata-rata 3 aduan/bulan.',
                'filename' => 'Dokumen_17_Dampak_Efisiensi_Biaya_OPD.pdf',
                'filesize' => '1.7 MB',
            ],
            18 => [
                'bintang' => 3,
                'evidence' => 'Inovasi diciptakan dan selesai masa uji coba dalam kurun waktu 3 bulan (15 Jan 2026 s.d 01 Apr 2026).',
                'halaman' => 1,
                'kutipan' => 'Timeline Pengembangan: Rancang bangun 1 bulan, integrasi uji coba 2 bulan, go-live 01 April 2026.',
                'filename' => 'Dokumen_18_Laporan_Kecepatan_Penciptaan.pdf',
                'filesize' => '1.3 MB',
            ],
            19 => [
                'bintang' => 3,
                'evidence' => 'Persentase tindak lanjut penyelesaian pengaduan mencapai 92.4% dalam rentang waktu < 24 jam kerja.',
                'halaman' => 2,
                'kutipan' => 'Laporan Layanan Helpdesk: 142 dari 153 tiket aduan terselesaikan tuntas (Penyelesaian 92.8%).',
                'filename' => 'Dokumen_19_Laporan_Penyelesaian_Pengaduan.pdf',
                'filesize' => '1.6 MB',
            ],
            20 => [
                'bintang' => 2,
                'evidence' => 'Hasil Survei Kepuasan Masyarakat (SKM) dari Lembaga Penelitian Independen UNHAS memperoleh nilai 88.2 (Sangat Baik).',
                'halaman' => 3,
                'kutipan' => 'Laporan Hasil Evaluasi SKM Eksternal: Mutu Pelayanan A dengan Konversi Nilai 88.20.',
                'filename' => 'Dokumen_20_Laporan_Hasil_Survei_SKM.pdf',
                'filesize' => '2.9 MB',
            ],
            21 => [
                'bintang' => 3,
                'evidence' => 'Memenuhi 5 unsur substansi kualitas inovasi daerah (keterbaruan, kemanfaatan, replikatif, akuntabel, dan berkelanjutan).',
                'halaman' => 5,
                'kutipan' => 'Lembar Hasil Penilaian Komisi Teknis BRIDA: Seluruh 5 Unsur Substansi Kualitas Inovasi Daerah Terpenuhi Sempurna.',
                'filename' => 'Dokumen_21_Bukti_5_Unsur_Substansi_Inovasi.pdf',
                'filesize' => '3.0 MB',
            ],
        ];

        // Ambil data berkas riil dan penilaian yang tersimpan di database
        $berkasByIndikator = $inovasiRecord ? $inovasiRecord->berkas->keyBy('nomor_indikator') : collect();
        $penilaianByIndikator = $inovasiRecord ? $inovasiRecord->penilaian->keyBy('nomor_indikator') : collect();

        // Susun data per indikator yang menggabungkan master indikator + berkas riil + klaim AI
        $indikatorVerifikasi = [];
        $totalSkorAi = 0;
        $totalSkorMaks = 0;

        foreach ($masterIndikator as $no => $m) {
            $berkas = $berkasByIndikator->get($no);
            $penilaian = $penilaianByIndikator->get($no);
            $claim = $evidenceKlaim[$no] ?? null;

            $hasRealFile = false;
            $fileUrl = null;
            $filename = 'Dokumen_Indikator_'.$no.'.pdf';
            $filesize = '1.5 MB';

            // Jika ada berkas riil yang diunggah inovator dan tersimpan di storage
            if ($berkas && $berkas->file_path && Storage::disk('public')->exists($berkas->file_path)) {
                $hasRealFile = true;
                $fileUrl = asset('storage/'.$berkas->file_path);
                $cleanName = preg_replace('/^\d+_/', '', basename($berkas->file_path));
                $filename = $cleanName ?: ($berkas->nama_file_asli ?: basename($berkas->file_path));
                $filesize = $berkas->file_size ?: (round(Storage::disk('public')->size($berkas->file_path) / 1024, 1).' KB');
            } elseif ($berkas && $berkas->nama_file_asli) {
                $filename = $berkas->nama_file_asli;
                $filesize = $berkas->file_size ?: '1.5 MB';
            } elseif ($claim) {
                $filename = $claim['filename'];
                $filesize = $claim['filesize'];
            }

            // Hitung skor AI dan bobot
            $aiBintang = 2;
            if ($penilaian && $penilaian->skor_ai_bintang) {
                $aiBintang = (int) $penilaian->skor_ai_bintang;
            } elseif ($claim) {
                $aiBintang = $claim['bintang'];
            }

            $skorAi = $aiBintang * $m['bobot'];
            $skorMaks = 3 * $m['bobot'];

            $totalSkorAi += $skorAi;
            $totalSkorMaks += $skorMaks;

            $evidenceText = $penilaian?->ringkasan_ai
                ?: ($claim['evidence'] ?? ('Bukti dukung berkas '.$filename.' telah terunggah dan dievaluasi AI.'));
            $kutipanText = $claim['kutipan'] ?? ('Dokumen bukti dukung: '.$filename);
            $halaman = $claim['halaman'] ?? 1;

            $indikatorVerifikasi[$no] = [
                'no' => $no,
                'judul' => $m['judul'],
                'bobot' => $m['bobot'],
                'ai_bintang' => $aiBintang,
                'ai_skor' => $skorAi,
                'skor_maksimal' => $skorMaks,
                'evidence' => $evidenceText,
                'halaman' => $halaman,
                'kutipan' => $kutipanText,
                'filename' => $filename,
                'filesize' => $filesize,
                'file_url' => $fileUrl,
                'has_real_file' => $hasRealFile,
                // Status awal verifikasi: disetujui default atau menunggu review
                'verifikasi_status' => $penilaian?->status_verifikasi ?? 'pending',
                'final_bintang' => $penilaian?->skor_final ?: $aiBintang,
                'catatan_evaluator' => $penilaian?->catatan_evaluator ?? '',
            ];
        }

        $persentaseAi = $totalSkorMaks > 0 ? round(($totalSkorAi / $totalSkorMaks) * 100, 1) : 0;

        return view('evaluator.verifikasi.show', compact(
            'inovasi',
            'indikatorVerifikasi',
            'persentaseAi',
            'totalSkorAi',
            'totalSkorMaks'
        ));
    }

    /**
     * Menyimpan Keputusan Validasi Akhir Evaluator
     */
    public function simpan(int $id, Request $request): RedirectResponse
    {
        $request->validate([
            'keputusan' => ['nullable', 'array'],
            'catatan_pleno' => ['nullable', 'string', 'max:2000'],
        ]);

        $inovasi = Inovasi::find($id);
        if ($inovasi) {
            $evaluatorId = Auth::id();
            $action = $request->input('action', 'setujui');
            $newStatus = ($action === 'revisi') ? 'revisi' : 'selesai';

            $inovasi->update([
                'status'              => $newStatus,
                'evaluator_id'        => $evaluatorId,
                'evaluator_ketua'     => Auth::user()?->name ?? 'Dr. H. Ruslan, M.Si',
                'verified_at'         => now(),
                'catatan_revisi_umum' => $request->input('catatan_pleno'),
                'status_kelulusan'    => ($newStatus === 'selesai') ? 'Sangat Inovatif' : null,
                'skor_final'          => $inovasi->skor_ai_total ?? 95.0,
                'nomor_ba'            => ($newStatus === 'selesai' && ! $inovasi->nomor_ba) ? ('BA.' . str_pad((string) $inovasi->id, 2, '0', STR_PAD_LEFT) . '/BRIDA/MKS/' . date('Y')) : $inovasi->nomor_ba,
                'tanggal_sidang'      => now(),
                'status_terkunci'     => ($newStatus === 'selesai'),
            ]);

            if ($request->has('keputusan') && is_array($request->input('keputusan'))) {
                foreach ($request->input('keputusan') as $no => $item) {
                    $bintang = isset($item['bintang']) ? (int) $item['bintang'] : 3;
                    PenilaianIndikator::updateOrCreate(
                        ['inovasi_id' => $inovasi->id, 'nomor_indikator' => $no],
                        [
                            'skor_evaluator_bintang' => $bintang,
                            'catatan_evaluator'      => $item['catatan'] ?? null,
                            'status_verifikasi'      => 'disetujui',
                            'evaluator_id'           => $evaluatorId,
                        ]
                    );
                }
            }
        }

        return redirect()->route('evaluator.antrean')->with('status_verifikasi', 'Hasil telaah validasi inovasi #'.$id.' berhasil disimpan dan diteruskan ke Sidang Pleno BRIDA.');
    }
}
