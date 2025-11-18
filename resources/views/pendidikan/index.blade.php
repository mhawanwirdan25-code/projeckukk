@extends('layout.appadmin')

@section('title', 'Data Pendidikan Lanjut')

@section('content')
<div class="container">
  <h2 class="mb-4 fw-bold text-primary"><i class="fa-solid fa-graduation-cap"></i> Data Pendidikan Lanjut</h2>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <div class="text-end mb-3">
    <a href="{{ route('pendidikan.create') }}" class="btn btn-primary">
      <i class="fa-solid fa-plus"></i> Tambah Data
    </a>
  </div>

  <table class="table table-bordered table-striped shadow-sm align-middle">
    <thead class="table-primary text-center">
      <tr>
        <th>No</th>
        <th>Nama Alumni</th>
        <th>Nama Kampus</th>
        <th>Jurusan</th>
        <th>Tahun Masuk</th>
        <th>Tahun Lulus</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($pendidikans as $index => $item)
        <tr>
          <td class="text-center">{{ $index + 1 }}</td>
          <td>{{ $item->siswa->nama_lengkap ?? '-' }}</td>
          <td>{{ $item->nama_kampus }}</td>
          <td>{{ $item->jurusan }}</td>
          <td class="text-center">{{ $item->tahun_masuk ?? '-' }}</td>
          <td class="text-center">{{ $item->tahun_lulus ?? '-' }}</td>
          <td class="text-center">
            <a href="{{ route('siswa.show', $item->id) }}" class="btn btn-info btn-sm me-1">
              <i class="fa-solid fa-eye"></i> 
            </a>
            <a href="{{ route('pendidikan.edit', $item->id) }}" class="btn btn-warning btn-sm me-1">
              <i class="fa-solid fa-pen"></i>
            </a>
            <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7" class="text-center text-muted">Belum ada data pendidikan lanjut.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
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

