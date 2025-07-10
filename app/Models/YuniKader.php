<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class YuniKader extends Model
{
    use HasFactory;

    protected $table = 'yuni_kaders';

    protected $fillable = [
        'nama_kader',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'email',
        'pendidikan',
        'pekerjaan',
        'posyandu_id',
        'tanggal_bergabung',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_bergabung' => 'date',
    ];

    public function posyandu(): BelongsTo
    {
        return $this->belongsTo(YuniPosyandu::class, 'posyandu_id');
    }

    public function pemeriksaans(): HasMany
    {
        return $this->hasMany(\App\Models\YuniPemeriksaan::class, 'kader_id');
    }
}
