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
        Schema::create('penilaian_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inovasi_id')->constrained('inovasis')->cascadeOnDelete();
            
            // Indikator (1 s/d 21) & Bobot Resmi
            $table->unsignedTinyInteger('nomor_indikator');
            $table->string('nama_indikator')->nullable();
            $table->decimal('bobot', 4, 2)->default(1.0);
            
            // Evaluasi Awal AI
            $table->unsignedTinyInteger('skor_ai_bintang')->nullable(); // 1, 2, atau 3
            $table->decimal('poin_ai', 5, 2)->nullable();
            $table->text('ringkasan_ai')->nullable();
            $table->decimal('confidence_score', 5, 2)->nullable(); // e.g. 96.5%
            $table->json('halaman_relevan')->nullable();
            $table->string('status_validasi_ai', 50)->nullable(); // e.g. Rekomendasi Setuju
            
            // Keputusan Verifikator Manusia
            $table->foreignId('evaluator_id')->nullable()->constrained('users')->nullOnDelete();
            $table->unsignedTinyInteger('skor_evaluator_bintang')->nullable(); // 1, 2, atau 3
            $table->decimal('poin_evaluator', 5, 2)->nullable();
            $table->text('catatan_evaluator')->nullable();
            $table->string('status_verifikasi', 30)->default('menunggu'); // menunggu | disetujui | diubah | ditolak
            
            $table->timestamps();
            
            // Indeks unik agar 1 inovasi hanya punya 1 record penilaian per indikator
            $table->unique(['inovasi_id', 'nomor_indikator']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_indikators');
    }
};
