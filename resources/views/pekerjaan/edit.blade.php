@extends('layout.appadmin')

@section('title', 'Edit Data Pekerjaan')

@section('content')
<h2 class="mb-4 fw-bold text-primary">Edit Data Pekerjaan</h2>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('pekerjaan.update', $pekerjaan->id) }}" method="POST" class="card p-4 shadow-sm border-0">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label>Nama Alumni</label>
    <select name="siswa_id" class="form-control" required>
      @foreach($siswas as $s)
        <option value="{{ $s->id }}" {{ $s->id == $pekerjaan->siswa_id ? 'selected' : '' }}>
          {{ $s->nama_lengkap }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label>Nama Perusahaan</label>
    <input type="text" name="nama_perusahaan" class="form-control" 
           value="{{ old('nama_perusahaan', $pekerjaan->nama_perusahaan) }}" required>
  </div>

  <div class="mb-3">
    <label>Jabatan</label>
    <input type="text" name="jabatan" class="form-control" 
           value="{{ old('jabatan', $pekerjaan->jabatan) }}" required>
  </div>

  <div class="mb-3">
    <label>Tahun Masuk</label>
    <input type="text" name="tahun_masuk" class="form-control" 
           value="{{ old('tahun_masuk', $pekerjaan->tahun_masuk) }}">
  </div>

  <div class="mb-3">
    <label>Tahun Keluar</label>
    <input type="text" name="tahun_keluar" class="form-control" 
           value="{{ old('tahun_keluar', $pekerjaan->tahun_keluar) }}">
  </div>

  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $pekerjaan->deskripsi) }}</textarea>
  </div>

  <div class="text-end">
    <button type="submit" class="btn btn-success">
      <i class="fa-solid fa-save"></i> Simpan Perubahan
    </button>
    <a href="{{ route('pekerjaan.index') }}" class="btn btn-secondary">
      <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
  </div>
</form>
@endsection
