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
        'tanggal_lahir',
        'nama_ortu',
        'alamat',
    ];

    public function pemeriksaans()
    {
        return $this->hasMany(\App\Models\YuniPemeriksaan::class, 'balita_id');
    }
}
