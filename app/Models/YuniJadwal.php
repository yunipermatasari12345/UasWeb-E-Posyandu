<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class YuniJadwal extends Model
{
    use HasFactory;

    protected $table = 'yuni_jadwals';

    protected $fillable = [
        'posyandu_id',
        'kegiatan',
        'jenis_kegiatan',
        'tanggal',
        'jam',
        'deskripsi',
        'target_peserta',
        'penanggung_jawab',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function posyandu(): BelongsTo
    {
        return $this->belongsTo(YuniPosyandu::class, 'posyandu_id');
    }
}
