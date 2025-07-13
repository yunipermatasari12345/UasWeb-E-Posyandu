<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class YuniAdmin extends Model
{
    use HasFactory;

    protected $table = 'yuni_admins';

    protected $fillable = [
        'user_id',
        'nip',
        'jabatan',
        'unit_kerja',
        'tanggal_bergabung',
        'status_aktif',
        'catatan',
    ];

    protected $casts = [
        'tanggal_bergabung' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isActive(): bool
    {
        return $this->status_aktif === 'aktif';
    }
}
