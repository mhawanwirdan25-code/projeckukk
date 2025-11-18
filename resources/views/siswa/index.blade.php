@extends('layout.appadmin')

@section('title', 'Data Alumni')

@section('content')
<div class="container">
  <h2 class="mb-4 fw-bold text-primary">Data Alumni</h2>

  {{-- Notifikasi sukses --}}
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  {{-- Tombol tambah --}}
  <div class="text-end mb-3">
    <a href="{{ route('siswa.create') }}" class="btn btn-primary">
      <i class="fa-solid fa-plus"></i> Tambah Alumni
    </a>
  </div>

  {{-- Tabel Data --}}
  <table class="table table-striped table-hover align-middle shadow-sm">
    <thead class="table-primary text-center">
      <tr>
        <th>No</th>
        <th>NISN</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Jurusan</th>
        <th>Tahun Lulus</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($siswa as $index => $item)
        <tr>
          <td class="text-center">{{ $index + 1 }}</td>
          <td>{{ $item->nisn }}</td>
          <td>{{ $item->nama_lengkap }}</td>
          <td>{{ $item->jenis_kelamin }}</td>
          <td>{{ $item->jurusan }}</td>
          <td class="text-center">{{ $item->tahun_lulus }}</td>
          <td>{{ $item->alamat }}</td>
          <td class="text-center">
            {{-- Tombol Detail --}}
            <a href="{{ route('siswa.show', $item->id) }}" class="btn btn-info btn-sm me-1">
              <i class="fa-solid fa-eye"></i> 
            </a>
            {{-- Tombol Edit --}}
            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-sm btn-warning me-1">
              <i class="fa-solid fa-pen"></i>
            </a>
            {{-- Tombol Hapus --}}
            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="d-inline">
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
          <td colspan="8" class="text-center text-muted py-4">
            Belum ada data alumni.
          </td>
        </tr>
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

