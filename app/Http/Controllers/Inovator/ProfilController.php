<?php

namespace App\Http\Controllers\Inovator;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfilController extends Controller
{
    /**
     * Menampilkan Halaman Profil & Pengaturan Inovator
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        // Nilai bawaan jika belum pernah diisi (default instansi pemerintah)
        if (empty($user->nama_instansi)) {
            $user->nama_instansi = 'Dinas Komunikasi dan Informatika Kota Makassar';
        }
        if (empty($user->alamat_kantor)) {
            $user->alamat_kantor = 'Jl. Teduh Bersinar No. 1, Balai Kota Makassar, Sulawesi Selatan 90111';
        }
        if (empty($user->email_dinas)) {
            $user->email_dinas = 'diskominfo@makassarkota.go.id';
        }
        if (empty($user->telepon_kantor)) {
            $user->telepon_kantor = '(0411) 3612345';
        }
        if (empty($user->website_dinas)) {
            $user->website_dinas = 'https://makassarkota.go.id';
        }
        if (empty($user->nama_pimpinan)) {
            $user->nama_pimpinan = 'Dr. H. Ismawaty Nur, S.STP., M.Si';
        }
        if (empty($user->nip_pimpinan)) {
            $user->nip_pimpinan = '197608141995012001';
        }

        return view('inovator.profil', compact('user'));
    }

    /**
     * Memperbarui Detail Informasi Instansi Dasar untuk Cetak Laporan
     */
    public function updateInstansi(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nama_instansi' => ['required', 'string', 'max:255'],
            'alamat_kantor' => ['required', 'string', 'max:500'],
            'email_dinas' => ['required', 'string', 'email', 'max:255'],
            'telepon_kantor' => ['nullable', 'string', 'max:50'],
            'website_dinas' => ['nullable', 'string', 'max:255'],
            'nama_pimpinan' => ['nullable', 'string', 'max:255'],
            'nip_pimpinan' => ['nullable', 'string', 'max:50'],
        ], [
            'nama_instansi.required' => 'Nama Instansi/Perangkat Daerah wajib diisi.',
            'alamat_kantor.required' => 'Alamat kantor resmi wajib diisi untuk pencetakan kop laporan otomatis.',
            'email_dinas.required' => 'Email resmi kedinasan wajib diisi.',
            'email_dinas.email' => 'Format email resmi dinas tidak valid.',
        ]);

        $user = $request->user();
        $user->fill($validated);
        $user->save();

        return redirect()->route('inovator.profil')
            ->with('status_instansi', 'Detail informasi instansi berhasil diperbarui dan siap digunakan untuk pencetakan laporan otomatis.');
    }

    /**
     * Memperbarui Kata Sandi Akun
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ], [
            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'current_password.current_password' => 'Kata sandi saat ini yang Anda masukkan salah.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('inovator.profil')
            ->with('status_password', 'Kata sandi akun Anda berhasil diperbarui.');
    }
}
