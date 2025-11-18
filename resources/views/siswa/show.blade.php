@extends('layout.appadmin')

@section('title', 'Detail Alumni')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 fw-bold">Detail Data Alumni</h2>

    <div class="card p-4 shadow-sm mb-4">
        <h4>{{ $siswa->nama_lengkap }}</h4>
        <p><strong>NISN:</strong> {{ $siswa->nisn }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</p>
        <p><strong>Jurusan:</strong> {{ $siswa->jurusan }}</p>
        <p><strong>Tahun Lulus:</strong> {{ $siswa->tahun_lulus }}</p>
        <p><strong>Alamat:</strong> {{ $siswa->alamat ?? '-' }}</p>
    </div>

    <h4 class="fw-bold mb-3">Riwayat Pekerjaan</h4>

    @if($siswa->pekerjaans->isEmpty())
        <p class="text-muted">Belum ada data pekerjaan untuk alumni ini.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Perusahaan</th>
                    <th>Jabatan</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa->pekerjaans as $p)
                    <tr>
                        <td>{{ $p->nama_perusahaan }}</td>
                        <td>{{ $p->jabatan }}</td>
                        <td>{{ $p->tahun_masuk }}</td>
                        <td>{{ $p->tahun_keluar }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-3">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Data Alumni
    </a>
</div>
@endsection
