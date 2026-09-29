<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EvaluatorRiwayatTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_riwayat(): void
    {
        $response = $this->get(route('evaluator.riwayat'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_evaluator_can_view_riwayat_index(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.riwayat'));
        $response->assertStatus(200);

        // Header & Ringkasan Metrik
        $response->assertSee('Riwayat & Perekapan Final Inovasi', false);
        $response->assertSee('74 Inovasi Terkunci', false);
        $response->assertSee('Sangat Inovatif (Lolos IGA)', false);
        $response->assertSee('Inovatif (Pembinaan BRIDA)', false);
        $response->assertSee('Memerlukan Perbaikan', false);

        // Data Inovasi Final di Tabel
        $response->assertSee('Lorong Wisata Cerdas Berbasis Komunitas (Longwis Smart)', false);
        $response->assertSee('Dinas Pariwisata Kota Makassar', false);
        $response->assertSee('BA.01/BRIDA/MKS/IX/2026', false);
        $response->assertSee('105.0', false);
        $response->assertSee('/ 111.0', false);

        // Tombol Aksi Detail & Cetak BA
        $response->assertSee('Detail');
        $response->assertSee('Cetak BA');
        $response->assertSee('Cetak Rekap Laporan Pimpinan (PDF)', false);
    }

    public function test_evaluator_can_view_read_only_detail_page(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.riwayat.show', 3));
        $response->assertStatus(200);

        // Tampilan Read-Only
        $response->assertSee('Detail Penilaian Akhir', false);
        $response->assertSee('Mode Read-Only (Terkunci)', false);
        $response->assertSee('Seluruh 21 indikator telah disahkan oleh tim verifikator BRIDA', false);
        $response->assertSee('105.0', false);
        $response->assertSee('/ 111.0', false);
        $response->assertSee('Sangat Inovatif', false);

        // Rincian 21 Indikator
        $response->assertSee('Rincian Penilaian 21 Indikator', false);
        $response->assertSee('REGULASI INOVASI DAERAH', false);
        $response->assertSee('KEMANFAATAN INOVASI', false);
        $response->assertSee('Kembali ke Riwayat', false);
        $response->assertSee('Cetak Berita Acara (PDF)', false);
    }

    public function test_evaluator_can_view_berita_acara_document(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.riwayat.cetak', 3));
        $response->assertStatus(200);

        // Kop & Format Resmi Berita Acara
        $response->assertSee('Pemerintah Kota Makassar', false);
        $response->assertSee('Badan Riset dan Inovasi Daerah', false);
        $response->assertSee('(BRIDA)', false);
        $response->assertSee('Berita Acara Hasil Verifikasi dan Penilaian Teknis', false);
        $response->assertSee('BA.01/BRIDA/MKS/IX/2026', false);

        // Identitas & Rekapitulasi Nilai
        $response->assertSee('Lorong Wisata Cerdas Berbasis Komunitas (Longwis Smart)', false);
        $response->assertSee('Dinas Pariwisata Kota Makassar', false);
        $response->assertSee('105.0', false);
        $response->assertSee('Sangat Inovatif', false);

        // Tanda Tangan Pleno & TTE BSrE
        $response->assertSee('Dr. H. Ruslan, M.Si', false);
        $response->assertSee('197508121998031004', false);
        $response->assertSee('Ditandatangani secara elektronik', false);
    }

    public function test_evaluator_can_view_rekapitulasi_laporan_eksekutif(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.riwayat.ekspor'));
        $response->assertStatus(200);

        // Kop & Judul Laporan Rekapitulasi
        $response->assertSee('Laporan Rekapitulasi Hasil Sidang Verifikasi Inovasi Daerah', false);
        $response->assertSee('74 Inovasi', false);
        $response->assertSee('52 Inovasi', false);

        // Inovasi pertama dalam rekap (BRD-2026-0020 - selalu ada karena key pertama)
        $response->assertSee('BRD-2026-0020', false);
        $response->assertSee('Cetak Laporan Rekap (PDF)', false);
    }
}
