<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        // Coba ambil data asli dulu
        $totalAlumni = Siswa::count();
        $totalPekerjaan = Siswa::whereNotNull('pekerjaan')->count();
        $totalPendidikan = Siswa::whereNotNull('pendidikan_lanjut')->count();
        $totalPrestasi = Siswa::whereNotNull('prestasi')->count();

        // Kalau semua masih nol, tampilkan data dummy sementara
        if ($totalAlumni == 0 && $totalPekerjaan == 0 && $totalPendidikan == 0 && $totalPrestasi == 0) {
            $totalAlumni = 120;
            $totalPekerjaan = 78;
            $totalPendidikan = 32;
            $totalPrestasi = 10;
        }

        // Data motivasi (dummy sementara)
        $motivasi = [
            (object)[ 'nama' => 'Rina Aulia', 'pesan' => 'Jangan takut bermimpi besar, karena semua berawal dari langkah kecil.' ],
            (object)[ 'nama' => 'Budi Setiawan', 'pesan' => 'Ilmu yang bermanfaat adalah warisan terbaik untuk masa depan.' ],
            (object)[ 'nama' => 'Siti Rahma', 'pesan' => 'Gagal sekali bukan akhir, tapi tanda kamu sedang belajar menuju sukses.' ]
        ];

        return view('siswa.index', compact(
            'totalAlumni',
            'totalPekerjaan',
            'totalPendidikan',
            'totalPrestasi',
            'motivasi'
        ));
    }
}

