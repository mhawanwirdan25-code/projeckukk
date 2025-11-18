@extends('user.layout')

@section('content')
<style>
    /* 🌿 Background lembut */
    body {
        background: linear-gradient(135deg, #f0fff4 0%, #e6f4ea 100%);
    }

    /* 🏆 Judul */
    .prestasi-header {
        font-weight: 700;
        color: #198754;
        letter-spacing: 0.5px;
    }

    /* ✨ Card modern */
    .prestasi-card {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        border-radius: 15px;
    }

    .prestasi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 128, 0, 0.2);
    }

    .prestasi-badge {
        font-size: 0.9rem;
        padding: 0.4rem 0.8rem;
        border-radius: 12px;
    }

    /* 🎠 Carousel dengan efek fade */
    .carousel-fade .carousel-item {
        transition: opacity 1s ease-in-out;
    }

    .carousel-item img {
        height: 420px;
        object-fit: cover;
        border-radius: 18px;
    }

    .carousel-caption {
        background: rgba(0, 0, 0, 0.45);
        border-radius: 10px;
        padding: 1rem 1.5rem;
    }

    .carousel-caption h5 {
        font-weight: 600;
        color: #fff;
    }

    .carousel-caption p {
        font-size: 0.9rem;
        color: #e6e6e6;
    }

    /* Responsif */
    @media (max-width: 768px) {
        .carousel-item img {
            height: 250px;
        }
        .carousel-caption {
            font-size: 0.9rem;
            padding: 0.7rem;
        }
    }
</style>

<div class="container mt-4">
    <!-- 🎠 Carousel Prestasi -->
    <div id="carouselPrestasi" class="carousel slide carousel-fade shadow-sm mb-5" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner rounded-4">
            <div class="carousel-item active">
                <img src="{{ asset('storage/mk.jpg') }}" class="d-block w-100" alt="Prestasi 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/D2.jpeg') }}" class="d-block w-100" alt="Prestasi 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/sa.jpg') }}" class="d-block w-100" alt="Prestasi 3">
            </div>
        </div>

        <!-- Tombol Navigasi -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPrestasi" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselPrestasi" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
        </button>
    </div>

    <!-- 🏆 Judul -->
    <h2 class="text-center prestasi-header mb-4">
        <i class="bi bi-trophy-fill text-warning me-2"></i>
        Prestasi Alumni
    </h2>

    <!-- 🧾 Daftar Prestasi -->
    <div class="row g-4">
        @forelse($prestasi as $p)
            <div class="col-md-4 col-sm-6">
                <div class="card prestasi-card shadow-sm border-0 h-100">
                    <div class="card-body text-center bg-white">
                        <h5 class="fw-bold text-primary mb-2">
                            {{ $p->siswa->nama_lengkap ?? 'Nama Tidak Diketahui' }}
                        </h5>
                        <p class="mb-1 text-dark fs-6">
                            <i class="fa-solid fa-medal"></i> {{ $p->nama_prestasi }}
                        </p>
                        <span class="badge bg-success prestasi-badge mb-2">
                            {{ $p->tingkat }}
                        </span>
                        <p class="text-muted mb-0">
                            <i class="bi bi-calendar-event"></i> {{ $p->tahun ?? '-' }}
                        </p>
                        @if($p->keterangan)
                            <small class="d-block text-secondary mt-2 fst-italic">
                                "{{ $p->keterangan }}"
                            </small>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted mt-4">
                Belum ada data prestasi alumni.
            </div>
        @endforelse
    </div>
</div>
@endsection
