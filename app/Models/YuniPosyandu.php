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
        'kecamatan',
        'no_hp',
        'email',
        'nama_ketua',
        'no_hp_ketua',
        'deskripsi',
    ];

    public function jadwals(): HasMany
    {
        return $this->hasMany(YuniJadwal::class, 'posyandu_id');
    }

    public function kaders(): HasMany
    {
        return $this->hasMany(YuniKader::class, 'posyandu_id');
    }

    public function balitas(): HasMany
    {
        return $this->hasMany(YuniBalita::class, 'posyandu_id');
    }
}
