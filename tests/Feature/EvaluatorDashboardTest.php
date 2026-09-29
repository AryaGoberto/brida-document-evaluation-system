<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EvaluatorDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get(route('evaluator.dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_access_evaluator_dashboard(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.dashboard'));
        $response->assertStatus(200);
        $response->assertSee('Dasbor Evaluasi Inovasi');
        $response->assertSee('Panel Verifikator & Evaluator BRIDA', false);
    }

    public function test_evaluator_dashboard_displays_performance_metric_widgets(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.dashboard'));
        $response->assertStatus(200);

        // 4 Metrik Kinerja
        $response->assertSee('Menunggu Verifikasi');
        $response->assertSee('Sedang Diproses AI');
        $response->assertSee('Verifikasi Selesai');
        $response->assertSee('Dokumen Dikembalikan');
    }

    public function test_evaluator_dashboard_displays_task_inbox_and_ai_scores(): void
    {
        $user = User::factory()->evaluator()->create();

        $response = $this->actingAs($user)->get(route('evaluator.dashboard'));
        $response->assertStatus(200);

        // Header task inbox
        $response->assertSee('Daftar Tugas Prioritas (Task Inbox)');

        // Sampel Inovasi dalam inbox
        $response->assertSee('SAPA Sehat');
        $response->assertSee('Dinas Kesehatan Kota Makassar');
        $response->assertSee('Sangat Inovatif');
        $response->assertSee('Mulai Verifikasi');
    }
}
