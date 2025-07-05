<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class YuniAnak extends Model
{
    use HasFactory;

    protected $table = 'yuni_anaks';

    protected $fillable = [
        'nama_anak',
        'tanggal_lahir',
        'jenis_kelamin',
        'ibu_id',
        'posyandu_id',
    ];

    public function ibu(): BelongsTo
    {
        return $this->belongsTo(YuniIbu::class, 'ibu_id');
    }

    public function posyandu(): BelongsTo
    {
        return $this->belongsTo(YuniPosyandu::class, 'posyandu_id');
    }
}
