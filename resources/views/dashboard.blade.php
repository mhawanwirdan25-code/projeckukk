@extends('layout.appadmin')

@section('title', 'Dashboard Alumni')

@section('content')
<div class="container-fluid py-4">

  <!-- Judul & Header -->
  <div class="text-center mb-5">
    <h2 class="fw-bold text-primary mb-2">🎓 Dashboard Alumni Sekolah</h2>
    <p class="text-muted">Pantau perjalanan, pendidikan, dan prestasi alumni sekolah dengan mudah dan menarik.</p>
  </div>

  <!-- Banner Sambutan -->
  <div class="card border-0 shadow-lg mb-5"
       style="background: linear-gradient(90deg, #434444 0%, #82888a 100%); border-radius: 20px;">
    <div class="card-body text-center text-white py-5">
      {{-- <img src="{{ asset('') }}" 
           alt="Profile Picture"
           class="rounded-circle border border-4 border-white shadow mb-3" width="130"> --}}
      <h3 class="fw-bold mb-2">Selamat Datang di Sistem Alumni Sekolah</h3>
      <p class="text-light mb-0">Temukan perjalanan karier, studi, dan prestasi luar biasa dari para alumni terbaik!</p>
    </div>
  </div>

  <!-- Menu Cepat -->
  <div class="row g-4 text-center">
    <div class="col-md-3 col-sm-6">
      <a href="{{ route('siswa.index') }}" class="text-decoration-none">
        <div class="menu-card bg-white border-0 shadow-sm py-4 h-100">
          <div class="icon-box bg-primary bg-opacity-10 text-primary mb-3">
            <i class="fa-solid fa-user-graduate fa-2x"></i>
          </div>
          <h6 class="fw-bold mb-1">Data Alumni</h6>
          <p class="text-muted small mb-0">Lihat daftar alumni sekolah</p>
        </div>
      </a>
    </div>

    <div class="col-md-3 col-sm-6">
      <a href="{{ route('pekerjaan.index') }}" class="text-decoration-none">
        <div class="menu-card bg-white border-0 shadow-sm py-4 h-100">
          <div class="icon-box bg-success bg-opacity-10 text-success mb-3">
            <i class="fa-solid fa-briefcase fa-2x"></i>
          </div>
          <h6 class="fw-bold mb-1">Alumni Bekerja</h6>
          <p class="text-muted small mb-0">Berkarya di berbagai bidang</p>
        </div>
      </a>
    </div>

    <div class="col-md-3 col-sm-6">
      <a href="{{ route('pendidikan.index') }}" class="text-decoration-none">
        <div class="menu-card bg-white border-0 shadow-sm py-4 h-100">
          <div class="icon-box bg-info bg-opacity-10 text-info mb-3">
            <i class="fa-solid fa-university fa-2x"></i>
          </div>
          <h6 class="fw-bold mb-1">Pendidikan Lanjut</h6>
          <p class="text-muted small mb-0">Melanjutkan ke perguruan tinggi</p>
        </div>
      </a>
    </div>

    <div class="col-md-3 col-sm-6">
      <a href="{{ route('prestasi.index') }}" class="text-decoration-none">
        <div class="menu-card bg-white border-0 shadow-sm py-4 h-100">
          <div class="icon-box bg-warning bg-opacity-10 text-warning mb-3">
            <i class="fa-solid fa-trophy fa-2x"></i>
          </div>
          <h6 class="fw-bold mb-1">Prestasi Alumni</h6>
          <p class="text-muted small mb-0">Prestasi tingkat nasional & internasional</p>
        </div>
      </a>
    </div>
  </div>

  <!-- Sekilas Profil Alumni -->
  <div class="card mt-5 border-0 shadow-sm">
    <div class="card-header bg-dark bg-gradient text-white text-center fw-bold py-3">
      Sekilas Profil Alumni Unggulan
    </div>
    <div class="card-body bg-light">
      <div class="row justify-content-center text-center g-4">
        <div class="col-md-3 col-sm-6">
          <div class="alumni-card p-3 bg-white shadow-sm rounded-4">
            <img src="{{ asset('/storage/21.jpg') }}" 
                 class="rounded-circle border border-3  shadow mb-2" height="110" width="110">
            <h6 class="fw-bold mb-0">M. Mirza</h6>
            <p class="text-muted small mb-0">PT Astra Honda</p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="alumni-card p-3 bg-white shadow-sm rounded-4">
            <img src="{{ asset('/storage/22.jpg') }}" 
                 class="rounded-circle border border-3  shadow mb-2" height="110" width="110">
            <h6 class="fw-bold mb-0">Moh Naufa Amada</h6>
            <p class="text-muted small mb-0">Universitas Indonesia</p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="alumni-card p-3 bg-white shadow-sm rounded-4">
            <img src="{{ asset('/storage/23.jpg') }}" 
                 class="rounded-circle border border-3  shadow mb-2" height="110" width="110">
            <h6 class="fw-bold mb-0">M. Zdanil Arzak</h6>
            <p class="text-muted small mb-0">Juara Inovasi Nasional</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection
