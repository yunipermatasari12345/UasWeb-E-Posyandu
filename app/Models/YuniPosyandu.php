<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class YuniPosyandu extends Model
{
    use HasFactory;

    protected $table = 'yuni_posyandus';

    protected $fillable = [
        'nama_posyandu',
        'alamat',
        'kelurahan',
    ];

    public function jadwals(): HasMany
    {
        return $this->hasMany(YuniJadwal::class, 'posyandu_id');
    }

    public function kaders(): HasMany
    {
        return $this->hasMany(YuniKader::class, 'posyandu_id');
    }
}
