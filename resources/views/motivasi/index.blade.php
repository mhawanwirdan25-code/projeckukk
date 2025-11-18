@extends('layout.appadmin')

@section('title', 'Data Motivasi Alumni')

@section('content')
<div class="container mt-4">
    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-primary mb-0"> <i class="fa fa-book"></i> Data Motivasi Alumni</h3>
            <a href="{{ route('motivasi.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Motivasi
            </a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 25%">Nama Alumni</th>
                        <th>Pesan Motivasi</th>
                        <th style="width: 20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($motivasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->siswa->nama_lengkap ?? 'Nama tidak ditemukan' }}</td>
                            <td class="text-start">{{ $item->pesan_motivasi }}</td>
                            <td>
                                <a href="{{ route('motivasi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('motivasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus motivasi ini?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted">Belum ada data motivasi alumni.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
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

