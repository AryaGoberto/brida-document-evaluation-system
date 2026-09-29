<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inovasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // Identitas Pengajuan
            $table->string('kode_registrasi', 50)->unique();
            $table->string('judul_inovasi');
            $table->string('kategori'); // e.g. Pelayanan Publik & Kesehatan
            $table->string('urusan_pemerintahan')->nullable();
            $table->string('nama_opd');
            
            // Jadwal Inovasi
            $table->date('waktu_uji_coba')->nullable();
            $table->date('waktu_implementasi')->nullable();
            
            // Deskripsi Inovasi (Tahap 3)
            $table->longText('rancang_bangun')->nullable();
            $table->longText('tujuan_inovasi')->nullable();
            $table->longText('manfaat_inovasi')->nullable();
            
            // Penanggung Jawab (PIC)
            $table->string('pic_nama')->nullable();
            $table->string('pic_nip')->nullable();
            $table->string('pic_jabatan')->nullable();
            $table->string('pic_telepon')->nullable();
            $table->string('pic_email')->nullable();
            
            // Pemetaan SDGs (Tahap 4)
            $table->json('sdgs')->nullable();
            
            // Status & Workflow
            $table->boolean('pakta_integritas')->default(false);
            $table->string('status', 30)->default('draft'); 
            // draft | proses_ai | butuh_validasi | sedang_diverifikasi | revisi | selesai | ditolak
            $table->integer('tahap')->default(1);
            
            // Hasil Analisis AI
            $table->decimal('skor_ai_total', 5, 2)->nullable();
            $table->string('predikat_ai')->nullable();
            $table->text('catatan_ai')->nullable();
            $table->integer('progress_ocr')->default(0); // 0 - 100%
            
            // Hasil Penilaian Evaluator Manusia & Finalisasi
            $table->decimal('skor_final', 5, 2)->nullable();
            $table->string('status_kelulusan')->nullable(); // Sangat Inovatif | Inovatif | Perlu Perbaikan | Tidak Lulus
            $table->text('rekomendasi_final')->nullable();
            $table->string('nomor_ba')->nullable();
            $table->date('tanggal_sidang')->nullable();
            $table->foreignId('evaluator_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('evaluator_ketua')->nullable();
            $table->string('evaluator_anggota')->nullable();
            $table->text('catatan_revisi_umum')->nullable();
            $table->boolean('status_terkunci')->default(false);
            
            // Timestamp alur pengajuan
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inovasis');
    }
};
