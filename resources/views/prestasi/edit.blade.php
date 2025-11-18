@extends('layout.appadmin')

@section('title', 'Edit Data Prestasi')

@section('content')
<div class="card p-4 shadow">
  <h3 class="mb-3 text-warning"><i class="fa-solid fa-trophy"></i> Edit Data Prestasi Alumni</h3>

  <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nama Alumni</label>
      <select name="siswa_id" class="form-select" required>
        <option value="">-- Pilih Alumni --</option>
        @foreach ($siswas as $siswa)
          <option value="{{ $siswa->id }}" {{ $siswa->id == $prestasi->siswa_id ? 'selected' : '' }}>
            {{ $siswa->nama_lengkap }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Nama Prestasi</label>
      <input type="text" name="nama_prestasi" class="form-control" value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tingkat</label>
      <input type="text" name="tingkat" class="form-control" value="{{ old('tingkat', $prestasi->tingkat) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Tahun</label>
      <input type="number" name="tahun" class="form-control" value="{{ old('tahun', $prestasi->tahun) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Deskripsi Prestasi</label>
      <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
    </div>

    <div class="d-flex justify-content-between">
      <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Kembali
      </a>
      <button type="submit" class="btn btn-warning">
        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
      </button>
    </div>
  </form>
</div>
@endsection
