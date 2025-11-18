@extends('user.layout')

@section('content')

<!-- Hero Section -->
<section class="hero text-center text-white">
    <div class="container">
        <h1>Selamat Datang di Web Alumni Sekolah</h1>
        <p class="">
            Menjalin silaturahmi, mengenang masa indah, dan berbagi inspirasi bersama para alumni terbaik.
        </p>
        <a href="{{ route('user.alumni') }}" class="btn btn-light mt-4 px-4 py-2 fw-semibold">
            <i class="fa-solid fa-users"></i> Lihat Data Alumni
        </a>
    </div>
</section>

<!-- Alumni Terbaru -->
<section class="mt-5">
    <div class="container">
        <h2 class="text-center mb-4 text-success"><i class="fa-solid fa-graduation-cap"></i> Alumni Terbaru</h2>
        <div class="row">
            @forelse ($alumniTerbaru as $al)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $al->nama_lengkap }}</h5>
                            <p class="text-muted mb-1">Jurusan: {{ $al->jurusan }}</p>
                            <p class="text-success">Angkatan {{ $al->tahun_lulus }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada data alumni yang ditampilkan.</p>
            @endforelse
        </div>
    </div>
</section>

<!-- Tentang Alumni -->
<section class="mt-5 p-5 bg-light rounded shadow-sm">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('storage/D2.jpeg') }}" alt="Sekolah" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h3 class="text-success fw-bold mb-3">Tentang Sistem Alumni Sekolah</h3>
            <p>
                Website ini dibuat untuk menghubungkan kembali para alumni dengan sekolah dan teman-teman lama.
                Melalui platform ini, alumni dapat berbagi kisah inspiratif, prestasi, serta perjalanan pendidikan dan karier mereka.
            </p>
            <ul>
                <li><i class="fa fa-book"></i> Melihat data alumni berdasarkan angkatan</li>
                <li><i class="fa-solid fa-graduation-cap"></i> Mengetahui pendidikan & pekerjaan alumni</li>
                <li><i class="fa-solid fa-medal"></i>  Melihat prestasi alumni yang membanggakan</li>
                <li><i class="fa-solid fa-comment-dots me-2"></i> Membaca kisah inspiratif alumni</li>
            </ul>
        </div>
    </div>
</section>

@endsection
