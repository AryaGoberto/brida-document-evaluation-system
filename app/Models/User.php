<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'email',
    'password',
    'role',
    'nama_instansi',
    'alamat_kantor',
    'email_dinas',
    'telepon_kantor',
    'website_dinas',
    'nama_pimpinan',
    'nip_pimpinan',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /** Cek apakah user adalah Inovator (OPD) */
    public function isInovator(): bool
    {
        return $this->role === 'inovator';
    }

    /** Cek apakah user adalah Evaluator BRIDA */
    public function isEvaluator(): bool
    {
        return in_array($this->role, ['evaluator', 'admin']);
    }

    /** URL dashboard sesuai role */
    public function dashboardRoute(): string
    {
        return match ($this->role) {
            'evaluator', 'admin' => route('evaluator.dashboard'),
            default              => route('inovator.dashboard'),
        };
    }

    /** Pengajuan inovasi yang dibuat oleh user (Inovator) */
    public function inovasis(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Inovasi::class, 'user_id');
    }

    /** Inovasi yang diverifikasi oleh user (Evaluator) */
    public function verifikasis(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Inovasi::class, 'evaluator_id');
    }
}
