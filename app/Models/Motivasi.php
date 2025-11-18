<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivasi extends Model
{
    use HasFactory;

    protected $table = 'motivasi';

    protected $fillable = [
        'siswa_id',
        'pesan_motivasi',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
