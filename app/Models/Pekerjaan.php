<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'nama_perusahaan',
        'jabatan',
        'tahun_masuk',
        'tahun_keluar',
        'deskripsi'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
