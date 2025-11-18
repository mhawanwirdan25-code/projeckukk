@extends('user.layout')

@section('content')
<div class="container mt-5">

    <h2 class="text-center text-success mb-4">Data Alumni Sekolah</h2>

    <form method="GET" action="{{ route('user.alumni') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control"
                   placeholder="Cari nama, jurusan, atau angkatan...">
            <button class="btn btn-success" type="submit">Cari</button>
        </div>
    </form>

    <table class="table table-striped table-bordered shadow-sm">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswa as $no => $al)
            <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $al->nama_lengkap }}</td>
                <td>{{ $al->jurusan }}</td>
                <td>{{ $al->tahun_lulus }}</td>
                <td>{{ $al->jenis_kelamin }}</td>
                <td>{{ $al->alamat }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-danger">Data tidak ditemukan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
