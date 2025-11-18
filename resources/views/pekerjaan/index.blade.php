@extends('layout.appadmin')

@section('title', 'Data Pekerjaan')

@section('content')
<h2 class="mb-4 fw-bold">Data Pekerjaan Alumni</h2>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="text-end mb-3">
  <a href="{{ route('pekerjaan.create') }}" class="btn btn-primary">
    <i class="fa-solid fa-plus"></i> Tambah Pekerjaan
  </a>
</div>

<table class="table table-striped table-hover align-middle shadow-sm">
  <thead class="table-primary text-center">
    <tr>
      <th>No</th>
      <th>Nama Alumni</th>
      <th>Perusahaan</th>
      <th>Jabatan</th>
      <th>Tahun Masuk</th>
      <th>Tahun Keluar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($pekerjaans as $index => $p)
      <tr>
        <td class="text-center">{{ $index + 1 }}</td>
        <td>{{ $p->siswa->nama_lengkap ?? '-' }}</td>
        <td>{{ $p->nama_perusahaan }}</td>
        <td>{{ $p->jabatan }}</td>
        <td class="text-center">{{ $p->tahun_masuk ?? '-' }}</td>
        <td class="text-center">{{ $p->tahun_keluar ?? '-'}}</td>
        <td class="text-center">
          <a href="{{ route('siswa.show', $p->id) }}" class="btn btn-info btn-sm me-1">
              <i class="fa-solid fa-eye"></i>
          </a>
          <a href="{{ route('pekerjaan.edit', $p->id) }}" class="btn btn-sm btn-warning">
            <i class="fa-solid fa-pen"></i>
          </a>
          <form action="{{ route('pekerjaan.destroy', $p->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">
              <i class="fa-solid fa-trash"></i>
            </button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="7" class="text-center text-muted">Belum ada data pekerjaan.</td>
      </tr>
    @endforelse
  </tbody>
</table>
@endsection

@section('scripts')
<script>
    // Auto dismiss alert setelah 3 detik
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 3000);
</script>
@endsection
