<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Demo Inovator (Dinas)
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Perwakilan Dinas Uji Coba',
                'password' => Hash::make('password'),
                'role' => 'inovator', // Berdasarkan file migrasi Anda sebelumnya
            ]
        );

        // 2. Akun Demo Evaluator (BRIDA)
        User::updateOrCreate(
            ['email' => 'evaluator@example.com'],
            [
                'name' => 'Tim Evaluator BRIDA',
                'password' => Hash::make('password'),
                'role' => 'evaluator',
            ]
        );
    }
}