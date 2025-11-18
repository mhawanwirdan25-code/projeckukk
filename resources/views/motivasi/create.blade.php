@extends('layout.appadmin')

@section('title', 'Tambah Motivasi Alumni')

@section('content')
<div class="card p-4 shadow">
  <h3 class="mb-3 text-primary">Tambah Motivasi Alumni</h3>

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

  <form action="{{ route('motivasi.store') }}" method="POST">
    @csrf

    {{-- Dropdown Alumni --}}
    <div class="mb-3">
      <label for="siswa_id" class="form-label">Nama Alumni</label>
      <select name="siswa_id" id="siswa_id" class="form-select" required>
        <option value="">-- Pilih Alumni --</option>
        @foreach ($siswas as $siswa)
          <option value="{{ $siswa->id }}" {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>
            {{ $siswa->nama_lengkap }} ({{ $siswa->jurusan }}, {{ $siswa->tahun_lulus }})
          </option>
        @endforeach
      </select>
    </div>

    {{-- Pesan Motivasi --}}
    <div class="mb-3">
      <label for="pesan_motivasi" class="form-label">Pesan Motivasi</label>
      <textarea name="pesan_motivasi" id="pesan_motivasi" class="form-control" rows="4" required>{{ old('pesan_motivasi') }}</textarea>
    </div>

    <div class="text-end">
      <button type="submit" class="btn btn-success">
        <i class="fa-solid fa-save"></i> Simpan
      </button>
      <a href="{{ route('motivasi.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Kembali
      </a>
    </div>
  </form>
</div>
@endsection
