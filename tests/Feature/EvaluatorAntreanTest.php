<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EvaluatorAntreanTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get(route('evaluator.antrean'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_access_evaluator_antrean(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.antrean'));
        $response->assertStatus(200);
        $response->assertSee('Antrean Inovasi Daerah');
        $response->assertSee('143 Dinas / OPD');
    }

    public function test_antrean_displays_table_columns_and_data(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.antrean'));
        $response->assertStatus(200);

        // Header tabel
        $response->assertSee('Nama Dinas (OPD)');
        $response->assertSee('Judul Inovasi Daerah');
        $response->assertSee('Tanggal Masuk');
        $response->assertSee('Status Sistem');
        $response->assertSee('Estimasi Skor AI');
        $response->assertSee('Aksi');

        // Status Sistem yang berbeda
        $response->assertSee('Butuh Validasi');
        $response->assertSee('Menunggu OCR');
        $response->assertSee('AI Selesai');
        $response->assertSee('Selesai Validasi');

        // Tombol aksi
        $response->assertSee('Mulai Verifikasi');
    }

    public function test_antrean_has_filter_and_search_controls(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.antrean'));
        $response->assertStatus(200);

        // Filter controls
        $response->assertSee('Pencarian Cepat');
        $response->assertSee('Filter Perangkat Daerah (OPD)');
        $response->assertSee('Status Sistem');
        $response->assertSee('Rentang Waktu');
        $response->assertSee('Semua Perangkat Daerah (143 Dinas)');
    }
}
