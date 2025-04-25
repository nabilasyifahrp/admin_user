<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Page</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  integrity="sha512-bxwP0YcEzKh5I+MuYz9KXyZjMGvZoXe93uKZxyv5YxBmtLyyKAhL/8h83nDf5bQZGuZxgWf5Je9vTf+cx2L1Vg=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      background: linear-gradient(135deg, #c084fc, #a78bfa, #d8b4fe);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: white;
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
      max-width: 420px;
      width: 100%;
    }

    h2 {
      font-weight: 600;
      color: #6d28d9;
    }

    .form-label {
      color: #4c1d95;
    }

    .btn-primary {
      background-color: #8b5cf6;
      border: none;
    }

    .btn-primary:hover {
      background-color: #7c3aed;
    }

    .alert-danger {
      background-color: #fee2e2;
      color: #991b1b;
      border: 1px solid #fca5a5;
    }

    .link-register a {
      color: #6b21a8;
      text-decoration: none;
    }

    .link-register a:hover {
      text-decoration: underline;
    }

    .password-toggle {
      position: relative;
    }

    .password-toggle i {
      position: absolute;
      top: 50%;
      right: 15px;
      transform: translateY(-50%);
      cursor: pointer;
      color: #6d28d9;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h2 class="text-center mb-4">Login</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="password-toggle">
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <div class="mt-3 text-center link-register">
      <small>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></small>
    </div>
  </div>

  <script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
