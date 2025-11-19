@extends('layout.appadmin')

@section('title', 'Profil Admin')

@section('content')

<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <img 
                        src="https://ui-avatars.com/api/?name={{ urlencode($user['nama']) }}&background=0D6EFD&color=fff&size=120" 
                        class="rounded-circle mb-3"
                        alt="Avatar">

                    <h3 class="fw-bold text-primary mb-1">{{ $user['nama'] }}</h3>              
                    <p class="text-muted mb-4">{{ '@' . $user['username'] }}</p>
                    <hr>
                    <div class="text-start px-3">
                        <h5 class="fw-semibold mb-3">Informasi Akun</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Nama Lengkap</span>
                            <span class="fw-semibold">{{ $user['nama'] }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Username</span>
                            <span class="fw-semibold">{{ $user['username'] }}</span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
