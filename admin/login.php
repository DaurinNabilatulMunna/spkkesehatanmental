<?php
include '../includes/config.php';
session_start();

// --- LOGIN ---
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = md5($_POST['password']);

  $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
  $data = mysqli_fetch_assoc($query);

  if ($data) {
    $_SESSION['admin'] = $data['username'];
    header("Location: dashboard.php");
    exit;
  } else {
    $message = "<div class='alert alert-danger mt-3'>❌ Username atau password salah!</div>";
  }
}

// --- REGISTER ---
if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = md5($_POST['password']);
  $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");

  if (mysqli_num_rows($cek) > 0) {
    $message = "<div class='alert alert-warning mt-3'>⚠️ Username sudah digunakan!</div>";
  } else {
    mysqli_query($conn, "INSERT INTO admin (username, password) VALUES ('$username', '$password')");
    $message = "<div class='alert alert-success mt-3'>✅ Registrasi berhasil! Silakan login.</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - Sistem Pakar Kesehatan Mental Remaja</title>

  <!-- Favicon -->
  <link href="../img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

  <!-- Icons & Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #0d6efd, #53a8ff);
      font-family: 'Open Sans', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .auth-box {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      width: 400px;
      padding: 35px 30px;
      text-align: center;
    }

    .auth-box h3 {
      font-family: 'Jost', sans-serif;
      font-weight: 700;
      color: #0d6efd;
    }

    .nav-tabs {
      border: none;
    }

    .nav-tabs .nav-link {
      border: none;
      color: #0d6efd;
      font-weight: 600;
      transition: all 0.3s;
    }

    .nav-tabs .nav-link.active {
      background-color: #0d6efd;
      color: #fff !important;
      border-radius: 30px;
    }

    .form-control {
      border-radius: 10px;
      padding: 10px 12px;
    }

    .btn-primary,
    .btn-success {
      border-radius: 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background: #0b5ed7;
    }

    .btn-success {
      background-color: #198754;
      border: none;
    }

    .btn-success:hover {
      background-color: #157347;
    }

    .alert {
      font-size: 14px;
      border-radius: 8px;
    }
  </style>
</head>

<body>
  <div class="auth-box wow fadeInUp" data-wow-delay="0.2s">
    <h3><i class="bi bi-shield-lock-fill me-2"></i>Admin Panel</h3>
    <p class="text-muted mb-4">Sistem Pakar Kesehatan Mental Remaja</p>

    <?php if (!empty($message)) echo $message; ?>

    <!-- Tabs -->
    <ul class="nav nav-tabs justify-content-center mb-4" id="authTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">
          <i class="bi bi-box-arrow-in-right me-1"></i> Login
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">
          <i class="bi bi-person-plus-fill me-1"></i> Register
        </button>
      </li>
    </ul>

    <div class="tab-content" id="authTabsContent">
      <!-- Login -->
      <div class="tab-pane fade show active" id="login" role="tabpanel">
        <form method="POST">
          <div class="mb-3 text-start">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-4 text-start">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button type="submit" name="login" class="btn btn-primary w-100 py-2">
            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
          </button>
        </form>
      </div>

      <!-- Register -->
      <div class="tab-pane fade" id="register" role="tabpanel">
        <form method="POST">
          <div class="mb-3 text-start">
            <label class="form-label">Username Baru</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-4 text-start">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button type="submit" name="register" class="btn btn-success w-100 py-2">
            <i class="bi bi-check-circle me-1"></i> Daftar
          </button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
