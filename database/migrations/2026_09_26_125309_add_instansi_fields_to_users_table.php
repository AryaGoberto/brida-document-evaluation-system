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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nama_instansi')->nullable()->after('email');
            $table->text('alamat_kantor')->nullable()->after('nama_instansi');
            $table->string('email_dinas')->nullable()->after('alamat_kantor');
            $table->string('telepon_kantor')->nullable()->after('email_dinas');
            $table->string('website_dinas')->nullable()->after('telepon_kantor');
            $table->string('nama_pimpinan')->nullable()->after('website_dinas');
            $table->string('nip_pimpinan')->nullable()->after('nama_pimpinan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nama_instansi',
                'alamat_kantor',
                'email_dinas',
                'telepon_kantor',
                'website_dinas',
                'nama_pimpinan',
                'nip_pimpinan',
            ]);
        });
    }
};
