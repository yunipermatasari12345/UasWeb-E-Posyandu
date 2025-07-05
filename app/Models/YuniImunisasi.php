<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class YuniImunisasi extends Model
{
    use HasFactory;

    protected $table = 'yuni_imunisasis';

    protected $fillable = [
        'nama_imunisasi',
        'deskripsi',
        'tanggal',
        'posyandu_id',
    ];

    public function posyandu(): BelongsTo
    {
        return $this->belongsTo(YuniPosyandu::class, 'posyandu_id');
    }
}
