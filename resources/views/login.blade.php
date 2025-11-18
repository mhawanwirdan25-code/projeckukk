<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin | Website Alumni</title>
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

  <div class="login-wrapper d-flex align-items-center justify-content-center vh-100">
    <div class="login-card shadow-lg rounded-4 p-4 bg-white">
      <div class="text-center mb-4">
        <h4 class="fw-bold text-primary">Login Admin</h4>
        <p class="text-muted small">Masuk untuk mengelola data alumni dan prestasi</p>
      </div>

      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required>
        </div>

        <div class="mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn btn-login w-100">Login</button>
      </form>

      <p class="text-center mt-4 small text-muted">
        Lupa password? <a href="#" class="text-decoration-none text-primary">Hubungi Admin</a>
      </p>
    </div>
  </div>

  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
