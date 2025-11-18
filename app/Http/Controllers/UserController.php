<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\PendidikanLanjut;
use App\Models\Pekerjaan;
use App\Models\Prestasi;
use App\Models\Motivasi;

class UserController extends Controller
{
    public function home()
    {
        $alumniTerbaru = Siswa::latest()->take(3)->get();
        return view('user.home', compact('alumniTerbaru'));
    }

    public function alumni()
    {
        $search = request()->search;

        $siswa = Siswa::when($search, function ($query) use ($search) {
            $query->where('nama_lengkap', 'like', "%$search%")
                ->orWhere('jurusan', 'like', "%$search%")
                ->orWhere('tahun_lulus', 'like', "%$search%");
        })
        ->orderBy('tahun_lulus', 'desc')
        ->get();

        return view('user.alumni', compact('siswa', 'search'));
    }


    public function pendidikan()
    {
        $pendidikan = PendidikanLanjut::all();
        $pekerjaan = Pekerjaan::all();
        return view('user.pendidikan', compact('pendidikan', 'pekerjaan'));
    }

    public function prestasi()
    {
        $prestasi = Prestasi::all();
        return view('user.prestasi', compact('prestasi'));
    }

    public function motivasi()
    {
        $motivasi = Motivasi::with('siswa')->latest()->get();
        return view('user.motivasi', compact('motivasi'));
    }
}
