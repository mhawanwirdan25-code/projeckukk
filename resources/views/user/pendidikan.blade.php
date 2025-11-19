@extends('user.layout')

@section('content')
<style>
    /* HERO SECTION */
    .hero-section {
        position: relative;
        background: url('{{ asset("storage/sa.jpg") }}') center/cover no-repeat;
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }
    .hero-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
    }
    .hero-section .hero-text {
        position: relative;
        z-index: 2;
        max-width: 700px;
    }
    .hero-section h1 {
        font-weight: 700;
        font-size: 2.5rem;
    }
    .hero-section p {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    /* SECTION HEADER */
    .section-header {
        padding: 12px 20px;
        border-radius: 8px 8px 0 0;
        font-weight: 600;
        font-size: 1.2rem;
        letter-spacing: 0.3px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* TIMELINE */
    .timeline {
        position: relative;
        padding: 30px 0 10px 20px;
        margin-top: 20px;
        border-left: 3px solid #ddd;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 25px;
        padding-left: 35px;
        transition: all 0.3s ease;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -10px;
        top: 12px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #fff;
        border: 3px solid #0d6efd;
        transition: background 0.3s ease;
    }

    .timeline-item:hover::before {
        background: #0d6efd;
    }

    .timeline-icon {
        position: absolute;
        left: -45px;
        top: 0;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .timeline-content {
        background: #ffffff;
        border-radius: 10px;
        padding: 15px 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .timeline-content:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.12);
    }

    .timeline-content h5 {
        font-weight: 600;
        color: #007a64;
    }

    /*  DETAILS */
    .text-muted { font-size: 0.9rem; }

    /*  ANIMATION */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .timeline-item {
        animation: fadeInUp 0.6s ease forwards;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .hero-section {
            height: 45vh;
            background-position: center;
        }
        .hero-section h1 {
            font-size: 1.8rem;
        }
        .timeline {
            border-left: none;
            padding-left: 0;
        }
        .timeline-item {
            padding-left: 0;
        }
        .timeline-icon {
            display: none;
        }
    }
</style>

<!-- HERO SECTION -->
<section class="hero-section">
    <div class="hero-text">
        <h1><i class="fa-solid fa-graduation-cap me-2"></i>Pendidikan & Pekerjaan Alumni</h1>
        <p>Menyelami perjalanan alumni dalam pendidikan dan karier yang menginspirasi.</p>
    </div>
</section>

<!-- MAIN CONTENT -->
<section class="alumni-section container my-5">
    <div class="row g-5">
        {{-- Pendidikan --}}
        <div class="col-lg-6">
            <div class="section-header bg-success text-white">
                <i class="fa-solid fa-user-graduate me-2"></i> Pendidikan Lanjut
            </div>

            <div class="timeline">
                @forelse($pendidikan as $p)
                    <div class="timeline-item">
                        <div class="timeline-icon bg-success">
                            <i class="fa-solid fa-school"></i>
                        </div>
                        <div class="timeline-content">
                            <h5>{{ $p->siswa->nama_lengkap ?? 'Nama Tidak Diketahui' }}</h5>
                            <p class="mb-1"><strong>{{ $p->nama_kampus }}</strong></p>
                            <span class="text-muted">{{ $p->jurusan }}</span><br>
                            <small><i class="fa-regular fa-calendar-days me-1"></i>
                                {{ $p->tahun_masuk }} – {{ $p->tahun_lulus ?? 'Sekarang' }}
                            </small>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center mt-4">Belum ada data pendidikan lanjut.</p>
                @endforelse
            </div>
        </div>

        {{-- Pekerjaan --}}
        <div class="col-lg-6">
            <div class="section-header bg-primary text-white">
                <i class="fa-solid fa-briefcase me-2"></i> Pekerjaan
            </div>

            <div class="timeline">
                @forelse($pekerjaan as $k)
                    <div class="timeline-item">
                        <div class="timeline-icon bg-primary">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <div class="timeline-content">
                            <h5>{{ $k->siswa->nama_lengkap ?? 'Nama Tidak Diketahui' }}</h5>
                            <p class="mb-1"><strong>{{ $k->jabatan }}</strong></p>
                            <span class="text-muted">di {{ $k->nama_perusahaan }}</span><br>
                            <small><i class="fa-regular fa-calendar-days me-1"></i>
                                {{ $k->tahun_masuk }} – {{ $k->tahun_keluar ?? 'Sekarang' }}
                            </small>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center mt-4">Belum ada data pekerjaan.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
