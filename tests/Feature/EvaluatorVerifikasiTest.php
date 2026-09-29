<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EvaluatorVerifikasiTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get(route('evaluator.verifikasi.show', 1));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_evaluator_can_access_split_screen_workspace(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.verifikasi.show', 1));
        $response->assertStatus(200);

        // Header info administratif
        $response->assertSee('SAPA Sehat');
        $response->assertSee('Dinas Kesehatan Kota Makassar');
        $response->assertSee('Kalkulasi AI');
        $response->assertSee('Skor Verifikator');
    }

    public function test_workspace_renders_pdf_viewer_panel(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.verifikasi.show', 1));
        $response->assertStatus(200);

        // Panel Kiri PDF Viewer
        $response->assertSee('PDF');
        $response->assertSee('Bukti AI');
        $response->assertSee('Salinan Dokumen Bukti Dukung');
        $response->assertSee('Pemerintah Kota Makassar', false);
    }

    public function test_workspace_renders_21_indicators_accordion_and_actions(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.verifikasi.show', 1));
        $response->assertStatus(200);

        // Panel Kanan Accordion 21 Indikator
        $response->assertSee('Daftar 21 Indikator & Keputusan Validasi', false);
        $response->assertSee('21 Parameter');

        // Indikator 1
        $response->assertSee('1. REGULASI INOVASI DAERAH');

        // Aksi Validasi
        $response->assertSee('Setujui Hasil AI');
        $response->assertSee('Koreksi Manual');
        $response->assertSee('Formulir Koreksi Manual Evaluator');
        $response->assertSee('Catatan Evaluator (Alasan Koreksi):', false);
    }

    public function test_evaluator_can_submit_final_verifikasi_results(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->post(route('evaluator.verifikasi.simpan', 1), [
            'catatan_pleno' => 'Seluruh 21 indikator telah ditelaah dan diverifikasi lengkap.',
        ]);

        $response->assertRedirect(route('evaluator.antrean'));
        $response->assertSessionHas('status_verifikasi');
    }
}
