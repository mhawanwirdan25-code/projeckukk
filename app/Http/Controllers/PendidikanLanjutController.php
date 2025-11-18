<?php

namespace App\Http\Controllers;

use App\Models\PendidikanLanjut;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PendidikanLanjutController extends Controller
{
    // 🔹 Menampilkan semua data pendidikan lanjut
    public function index()
    {
        // Mengambil semua data pendidikan lanjut beserta nama siswa/alumni
        $pendidikans = PendidikanLanjut::with('siswa')->get();
        return view('pendidikan.index', compact('pendidikans'));
    }

    // 🔹 Form tambah data
    public function create()
    {
        $siswas = Siswa::all();
        return view('pendidikan.create', compact('siswas'));
    }

    // 🔹 Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'nama_kampus' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_masuk' => 'nullable|numeric',
            'tahun_lulus' => 'nullable|numeric',
        ]);

        PendidikanLanjut::create([
            'siswa_id'     => $request->siswa_id,
            'nama_kampus'  => $request->nama_kampus,
            'jurusan'      => $request->jurusan,
            'tahun_masuk'  => $request->tahun_masuk,
            'tahun_lulus'  => $request->tahun_lulus,
        ]);

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan lanjut berhasil ditambahkan!');
    }

    // 🔹 Form edit data
    public function edit($id)
    {
        $pendidikan = PendidikanLanjut::findOrFail($id);
        $siswas = Siswa::all();
        return view('pendidikan.edit', compact('pendidikan', 'siswas'));
    }

    // 🔹 Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'nama_kampus' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tahun_masuk' => 'nullable|numeric',
            'tahun_lulus' => 'nullable|numeric',
        ]);

        $pendidikan = PendidikanLanjut::findOrFail($id);

        $pendidikan->update([
            'siswa_id'     => $request->siswa_id,
            'nama_kampus'  => $request->nama_kampus,
            'jurusan'      => $request->jurusan,
            'tahun_masuk'  => $request->tahun_masuk,
            'tahun_lulus'  => $request->tahun_lulus,
        ]);

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan lanjut berhasil diperbarui!');
    }

    // 🔹 Hapus data
    public function destroy($id)
    {
        $pendidikan = PendidikanLanjut::findOrFail($id);
        $pendidikan->delete();

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan lanjut berhasil dihapus!');
    }

    // 🔹 Tambahan: Halaman detail (show)
    public function show($id)
    {
        $pendidikan = PendidikanLanjut::with('siswa')->findOrFail($id);
        return view('pendidikan.show', compact('pendidikan'));
    }
}
