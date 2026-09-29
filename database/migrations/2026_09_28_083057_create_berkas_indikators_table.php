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
        Schema::create('berkas_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inovasi_id')->constrained('inovasis')->cascadeOnDelete();
            
            // Nomor indikator 1 s/d 21
            $table->unsignedTinyInteger('nomor_indikator');
            $table->string('nama_indikator');
            
            // Berkas Dokumen
            $table->string('nama_file_asli');
            $table->string('file_path');
            $table->string('file_size')->nullable();
            $table->string('tipe_file', 50)->default('application/pdf');
            
            // Status Berkas & Catatan Verifikator
            $table->string('status_berkas', 30)->default('valid'); // valid | revisi_diperlukan | kosong
            $table->text('catatan_revisi')->nullable();
            
            $table->timestamps();
            
            // Indeks unik agar 1 inovasi hanya punya 1 record per nomor indikator
            $table->unique(['inovasi_id', 'nomor_indikator']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_indikators');
    }
};
