<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BerkasIndikator extends Model
{
    use HasFactory;

    protected $table = 'berkas_indikators';

    protected $fillable = [
        'inovasi_id',
        'nomor_indikator',
        'nama_indikator',
        'nama_file_asli',
        'file_path',
        'file_size',
        'tipe_file',
        'status_berkas',
        'catatan_revisi',
    ];

    protected function casts(): array
    {
        return [
            'nomor_indikator' => 'integer',
        ];
    }

    /** Relasi ke Inovasi induk */
    public function inovasi(): BelongsTo
    {
        return $this->belongsTo(Inovasi::class);
    }
}
