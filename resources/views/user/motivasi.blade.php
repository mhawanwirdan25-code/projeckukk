@extends('user.layout')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e8f5e9 0%, #ffffff 100%);
        font-family: 'Poppins', sans-serif;
    }

    /* 🌿 Bagian Motivasi */
    .motivasi-section {
        max-width: 900px;
        margin: 80px auto 40px;
        padding: 0 20px;
    }

    .motivasi-header {
        text-align: center;
        color: #198754;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 60px;
        font-size: 2rem;
        position: relative;
    }

    .motivasi-header::after {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #198754, #81c784);
        margin: 10px auto 0;
        border-radius: 3px;
    }

    .motivasi-item {
        text-align: center;
        margin-bottom: 80px;
        animation: fadeInUp 0.8s ease both;
    }

    .motivasi-quote {
        font-style: italic;
        color: #2f2f2f;
        font-size: 1.3rem;
        line-height: 1.8;
        max-width: 750px;
        margin: 0 auto;
    }

    .motivasi-quote::before,
    .motivasi-quote::after {
        color: #66bb6a;
        font-size: 2rem;
        vertical-align: middle;
    }

    .motivasi-quote::before {
        content: "❝";
        margin-right: 5px;
    }

    .motivasi-quote::after {
        content: "❞";
        margin-left: 5px;
    }

    .motivasi-author {
        font-weight: 700;
        color: #198754;
        margin-top: 20px;
        font-size: 1.1rem;
    }

    .motivasi-year {
        color: #6c757d;
        font-size: 0.9rem;
        margin-top: 4px;
    }

    /* 🔹 Garis pemisah antar motivasi */
    .motivasi-separator {
        width: 70%;
        height: 2px;
        background: linear-gradient(to right, transparent, #a5d6a7, transparent);
        margin: 50px auto;
        position: relative;
    }

    .motivasi-separator::before {
        content: "🌿";
        position: absolute;
        top: -16px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 1.2rem;
        color: #66bb6a;
        background: #e8f5e9;
        padding: 0 10px;
        border-radius: 20px;
    }

    /* 🌟 Animasi */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* 📸 Galeri Alumni */
    .gallery-section {
        background-color: #f7faf8;
        padding: 60px 0;
    }

    .gallery-header {
        text-align: center;
        color: #198754;
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 40px;
        position: relative;
    }

    .gallery-header::after {
        content: '';
        display: block;
        width: 70px;
        height: 3px;
        background: linear-gradient(90deg, #198754, #81c784);
        margin: 10px auto 0;
        border-radius: 3px;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-item img {
        width: 100%;
        height: 230px;
        object-fit: cover;
        border-radius: 15px;
        transition: transform 0.4s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.05);
        filter: brightness(0.9);
    }

    .gallery-caption {
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
        background: rgba(25, 135, 84, 0.75);
        color: white;
        padding: 8px;
        font-size: 0.95rem;
        border-radius: 0 0 15px 15px;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }

    .gallery-item:hover .gallery-caption {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<div class="motivasi-section">
    <h2 class="motivasi-header">
        <i class="bi bi-chat-quote-fill text-success me-2"></i>
        Motivasi dari Alumni
    </h2>

    @forelse($motivasi as $m)
        <div class="motivasi-item">
            <p class="motivasi-quote">{{ $m->pesan_motivasi }}</p>
            <p class="motivasi-author">{{ $m->siswa->nama_lengkap ?? 'Nama Tidak Diketahui' }}</p>
            <p class="motivasi-year">Angkatan {{ $m->siswa->tahun_lulus ?? '-' }}</p>
        </div>

        @if(!$loop->last)
            <div class="motivasi-separator"></div>
        @endif
    @empty
        <div class="text-center text-muted mt-4">
            Belum ada motivasi dari alumni.
        </div>
    @endforelse
</div>

<!-- 📸 Galeri Foto Alumni -->
<section class="gallery-section">
    <h2 class="gallery-header">
        <i class="bi bi-images me-2"></i>
        Galeri Alumni
    </h2>

    <div class="gallery-grid">
        <div class="gallery-item">
            <img src="{{ asset('storage/sa.jpg') }}" alt="Kegiatan Alumni 1">
            <div class="gallery-caption">SMK Syafi'i Akrom</div>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('storage/21.jpg') }}" alt="Kegiatan Alumni 2">
            <div class="gallery-caption">M.Mirza</div>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('storage/22.jpg') }}" alt="Kegiatan Alumni 3">
            <div class="gallery-caption">Moh Naufa </div>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('storage/23.jpg') }}" alt="Kegiatan Alumni 4">
            <div class="gallery-caption">M.Zidanil</div>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('storage/niga.jpg') }}" alt="Kegiatan Alumni 5">
            <div class="gallery-caption">M.Panji</div>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('storage/D3.jpg') }}" alt="Kegiatan Alumni 6">
            <div class="gallery-caption">2023</div>
        </div>
    </div>
</section>
@endsection
