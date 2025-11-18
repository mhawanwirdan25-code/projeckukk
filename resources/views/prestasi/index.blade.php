@extends('layout.appadmin')

@section('title', 'Data Prestasi Alumni')

@section('content')
<div class="card p-4 shadow">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-primary"><i class="fa-solid fa-trophy"></i> Data Prestasi Alumni</h3>
    <a href="{{ route('prestasi.create') }}" class="btn btn-primary">
      <i class="fa-solid fa-plus"></i> Tambah Prestasi
    </a>
  </div>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-striped align-middle">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Nama Alumni</th>
        <th>Nama Prestasi</th>
        <th>Tingkat</th>
        <th>Tahun</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($prestasis as $index => $prestasi)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $prestasi->siswa->nama_lengkap }}</td>
          <td>{{ $prestasi->nama_prestasi }}</td>
          <td>{{ $prestasi->tingkat }}</td>
          <td>{{ $prestasi->tahun }}</td>
          <td>{{ $prestasi->keterangan }}</td>
          <td>
            <a href="{{ route('prestasi.edit', $prestasi->id) }}" class="btn btn-warning btn-sm">
              <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('prestasi.destroy', $prestasi->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center">Belum ada data prestasi</td>
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

