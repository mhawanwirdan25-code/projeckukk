<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaans = Pekerjaan::with('siswa')->get();
        return view('pekerjaan.index', compact('pekerjaans'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        return view('pekerjaan.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'nama_perusahaan' => 'required',
            'jabatan' => 'required',
        ]);

        Pekerjaan::create($request->all());
        return redirect()->route('pekerjaan.index')->with('success', 'Data pekerjaan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $siswas = Siswa::all();
        return view('pekerjaan.edit', compact('pekerjaan', 'siswas'));
    }

    public function update(Request $request, $id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);

        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'nama_perusahaan' => 'required',
            'jabatan' => 'required',
        ]);

        $pekerjaan->update($request->all());
        return redirect()->route('pekerjaan.index')->with('success', 'Data pekerjaan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Pekerjaan::findOrFail($id)->delete();
        return redirect()->route('pekerjaan.index')->with('success', 'Data pekerjaan berhasil dihapus!');
    }

        public function show($id)
    {
        $siswa = Siswa::with('pekerjaans')->findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }
}

