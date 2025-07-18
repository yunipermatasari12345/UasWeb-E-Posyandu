<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // admin, kader, user
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function pemeriksaans()
    {
        return $this->hasMany(\App\Models\YuniPemeriksaan::class, 'user_id');
    }

    public function admin()
    {
        return $this->hasOne(YuniAdmin::class);
    }

    public function kader()
    {
        return $this->hasOne(YuniKader::class, 'user_id');
    }

    public function isAdmin() { return $this->role === 'admin'; }
    public function isKader() { return $this->role === 'kader'; }
    public function isOrtu() { return $this->role === 'ortu'; }
    public function isSuperadmin() { return $this->role === 'superadmin'; }

    public function getAdminProfile()
    {
        return $this->admin;
    }

    public function getKaderProfile()
    {
        return $this->kader;
    }
}
