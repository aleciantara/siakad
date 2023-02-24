<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    public function dosen()
    {
        return $this->hasMany(Dosen::class);
    }

    public function mahasiswan()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    // public function dosen(): BelongsTo
    // {
    //     return $this->belongsTo(Dosen::class, 'nidn', 'user_id');
    // }

    // public function mahasiswa(): BelongsTo
    // {
    //     return $this->belongsTo(Mahasiswa::class, 'nim', 'user_id');
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
