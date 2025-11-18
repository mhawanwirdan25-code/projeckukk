@extends('layout.appadmin')

@section('title', 'Detail Pendidikan Lanjut')

@section('content')
<div class="container">
  <h2 class="mb-4 fw-bold text-info">
    <i class="fa-solid fa-eye"></i> Detail Pendidikan Lanjut
  </h2>

  <div class="card shadow-sm p-4">
    <table class="table table-bordered">
      <tr>
        <th>Nama Alumni</th>
        <td>{{ $pendidikan->siswa->nama_lengkap ?? '-' }}</td>
      </tr>
      <tr>
        <th>Nama Kampus</th>
        <td>{{ $pendidikan->nama_kampus }}</td>
      </tr>
      <tr>
        <th>Jurusan</th>
        <td>{{ $pendidikan->jurusan }}</td>
      </tr>
      <tr>
        <th>Tahun Masuk</th>
        <td>{{ $pendidikan->tahun_masuk ?? '-' }}</td>
      </tr>
      <tr>
        <th>Tahun Lulus</th>
        <td>{{ $pendidikan->tahun_lulus ?? '-' }}</td>
      </tr>
    </table>

    <div class="text-end">
      <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">Kembali</a>
      <a href="{{ route('pendidikan.edit', $pendidikan->id) }}" class="btn btn-warning">
        <i class="fa-solid fa-pen"></i> Edit
      </a>
    </div>
  </div>
</div>
@endsection
