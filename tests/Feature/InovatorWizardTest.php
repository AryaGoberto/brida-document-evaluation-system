<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InovatorWizardTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_wizard_stages_render_successfully(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('inovator.dashboard'));
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get(route('inovator.pengajuan.tahap1'));
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get(route('inovator.pengajuan.tahap2'));
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get(route('inovator.pengajuan.tahap3'));
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get(route('inovator.pengajuan.tahap4'));
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get(route('inovator.pengajuan.tahap5'));
        $response->assertStatus(200);
    }

    public function test_can_save_draft_at_tahap1(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('inovator.pengajuan.simpanTahap1'), [
            'action' => 'draft',
            'kategori' => 'Pelayanan Publik',
            'nama_pic' => 'Budi Santoso',
            'nip_pic' => '198501012010011001',
            'jabatan_pic' => 'Kepala Seksi',
            'kontak_pic' => '081234567890',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('status_draft');
    }

    public function test_detail_and_evaluation_page_renders_successfully(): void
    {
        $user = User::factory()->create();

        // Test inovasi dengan status Revisi Diperlukan (ID 4)
        $response = $this->actingAs($user)->get(route('inovator.inovasi.show', 4));
        $response->assertStatus(200);
        $response->assertSee('Panel Metadata Administratif');
        $response->assertSee('Tabel Hasil Penilaian');
        $response->assertSee('Panel Umpan Balik');
        $response->assertSee('Perbaiki Berkas');

        // Test inovasi dengan status Selesai (ID 3)
        $response = $this->actingAs($user)->get(route('inovator.inovasi.show', 3));
        $response->assertStatus(200);
        $response->assertSee('Evaluasi Selesai');
    }

    public function test_tahap5_revision_mode_renders_successfully(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('inovator.pengajuan.tahap5', [
            'revisi' => 1,
            'inovasi_id' => 4,
        ]));

        $response->assertStatus(200);
        $response->assertSee('Mode Perbaikan Berkas');
        $response->assertSee('Perlu Perbaikan Berkas');
    }

    public function test_profil_page_renders_successfully(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('inovator.profil'));
        $response->assertStatus(200);
        $response->assertSee('Profil', false);
        $response->assertSee('Informasi Instansi', false);
        $response->assertSee('Pembaruan Kata Sandi Akun', false);
    }

    public function test_can_update_instansi_information(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(route('inovator.profil.instansi'), [
            'name' => 'Ahmad Sudirman',
            'nama_instansi' => 'Dinas Kesehatan Kota Makassar',
            'alamat_kantor' => 'Jl. Teduh Bersinar No. 10, Makassar',
            'email_dinas' => 'dinkes@makassarkota.go.id',
            'telepon_kantor' => '(0411) 887766',
            'website_dinas' => 'https://dinkes.makassarkota.go.id',
            'nama_pimpinan' => 'dr. H. Nursalam',
            'nip_pimpinan' => '197001011995011002',
        ]);

        $response->assertRedirect(route('inovator.profil'));
        $response->assertSessionHas('status_instansi');

        $user->refresh();
        $this->assertEquals('Dinas Kesehatan Kota Makassar', $user->nama_instansi);
        $this->assertEquals('dinkes@makassarkota.go.id', $user->email_dinas);
        $this->assertEquals('Jl. Teduh Bersinar No. 10, Makassar', $user->alamat_kantor);
    }

    public function test_can_update_password(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->actingAs($user)->put(route('inovator.profil.password'), [
            'current_password' => 'password123',
            'password' => 'new-secret-password123',
            'password_confirmation' => 'new-secret-password123',
        ]);

        $response->assertRedirect(route('inovator.profil'));
        $response->assertSessionHas('status_password');

        $user->refresh();
        $this->assertTrue(\Illuminate\Support\Facades\Hash::check('new-secret-password123', $user->password));
    }

    public function test_tahap5_displays_indikator_13_daring_and_luring(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('inovator.pengajuan.tahap5'));
        $response->assertStatus(200);
        $response->assertSee('13. INTEGRASI LAYANAN');
        $response->assertSee('Layanan Daring (Online)');
        $response->assertSee('Layanan Luring (Tatap Muka)');
        $response->assertSee('ADA DUKUNGAN MELALUI WEB APLIKASI/MOBILE (ANDROID/IOS) YG LAYANAN SUDAH TERINTEGRASI DGN UNIT ORGANISASI LAIN');
        $response->assertSee('LAYANAN TELAH TERINTEGRASI DENGAN LAYANAN LAIN PADA PROGRAM ATAU KEGIATAN PADA UNIT ORGANISASI LAIN ATAU DALAM LEBIH DARI SATU URUSAN PEMERINTAHAN.');
    }

    public function test_indikator_names_and_counts_match_between_controllers(): void
    {
        $bobotList = \App\Http\Controllers\Inovator\InovasiController::getBobotIndikatorList();
        $pengajuanList = \App\Http\Controllers\Inovator\PengajuanInovasiController::getIndikator20List();

        $this->assertCount(21, $bobotList);
        $this->assertCount(21, $pengajuanList);

        foreach ($pengajuanList as $index => $item) {
            $no = $item['no'];
            $this->assertArrayHasKey($no, $bobotList);
            $this->assertEquals($item['judul'], $bobotList[$no]['judul'], "Judul indikator nomor {$no} tidak sama!");
        }
    }

    public function test_dashboard_route_redirects_to_inovator_dashboard(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('dashboard'));
        $response->assertRedirect(route('inovator.dashboard'));
    }
}
