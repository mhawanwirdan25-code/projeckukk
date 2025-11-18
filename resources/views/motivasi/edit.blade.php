@extends('layout.appadmin')

@section('title', 'Edit Motivasi Alumni')

@section('content')
<div class="card p-4 shadow">
  <h3 class="mb-3 text-primary">Edit Motivasi Alumni</h3>

  <form action="{{ route('motivasi.update', $motivasi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nama Alumni</label>
      <select name="siswa_id" class="form-control" required>
        <option value="">-- Pilih Alumni --</option>
        @foreach ($siswas as $s)
          <option value="{{ $s->id }}" {{ $motivasi->siswa_id == $s->id ? 'selected' : '' }}>
            {{ $s->nama }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Pesan Motivasi</label>
      <textarea name="pesan_motivasi" class="form-control" rows="4" required>{{ $motivasi->pesan_motivasi }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('motivasi.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
