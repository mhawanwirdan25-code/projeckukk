<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motivasi;
use App\Models\Siswa;

class MotivasiController extends Controller
{
    public function index()
    {
        // Ambil semua motivasi beserta relasi siswa (biar nama alumni langsung bisa dipakai)
        $motivasi = Motivasi::with('siswa')->get();
        return view('motivasi.index', compact('motivasi'));
    }

    public function create()
    {
        // Ambil semua data siswa buat dropdown pilihan nama alumni
        $siswas = Siswa::all();
        return view('motivasi.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'pesan_motivasi' => 'required|string',
        ]);

        Motivasi::create([
            'siswa_id' => $request->siswa_id,
            'pesan_motivasi' => $request->pesan_motivasi,
        ]);

        return redirect()->route('motivasi.index')->with('success', 'Motivasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $motivasi = Motivasi::findOrFail($id);
        $siswas = Siswa::all(); // buat dropdown edit nama alumni juga
        return view('motivasi.edit', compact('motivasi', 'siswas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'pesan_motivasi' => 'required|string',
        ]);

        $motivasi = Motivasi::findOrFail($id);
        $motivasi->update([
            'siswa_id' => $request->siswa_id,
            'pesan_motivasi' => $request->pesan_motivasi,
        ]);

        return redirect()->route('motivasi.index')->with('success', 'Motivasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $motivasi = Motivasi::findOrFail($id);
        $motivasi->delete();

        return redirect()->route('motivasi.index')->with('success', 'Motivasi berhasil dihapus!');
    }
}
