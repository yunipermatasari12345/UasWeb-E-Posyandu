<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class YuniIbu extends Model
{
    use HasFactory;

    protected $table = 'yuni_ibus';

    protected $fillable = [
        'nama_ibu',
        'nik',
        'alamat',
        'no_hp',
        'posyandu_id',
    ];

    public function posyandu(): BelongsTo
    {
        return $this->belongsTo(YuniPosyandu::class, 'posyandu_id');
    }

    public function anaks(): HasMany
    {
        return $this->hasMany(YuniAnak::class, 'ibu_id');
    }
}
