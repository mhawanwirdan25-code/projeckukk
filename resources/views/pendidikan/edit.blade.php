@extends('layout.appadmin')

@section('title', 'Edit Data Pendidikan Lanjut')

@section('content')
<div class="container">
  <h2 class="mb-4 fw-bold text-warning">
    <i class="fa-solid fa-pen-to-square"></i> Edit Data Pendidikan Lanjut
  </h2>

  <div class="card shadow-sm p-4">
    <form action="{{ route('pendidikan.update', $pendidikan->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="siswa_id" class="form-label">Nama Alumni</label>
        <select name="siswa_id" id="siswa_id" class="form-select" required>
          @foreach($siswas as $siswa)
            <option value="{{ $siswa->id }}" {{ $pendidikan->siswa_id == $siswa->id ? 'selected' : '' }}>
              {{ $siswa->nama_lengkap }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="nama_kampus" class="form-label">Nama Kampus</label>
        <input type="text" class="form-control" name="nama_kampus"
               value="{{ old('nama_kampus', $pendidikan->nama_kampus) }}" required>
      </div>

      <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" class="form-control" name="jurusan"
               value="{{ old('jurusan', $pendidikan->jurusan) }}" required>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
          <input type="number" class="form-control" name="tahun_masuk"
                 value="{{ old('tahun_masuk', $pendidikan->tahun_masuk) }}">
        </div>
        <div class="col-md-6 mb-3">
          <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
          <input type="number" class="form-control" name="tahun_lulus"
                 value="{{ old('tahun_lulus', $pendidikan->tahun_lulus) }}">
        </div>
      </div>

      <div class="text-end">
        <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-warning text-white">Perbarui</button>
      </div>
    </form>
  </div>
</div>
@endsection
