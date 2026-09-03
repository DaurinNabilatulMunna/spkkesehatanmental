<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <title>Konsultasi Kesehatan Mental Remaja - Sistem Pakar Bullying</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Bootstrap & Template -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
    }

    .consult-container {
      background: #fff;
      border-radius: 20px;
      padding: 40px 50px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .consult-container:hover {
      transform: translateY(-5px);
    }

    .question-step {
      display: none;
      animation: fadeIn 0.4s ease-in-out;
    }

    .question-step.active {
      display: block;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .question-box {
      background: #f8f9fa;
      border-radius: 15px;
      padding: 25px;
      border-left: 5px solid #0d6efd;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .progress {
      height: 10px;
      border-radius: 10px;
      background: #e9ecef;
      overflow: hidden;
    }

    .progress-bar {
      height: 10px;
      background: linear-gradient(90deg, #0d6efd, #42a5f5);
      border-radius: 10px;
      transition: width 0.4s ease;
    }

    .btn {
      border-radius: 10px;
      font-weight: 500;
      padding: 10px 25px;
    }

    .btn-primary {
      background: linear-gradient(90deg, #0d6efd, #42a5f5);
      border: none;
    }

    .btn-success {
      background: linear-gradient(90deg, #2ecc71, #27ae60);
      border: none;
    }

    .btn-secondary {
      background: #6c757d;
      border: none;
    }

    h3.text-primary {
      font-weight: 600;
    }
  </style>
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="index.php" class="navbar-brand p-0">
      <h4 class="m-0 text-primary">Sistem Pakar Kesehatan Mental Remaja</h4>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto py-0">
        <a href="index.php" class="nav-item nav-link">Beranda</a>
        <a href="about.php" class="nav-item nav-link">Edukasi</a>
        <a href="consultation.php" class="nav-item nav-link active">Konsultasi</a>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Hero Start -->
  <div class="container-fluid bg-primary py-5 hero-header mb-5">
    <div class="row py-3">
      <div class="col-12 text-center">
        <h1 class="display-4 text-white fw-bold animated zoomIn">Konsultasi Kesehatan Mental</h1>
        <p class="text-white mt-2 mb-0">Isi pertanyaan berikut untuk mengenali kondisi emosionalmu</p>
      </div>
    </div>
  </div>
  <!-- Hero End -->

  <!-- Form Start -->
  <div class="container py-5">
    <div class="col-lg-8 mx-auto consult-container">
      <h3 class="text-center text-primary mb-3">Form Konsultasi Remaja</h3>
      <p class="text-center text-muted mb-4">Jawablah setiap pernyataan sesuai dengan kondisi yang kamu rasakan akhir-akhir ini.</p>

      <!-- Progress Bar -->
      <div class="progress my-4">
        <div class="progress-bar" id="progressBar"></div>
      </div>

      <form action="hasil.php" method="post" id="consultForm">
        <!-- Step 1 -->
        <div class="question-step active">
          <div class="question-box">
            <label><strong>Nama Lengkap:</strong></label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama kamu" required>

            <label class="mt-3"><strong>Kelas:</strong></label>
            <input type="text" name="kelas" class="form-control" placeholder="Contoh: XI RPL 2" required>
          </div>

          <div class="text-center mt-4">
            <button type="button" class="btn btn-primary" onclick="nextStep()">Mulai Konsultasi</button>
          </div>
        </div>

        <?php
        $sql = "SELECT * FROM gejala ORDER BY id_gejala ASC";
        $result = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($result);
        $index = 1;
        while ($row = mysqli_fetch_assoc($result)) :
        ?>
          <div class="question-step">
            <div class="question-box">
              <h5 class="mb-3"><i class="bi bi-chat-dots text-primary me-2"></i><?= $index ?>. <?= htmlspecialchars($row['pertanyaan']); ?></h5>
              <div class="mt-3">
                <?php
                $options = [
                  1 => "Sangat Tidak Setuju",
                  2 => "Tidak Setuju",
                  3 => "Netral",
                  4 => "Setuju",
                  5 => "Sangat Setuju"
                ];
                foreach ($options as $val => $label) :
                ?>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="gejala[<?= $row['id_gejala']; ?>]" value="<?= $val; ?>" id="q<?= $index ?>-<?= $val ?>" required>
                    <label class="form-check-label" for="q<?= $index ?>-<?= $val ?>"><?= $label; ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
              <button type="button" class="btn btn-secondary" onclick="prevStep()">Sebelumnya</button>
              <?php if ($index == $total) : ?>
                <button type="submit" class="btn btn-success">Lihat Hasil</button>
              <?php else : ?>
                <button type="button" class="btn btn-primary" onclick="nextStep()">Selanjutnya</button>
              <?php endif; ?>
            </div>
          </div>
        <?php $index++;
        endwhile; ?>
      </form>
    </div>
  </div>
  <!-- Form End -->

  <!-- Footer -->
  <div class="container-fluid bg-dark text-light py-4 wow fadeInUp mt-5" data-wow-delay="0.3s">
    <div class="container text-center">
      <h4 class="text-white mb-3">Hubungi Kami</h4>
      <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>SMK Negeri 2 Jakarta Timur</p>
      <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>kesehatanmental.remaja@gmail.com</p>
      <p><i class="bi bi-telephone text-primary me-2"></i>+62 812 3456 7890</p>
    </div>
  </div>

  <div class="container-fluid text-light py-3" style="background: #051225;">
    <div class="container text-center">
      <p class="mb-0">
        &copy; 2025 <strong>Sistem Pakar Kesehatan Mental Remaja</strong>. All Rights Reserved.<br>
        Designed by <a class="text-white border-bottom" href="#">Rima Nabila</a>
      </p>
    </div>
  </div>
  <!-- Footer End -->

  <script>
    let currentStep = 0;
    const steps = document.querySelectorAll(".question-step");
    const progressBar = document.getElementById("progressBar");

    function showStep(n) {
      steps.forEach((step, i) => step.classList.toggle("active", i === n));
      const progress = ((n + 1) / steps.length) * 100;
      progressBar.style.width = progress + "%";
    }

    function nextStep() {
      if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
      }
    }

    function prevStep() {
      if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
      }
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
