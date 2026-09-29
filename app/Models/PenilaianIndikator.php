<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenilaianIndikator extends Model
{
    use HasFactory;

    protected $table = 'penilaian_indikators';

    protected $fillable = [
        'inovasi_id',
        'nomor_indikator',
        'nama_indikator',
        'bobot',
        'skor_ai_bintang',
        'poin_ai',
        'ringkasan_ai',
        'confidence_score',
        'halaman_relevan',
        'status_validasi_ai',
        'evaluator_id',
        'skor_evaluator_bintang',
        'poin_evaluator',
        'catatan_evaluator',
        'status_verifikasi',
    ];

    protected function casts(): array
    {
        return [
            'nomor_indikator'       => 'integer',
            'bobot'                 => 'float',
            'skor_ai_bintang'       => 'integer',
            'poin_ai'               => 'float',
            'confidence_score'      => 'float',
            'halaman_relevan'       => 'array',
            'skor_evaluator_bintang'=> 'integer',
            'poin_evaluator'        => 'float',
        ];
    }

    /** Relasi ke Inovasi induk */
    public function inovasi(): BelongsTo
    {
        return $this->belongsTo(Inovasi::class);
    }

    /** Relasi ke Evaluator yang memverifikasi */
    public function evaluator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'evaluator_id');
    }
}
