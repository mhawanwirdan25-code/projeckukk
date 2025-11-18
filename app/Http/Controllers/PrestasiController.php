<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Siswa;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::with('siswa')->get();
        return view('prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        return view('prestasi.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'nama_prestasi' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'tahun' => 'required|digits:4',
            'keterangan' => 'nullable|string',
        ]);

        Prestasi::create($request->all());

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $siswas = Siswa::all();
        return view('prestasi.edit', compact('prestasi', 'siswas'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'nama_prestasi' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'tahun' => 'required|digits:4',
            'keterangan' => 'nullable|string',
        ]);

        $prestasi->update($request->all());

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->delete();

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil dihapus!');
    }
}
