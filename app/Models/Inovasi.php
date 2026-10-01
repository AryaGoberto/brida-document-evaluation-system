<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inovasi extends Model
{
    use HasFactory;

    protected $table = 'inovasis';

    protected $fillable = [
        'user_id',
        'kode_registrasi',
        'judul_inovasi',
        'kategori',
        'urusan_pemerintahan',
        'nama_opd',
        'waktu_uji_coba',
        'waktu_implementasi',
        'rancang_bangun',
        'tujuan_inovasi',
        'manfaat_inovasi',
        'pic_nama',
        'pic_nip',
        'pic_jabatan',
        'pic_telepon',
        'pic_email',
        'sdgs',
        'pakta_integritas',
        'status',
        'tahap',
        'skor_ai_total',
        'predikat_ai',
        'catatan_ai',
        'progress_ocr',
        'skor_final',
        'status_kelulusan',
        'rekomendasi_final',
        'nomor_ba',
        'tanggal_sidang',
        'evaluator_id',
        'evaluator_ketua',
        'evaluator_anggota',
        'catatan_revisi_umum',
        'status_terkunci',
        'submitted_at',
        'verified_at',
    ];

    protected function casts(): array
    {
        return [
            'sdgs'              => 'array',
            'pakta_integritas'  => 'boolean',
            'status_terkunci'   => 'boolean',
            'waktu_uji_coba'    => 'date',
            'waktu_implementasi'=> 'date',
            'tanggal_sidang'    => 'date',
            'submitted_at'      => 'datetime',
            'verified_at'       => 'datetime',
            'skor_ai_total'     => 'float',
            'skor_final'        => 'float',
            'progress_ocr'      => 'integer',
        ];
    }

    /** Relasi: Inovasi milik satu User Inovator */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** Relasi: Inovasi diverifikasi oleh User Evaluator */
    public function evaluator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'evaluator_id');
    }

    /** Relasi: 21 Berkas bukti dukung indikator */
    public function berkas(): HasMany
    {
        return $this->hasMany(BerkasIndikator::class, 'inovasi_id');
    }

    public function berkasIndikator(): HasMany
    {
        return $this->berkas();
    }

    /** Relasi: Penilaian 19 indikator (AI & Evaluator) */
    public function penilaian(): HasMany
    {
        return $this->hasMany(PenilaianIndikator::class, 'inovasi_id');
    }

    public function penilaianIndikator(): HasMany
    {
        return $this->penilaian();
    }

    // ==========================================
    // ACCESSOR HELPER (Kompatibilitas Blade Views)
    // ==========================================

    public function getKodeAttribute(): string
    {
        return $this->kode_registrasi ?? 'BRD-' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    public function getJudulAttribute(): string
    {
        return $this->judul_inovasi ?? '';
    }

    public function getNamaAttribute(): string
    {
        return $this->judul_inovasi ?? '';
    }

    public function getOpdAttribute(): string
    {
        return $this->nama_opd ?? '';
    }

    public function getDinasAttribute(): string
    {
        return $this->nama_opd ?? '';
    }

    public function getTanggalPengajuanAttribute(): string
    {
        return $this->submitted_at ? $this->submitted_at->format('d M Y') : ($this->created_at ? $this->created_at->format('d M Y') : '-');
    }

    public function getTanggalMasukAttribute(): string
    {
        return $this->submitted_at ? $this->submitted_at->format('d M Y H:i') : ($this->created_at ? $this->created_at->format('d M Y H:i') : '-');
    }

    public function getStatusCodeAttribute(): string
    {
        return $this->status ?? 'draft';
    }

    public function getStatusSistemAttribute(): string
    {
        return match ($this->status) {
            'draft'                 => 'Draft Tersimpan',
            'proses_ai'             => 'Sedang OCR / AI',
            'butuh_validasi'        => 'Butuh Validasi',
            'sedang_diverifikasi'   => 'Sedang Diverifikasi',
            'revisi'                => 'Revisi Diperlukan',
            'selesai'               => 'Selesai',
            'ditolak'               => 'Ditolak',
            default                 => ucfirst(str_replace('_', ' ', $this->status ?? '')),
        };
    }

    public function getStatusTypeAttribute(): string
    {
        return match ($this->status) {
            'draft'                 => 'draft',
            'proses_ai'             => 'proses',
            'butuh_validasi', 'sedang_diverifikasi' => 'validasi',
            'revisi'                => 'revisi',
            'selesai'               => 'selesai',
            default                 => 'draft',
        };
    }

    public function getAiScoreAttribute(): float
    {
        return (float) ($this->skor_ai_total ?? 0.0);
    }

    public function getBisaDiverifikasiAttribute(): bool
    {
        return in_array($this->status, ['butuh_validasi', 'sedang_diverifikasi', 'revisi']);
    }

    public function getTahapLabelAttribute(): string
    {
        return 'Tahap ' . ($this->tahap ?? 1) . ' dari 5';
    }

    public function getPicAttribute(): array
    {
        return [
            'nama'    => $this->pic_nama ?? '-',
            'nip'     => $this->pic_nip ?? '-',
            'jabatan' => $this->pic_jabatan ?? '-',
            'kontak'  => $this->pic_telepon ?? ($this->pic_email ?? '-'),
        ];
    }
}
