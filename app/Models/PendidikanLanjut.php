<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanLanjut extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'nama_kampus',
        'jurusan',
        'tahun_masuk',
        'tahun_lulus',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
