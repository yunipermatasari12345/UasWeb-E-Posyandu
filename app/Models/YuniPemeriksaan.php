<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class YuniPemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'yuni_pemeriksaans';

    protected $fillable = [
        'balita_id',
        'kader_id',
        'user_id',
        'tanggal',
        'berat_badan',
        'tinggi_badan',
        'catatan',
    ];

    public function balita(): BelongsTo
    {
        return $this->belongsTo(YuniBalita::class, 'balita_id');
    }

    public function kader(): BelongsTo
    {
        return $this->belongsTo(YuniKader::class, 'kader_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
