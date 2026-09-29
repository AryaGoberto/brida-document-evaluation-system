<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InovasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Pastikan User Inovator & Evaluator tersedia
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name'              => 'dr. Hj. Ratna Sari Dewi, M.Kes',
                'password'          => Hash::make('password'),
                'role'              => 'inovator',
                'nama_instansi'     => 'Dinas Kesehatan Kota Makassar',
                'email_dinas'       => 'dinkes@makassarkota.go.id',
                'telepon_kantor'    => '(0411) 853046',
                'alamat_kantor'     => 'Jl. Teduh Bersinar No. 1, Kota Makassar',
                'website_dinas'     => 'https://dinkes.makassarkota.go.id',
                'nama_pimpinan'     => 'dr. Nursaidah Sirajuddin, M.Kes',
                'nip_pimpinan'      => '196811251998032003',
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'evaluator@example.com'],
            [
                'name'              => 'Dr. H. Ruslan, M.Si',
                'password'          => Hash::make('password'),
                'role'              => 'evaluator',
                'nama_instansi'     => 'Badan Riset dan Inovasi Daerah (BRIDA)',
                'email_dinas'       => 'brida@makassarkota.go.id',
                'telepon_kantor'    => '(0411) 3612345',
                'alamat_kantor'     => 'Balaikota Makassar, Jl. Ahmad Yani No. 2',
                'website_dinas'     => 'https://brida.makassarkota.go.id',
                'nama_pimpinan'     => 'Nirwan Mungkasa, S.T., M.Si',
                'nip_pimpinan'      => '197508121998031004',
                'email_verified_at' => now(),
            ]
        );
    }
}