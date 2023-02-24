<?php

namespace App\Models;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatkulMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_matkul',
        'id_mahasiswa',
    ];

    public function mahasiswa():BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function matakuliah():BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'id_matkul', 'id');
    }
}
