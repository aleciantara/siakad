<?php

namespace App\Models;

use App\Models\User;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nidn',
        'id_user',
    ];

    public function user()
    {
      return $this->belongsTo(User::class, 'id_user');
    }

    // public function user():BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'id_user', 'id');
    // }

    public function matakuliahs()
   {
       return $this->hasMany(MataKuliah::class);
   }

}
