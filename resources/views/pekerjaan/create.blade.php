@extends('layout.appadmin')

@section('title', 'Tambah Data Pekerjaan')

@section('content')
<div class="card p-4 shadow border-0">
  <h3 class="mb-4 text-primary fw-bold">
    <i class="fa-solid fa-briefcase me-2"></i> Tambah Data Pekerjaan Alumni
  </h3>

  {{-- Pesan Error --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Form Tambah Pekerjaan --}}
  <form action="{{ route('pekerjaan.store') }}" method="POST">
    @csrf

    {{-- Nama Alumni --}}
    <div class="mb-3">
      <label class="form-label fw-semibold">
        <i class="fa-solid fa-user-graduate me-2"></i>Nama Alumni
      </label>
      <select name="siswa_id" class="form-select" required>
        <option value="">-- Pilih Alumni --</option>
        @foreach($siswas as $s)
          <option value="{{ $s->id }}" {{ old('siswa_id') == $s->id ? 'selected' : '' }}>
            {{ $s->nama_lengkap }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Nama Perusahaan --}}
    <div class="mb-3">
      <label class="form-label fw-semibold">
        <i class="fa-solid fa-building me-2"></i>Nama Perusahaan
      </label>
      <input type="text" name="nama_perusahaan" class="form-control"
             value="{{ old('nama_perusahaan') }}" required>
    </div>

    {{-- Jabatan --}}
    <div class="mb-3">
      <label class="form-label fw-semibold">
        <i class="fa-solid fa-id-card me-2"></i>Jabatan
      </label>
      <input type="text" name="jabatan" class="form-control"
             value="{{ old('jabatan') }}" required>
    </div>

    {{-- Tahun Masuk --}}
    <div class="mb-3">
      <label class="form-label fw-semibold">
        <i class="fa-solid fa-calendar-plus me-2"></i>Tahun Masuk
      </label>
      <input type="text" name="tahun_masuk" class="form-control"
             value="{{ old('tahun_masuk') }}">
    </div>

    {{-- Tahun Keluar --}}
    <div class="mb-3">
      <label class="form-label fw-semibold">
        <i class="fa-solid fa-calendar-minus me-2"></i>Tahun Keluar
      </label>
      <input type="text" name="tahun_keluar" class="form-control"
             value="{{ old('tahun_keluar') }}">
    </div>

    {{-- Deskripsi --}}
    {{-- <div class="mb-3">
      <label class="form-label fw-semibold">
        <i class="fa-solid fa-note-sticky me-2"></i>Deskripsi
      </label>
      <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
    </div> --}}

    {{-- Tombol --}}
    <div class="text-end">
      <button type="submit" class="btn btn-success me-2">
        <i class="fa-solid fa-save me-1"></i> Simpan
      </button>
      <a href="{{ route('pekerjaan.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
      </a>
    </div>
  </form>
</div>
@endsection
