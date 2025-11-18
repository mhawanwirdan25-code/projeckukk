@extends('layout.appadmin')

@section('title', 'Edit Data Alumni')

@section('content')
<h2 class="mb-4 fw-bold text-primary">Edit Data Alumni</h2>

{{-- Tampilkan error validasi --}}
@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('siswa.update', $siswa->id) }}" method="POST" class="card p-4 shadow-sm border-0">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="nisn" class="form-label">NISN</label>
    <input type="text" name="nisn" id="nisn" class="form-control"
           value="{{ old('nisn', $siswa->nisn) }}" required>
  </div>

  <div class="mb-3">
    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
           value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}" required>
  </div>

  <div class="mb-3">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
      <option value="">-- Pilih Jenis Kelamin --</option>
      <option value="Laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
      <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan</label>
    <input type="text" name="jurusan" id="jurusan" class="form-control"
           value="{{ old('jurusan', $siswa->jurusan) }}">
  </div>

  <div class="mb-3">
    <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
    <input type="text" name="tahun_lulus" id="tahun_lulus" class="form-control"
           value="{{ old('tahun_lulus', $siswa->tahun_lulus) }}">
  </div>

  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat', $siswa->alamat) }}</textarea>
  </div>

  <div class="text-end">
    <button type="submit" class="btn btn-success">
      <i class="fa-solid fa-save"></i> Simpan Perubahan
    </button>
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
      <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
  </div>
</form>
@endsection
