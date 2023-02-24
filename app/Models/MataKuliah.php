<?php

namespace App\Models;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matakuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_matakuliah',
        'id_dosen',
    ];

    public function dosen():BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }


}
