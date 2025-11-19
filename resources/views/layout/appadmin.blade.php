<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.css') }}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
  <nav class="sidebar">
    <h2>Alumni SMK</h2>
    <a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i> Dashboard</a>
    <a href="{{ route ('siswa.index') }}"><i class="fa-solid fa-users"></i> Data Alumni</a>   
    <a href="{{ route('pendidikan.index') }}"><i class="fa-solid fa-graduation-cap"></i> Pendidikan</a>
    <a href="{{ route('pekerjaan.index') }}"><i class="fa-solid fa-briefcase"></i> Pekerjaan</a>  
    <a href="{{ route ('motivasi.index') }}"><i class="fa-solid fa-comment-dots me-2"></i> Motivasi</a>
    <a href="{{ route ('prestasi.index') }}"><i class="fa-solid fa-medal"></i> Prestasi</a>
    <a href="{{ route ('profil') }}"><i class="fa-solid fa-user"></i> Profil </a>
    <a href="{{ route ('logout') }}" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> logout</a>
    
  </nav>

  <main class="main-content">
    @yield('content')
  </main>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('scripts')


</body>
</html>
