<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'jenis_kelamin',
        'jurusan',
        'tahun_lulus',
        'alamat',
    ];
    
    public function pekerjaans()
    {
        return $this->hasMany(Pekerjaan::class);
    }

}



