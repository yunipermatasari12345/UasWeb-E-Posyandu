<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YuniPendaftaran extends Model
{
    protected $fillable = [
        'user_id',
        'nama_anak',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_ibu',
        'nik_ibu',
        'alamat',
        'no_hp',
        'jenis_pendaftaran',
        'usia_kehamilan',
        'catatan',
        'status',
        'catatan_admin',
        'admin_id',
        'tanggal_validasi',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_validasi' => 'datetime',
    ];

    // Relasi ke User (jika ada user yang login)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Admin yang memvalidasi
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
