<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Alumni Sekolah</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
      <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.css') }}">
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #007a64;
        }
        .navbar-brand, .nav-link, .nav-item {
            color: white !important;
            font-weight: 500;
        }
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
                        url('{{ asset("storage/D2.jpeg") }}') center/cover no-repeat;
            color: white;
            padding: 120px 0;
        }
        .footer {
            background-color: #007a64;
        }

        .footer .social-icon {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.15);
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .footer .social-icon:hover {
            background-color: white;
            color: #007a64;
            transform: translateY(-2px);
        }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('user.home') }}">
            <i class="fa-solid fa-school"></i> Alumni Sekolah
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('user.home') }}" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a href="{{ route('user.alumni') }}" class="nav-link">Data Alumni</a></li>
                <li class="nav-item"><a href="{{ route('user.pendidikan') }}" class="nav-link">Pendidikan & Pekerjaan</a></li>
                <li class="nav-item"><a href="{{ route('user.prestasi') }}" class="nav-link">Prestasi</a></li>
                <li class="nav-item"><a href="{{ route('user.motivasi') }}" class="nav-link">Motivasi</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="">
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer text-white pt-4 pb-3 mt-5">
    <div class="container text-center text-md-start">
        <div class="row gy-4 align-items-center">
            <!-- Logo & Deskripsi -->
            <div class="col-md-4 text-center text-md-start">
                <h5 class="fw-bold mb-2">
                    <i class="fa-solid fa-school me-2"></i>Alumni Sekolah
                </h5>
                <p class="small mb-0">
                    Menghubungkan alumni, berbagi inspirasi, dan membangun masa depan bersama.
                </p>
            </div>

            <!-- Navigasi Cepat -->
            <div class="col-md-4 text-center">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item mx-2"><a href="{{ route('user.home') }}" class="text-white text-decoration-none">Beranda</a></li>
                    <li class="list-inline-item mx-2"><a href="{{ route('user.alumni') }}" class="text-white text-decoration-none">Alumni</a></li>
                    <li class="list-inline-item mx-2"><a href="{{ route('user.pendidikan') }}" class="text-white text-decoration-none">Pendidikan</a></li>
                    <li class="list-inline-item mx-2"><a href="{{ route('user.prestasi') }}" class="text-white text-decoration-none">Prestasi</a></li>
                    <li class="list-inline-item mx-2"><a href="{{ route('user.motivasi') }}" class="text-white text-decoration-none">Motivasi</a></li>
                </ul>
            </div>

            <!-- Sosial Media -->
            <div class="col-md-4 text-center text-md-end">
                <div class="d-inline-flex gap-2">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
        </div>

        <hr class="my-3 opacity-25">

        <p class="text-center small mb-0">
            &copy; {{ date('Y') }} <strong>Web Alumni Sekolah</strong> • Dibuat dengan 
            <i class="fa-solid fa-heart text-danger"></i> oleh Tim IT Sekolah
        </p>
    </div>
</footer>


<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>