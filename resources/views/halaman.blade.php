<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Halaman Setelah Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      margin: 0;
      background: linear-gradient(to right, #c084fc, #a78bfa, #d8b4fe);
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      color: #4c1d95;
    }

    .card {
      background: #ffffff;
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    h1 {
      font-weight: 600;
      color: #6d28d9;
    }

    p.lead {
      color: #5b21b6;
      font-size: 1.2rem;
    }

    .back-icon {
      position: absolute;
      top: 20px;
      left: 20px;
      font-size: 28px;
      color: #4c1d95;
      background-color: #ffffff;
      padding: 10px 14px;
      border-radius: 50%;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .back-icon:hover {
      background-color: #ede9fe;
      color: #6d28d9;
    }
  </style>
</head>
<body>

  <a href="{{ route('dashboard') }}" class="back-icon" title="Kembali ke Dashboard">
    <i class="fas fa-arrow-left"></i>
  </a>

  <div class="card">
    <h1>🎉 Selamat Datang!</h1>
    <p class="lead">Kamu berhasil login ke sistem. Nikmati fitur-fitur yang tersedia!</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
