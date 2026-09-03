<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <title>Sistem Pakar Deteksi Kesehatan Mental Remaja</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Sistem Pakar, Kesehatan Mental, Remaja, Bullying">
  <meta name="description" content="Sistem Pakar untuk mendeteksi kesehatan mental remaja akibat bullying.">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
    rel="stylesheet">

  <!-- Icon Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
  <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet">

  <!-- Bootstrap & Template Styles -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
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
        <a href="index.php" class="nav-item nav-link active">Beranda</a>
        <a href="about.php" class="nav-item nav-link">Edukasi</a>
        <a href="consultation.php" class="nav-item nav-link">Konsultasi</a>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>
    <div class="spinner-grow text-dark m-1" role="status"><span class="sr-only">Loading...</span></div>
    <div class="spinner-grow text-secondary m-1" role="status"><span class="sr-only">Loading...</span></div>
  </div>
  <!-- Spinner End -->

  <!-- Carousel Start -->
  <div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="w-100" src="img/kesehatanmental1.jpg" alt="Slide 1">
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 900px;">
              <h5 class="text-white text-uppercase mb-3 animated slideInDown">
                Mulai Langkah Kecil untuk Pikiran yang Sehat
              </h5>
              <h3 class="display-1 text-white mb-md-4 animated zoomIn">
                Cegah Bullying, Deteksi Kesehatan Mental!
              </h3>
              <a href="consultation.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                Mulai Konsultasi
              </a>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <img class="w-100" src="img/kesehatanmental2.jpg" alt="Slide 2">
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 900px;">
              <h5 class="text-white text-uppercase mb-3 animated slideInDown">
                Mulai Langkah Kecil untuk Pikiran yang Sehat
              </h5>
              <h3 class="display-1 text-white mb-md-4 animated zoomIn">
                Cegah Bullying, Deteksi Kesehatan Mental!
              </h3>
              <a href="consultation.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                Mulai Konsultasi
              </a>
            </div>
          </div>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Carousel End -->

  <!-- Banner Start -->
  <div class="container-fluid banner mb-5">
    <div class="container">
      <div class="row gx-0">
        <!-- Tentang Sistem -->
        <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
          <div class="bg-primary d-flex flex-column justify-content-center p-5" style="height: 300px;">
            <h3 class="text-white mb-3">Tentang Sistem Kesehatan Mental</h3>
            <p class="text-white mb-4">
              Sistem pakar ini membantu mendeteksi kondisi kesehatan mental remaja akibat bullying dengan cepat dan akurat.
            </p>
            <a class="btn btn-light mt-auto align-self-start" href="consultation.php">Mulai Konsultasi</a>
          </div>
        </div>

        <!-- Edukasi -->
        <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
          <div class="bg-dark d-flex flex-column justify-content-center p-5" style="height: 300px;">
            <h3 class="text-white mb-3">Edukasi Kesehatan Mental</h3>
            <p class="text-white mb-4">
              Kenali gejala stres, kecemasan, dan depresi sejak dini untuk mencegah dampak buruk bullying di lingkungan sekolah.
            </p>
            <a class="btn btn-light mt-auto align-self-start" href="about.php">Pelajari Lebih Lanjut</a>
          </div>
        </div>

        <!-- Bantuan -->
        <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
          <div class="bg-secondary d-flex flex-column justify-content-center p-5" style="height: 300px;">
            <h3 class="text-white mb-3">Butuh Bantuan?</h3>
            <p class="text-white mb-3">
              Jika kamu atau temanmu mengalami tekanan akibat bullying, hubungi konselor sekolah atau layanan profesional.
            </p>
            <h5 class="text-white mb-1">Hubungi Konselor Sekolah</h5>
            <h4 class="text-white mb-0">+62 812 3456 7890</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner End -->

  <!-- About Start -->
  <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-7">
          <div class="section-title mb-4">
            <h5 class="position-relative d-inline-block text-primary text-uppercase">Tentang Sistem</h5>
            <h1 class="display-5 mb-0">
              Sistem Pakar Deteksi Kesehatan Mental Remaja Akibat Bullying
            </h1>
          </div>
          <h4 class="text-body fst-italic mb-4">
            Sistem ini dirancang untuk membantu mendeteksi kondisi kesehatan mental remaja yang mengalami dampak bullying secara cepat, akurat, dan mudah digunakan.
          </h4>
          <p class="mb-4">
            Melalui pendekatan <strong>Backward Chaining</strong>, sistem ini menganalisis gejala psikologis yang dialami siswa. 
            Pengguna menjawab pertanyaan seputar kondisi emosional dan sosial, lalu sistem memberikan hasil diagnosis awal yang dapat digunakan oleh guru BK atau konselor.
          </p>

          <div class="row g-3">
            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
              <h5><i class="fa fa-check-circle text-primary me-3"></i>Berbasis Web Interaktif</h5>
              <h5><i class="fa fa-check-circle text-primary me-3"></i>Analisis Cepat & Akurat</h5>
            </div>
            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
              <h5><i class="fa fa-check-circle text-primary me-3"></i>Metode Backward Chaining</h5>
              <h5><i class="fa fa-check-circle text-primary me-3"></i>Dapat Digunakan Guru BK</h5>
            </div>
          </div>

          <a href="consultation.php" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">
            Mulai Konsultasi
          </a>
        </div>

        <div class="col-lg-5" style="min-height: 500px;">
          <div class="position-relative h-100">
            <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
              src="img/about-mental.jpg" style="object-fit: cover;" alt="Ilustrasi Kesehatan Mental Remaja">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->

  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s">
    <div class="container text-center pt-5">
      <h3 class="text-white mb-4">Hubungi Kami</h3>
      <p class="mb-4">
        Jika kamu memiliki pertanyaan atau saran, silakan hubungi kami melalui kontak di bawah ini.
      </p>
      <p><i class="bi bi-geo-alt text-primary me-2"></i>SMK Negeri 2 Jakarta Timur, Indonesia</p>
      <p><i class="bi bi-envelope-open text-primary me-2"></i>kesehatanmental.remaja@gmail.com</p>
      <p><i class="bi bi-telephone text-primary me-2"></i>+62 812 3456 7890</p>
    </div>
  </div>

  <div class="container-fluid text-light py-3" style="background: #051225;">
    <div class="container text-center">
      <p class="mb-0">
        &copy; 2025 <strong>Sistem Pakar Kesehatan Mental Remaja</strong>. All Rights Reserved.<br>
        Designed for Academic Research by <a class="text-white border-bottom" href="#">Rima Nabila</a>
      </p>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top">
    <i class="bi bi-arrow-up"></i>
  </a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/tempusdominus/js/moment.min.js"></script>
  <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
  <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="lib/twentytwenty/jquery.event.move.js"></script>
  <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>
</html>
