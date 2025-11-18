@extends('layout.appadmin')

@section('title', 'Tambah Pendidikan Lanjut')

@section('content')
<div class="card p-4 shadow">
  <h3 class="mb-4 text-primary"><i class="fa-solid fa-user-graduate"></i> Tambah Pendidikan Lanjut</h3>

  <form action="{{ route('pendidikan.store') }}" method="POST">
    @csrf

    <select name="siswa_id" class="form-select" required>
        <option value="">-- Pilih Nama Alumni --</option>
        @foreach($siswas as $s)
            <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
        @endforeach
    </select>


    <div class="mb-3">
      <label class="form-label fw-bold">Nama Kampus</label>
      <input type="text" name="nama_kampus" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Jurusan</label>
      <input type="text" name="jurusan" class="form-control" required>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Tahun Masuk</label>
        <input type="number" name="tahun_masuk" class="form-control">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Tahun Lulus</label>
        <input type="number" name="tahun_lulus" class="form-control">
      </div>
    </div>

    <div class="text-end">
      <button type="submit" class="btn btn-success">
        <i class="fa-solid fa-save"></i> Simpan
      </button>
      <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Kembali
      </a>
    </div>
  </form>
</div>
@endsection
