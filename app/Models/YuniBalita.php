<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YuniBalita extends Model
{
    use HasFactory;

    protected $table = 'yuni_balitas';

    protected $fillable = [
        'nama_balita',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'berat_lahir',
        'panjang_lahir',
        'umur',
        'nama_ortu',
        'no_hp_ortu',
        'alamat',
        'posyandu_id',
        'catatan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'berat_lahir' => 'decimal:2',
        'panjang_lahir' => 'decimal:2',
        'umur' => 'integer',
    ];

    public function posyandu()
    {
        return $this->belongsTo(YuniPosyandu::class, 'posyandu_id');
    }

    public function pemeriksaans()
    {
        return $this->hasMany(\App\Models\YuniPemeriksaan::class, 'balita_id');
    }
}
