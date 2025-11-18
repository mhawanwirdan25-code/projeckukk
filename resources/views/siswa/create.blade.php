@extends('layout.appadmin')

@section('title', 'Tambah Alumni')

@section('content')
<h2 class="mb-4 fw-bold text-primary">Tambah Data Alumni</h2>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('siswa.store') }}" method="POST" class="card p-4 shadow-sm border-0">
  @csrf

  <div class="mb-3">
    <label for="nisn" class="form-label">NISN</label>
    <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn') }}" required>
  </div>

  <div class="mb-3">
    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
  </div>

  <div class="mb-3">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
      <option value="">-- Pilih Jenis Kelamin --</option>
      <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
      <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan</label>
    <select name="jurusan" id="jurusan" class="form-select" required>
      <option value="">-- Pilih Jurusan --</option>
      <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>RPL</option>
      <option value="TJKT" {{ old('jurusan') == 'TJKT' ? 'selected' : '' }}>TJKT</option>
      <option value="TKRO" {{ old('jurusan') == 'TKRO' ? 'selected' : '' }}>TKRO</option>
      <option value="TBSM" {{ old('jurusan') == 'TBSM' ? 'selected' : '' }}>TBSM</option>
      <option value="TB" {{ old('jurusan') == 'TB' ? 'selected' : '' }}>TB</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
    <input type="text" name="tahun_lulus" id="tahun_lulus" class="form-control" value="{{ old('tahun_lulus') }}">
  </div>

  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea>
  </div>

  <div class="text-end">
    <button type="submit" class="btn btn-success">
      <i class="fa-solid fa-save"></i> Simpan
    </button>
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
      <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
  </div>
</form>
@endsection
