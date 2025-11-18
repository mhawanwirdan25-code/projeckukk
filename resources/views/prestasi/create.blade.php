@extends('layout.appadmin')

@section('title', 'Tambah Prestasi Alumni')

@section('content')
<div class="card p-4 shadow">
  <h3 class="mb-3 text-primary"><i class="fa-solid fa-trophy"></i> Tambah Prestasi Alumni</h3>

  <form action="{{ route('prestasi.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label class="form-label">Nama Alumni</label>
      <select name="siswa_id" class="form-select" required>
        <option value="">-- Pilih Alumni --</option>
        @foreach ($siswas as $siswa)
          <option value="{{ $siswa->id }}">{{ $siswa->nama_lengkap }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Nama Prestasi</label>
      <input type="text" name="nama_prestasi" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tingkat</label>
      <input type="text" name="tingkat" class="form-control" required placeholder="Contoh: Nasional">
    </div>

    <div class="mb-3">
      <label class="form-label">Tahun</label>
      <input type="number" name="tahun" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Keterangan</label>
      <textarea name="keterangan" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success">
      <i class="fa-solid fa-save"></i> Simpan
    </button>
    <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">
      <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
  </form>
</div>
@endsection
