<?php
include '../includes/config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Dashboard Admin - Sistem Pakar Kesehatan Mental Remaja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Sistem Pakar, Kesehatan Mental, Remaja, Bullying">
    <meta name="description" content="Halaman admin untuk memantau hasil konsultasi sistem pakar deteksi kesehatan mental remaja.">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
    <link href="../lib/twentytwenty/twentytwenty.css" rel="stylesheet">

    <!-- Bootstrap & Template Styles -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <style>
        .table thead {
            background-color: #0d6efd;
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f3f6;
        }

        .logout-btn {
            background-color: #dc3545;
            border: none;
        }

        .logout-btn:hover {
            background-color: #bb2d3b;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3 px-5">
        <a href="dashboard.php" class="navbar-brand p-0 d-flex align-items-center">
            <i class="bi bi-activity text-white fs-3 me-2"></i>
            <h4 class="m-0 text-white fw-semibold">Halaman Admin</h4>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3">
                    <span class="nav-link text-white fw-semibold">
                        <i class="bi bi-person-circle text-light me-1"></i>
                        Hai, <?= htmlspecialchars($_SESSION['admin']); ?> 
                    </span>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="btn btn-light text-primary rounded-pill px-4 py-2 fw-semibold">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar End -->
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-4 text-white animated zoomIn">Dashboard Admin</h1>
                <p class="text-white-50 mt-2">Pantau dan kelola hasil konsultasi pengguna sistem pakar</p>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Dashboard Content Start -->
    <div class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0"><i class="bi bi-clipboard-data me-2"></i>Data Hasil Konsultasi</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Penyakit</th>
                                <th>Nilai</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT h.*, u.nama, u.kelas, p.nama_penyakit 
                      FROM hasil_konsultasi h
                      JOIN user u ON h.id_user = u.id_user
                      JOIN penyakit p ON h.id_penyakit = p.id_penyakit
                      ORDER BY h.tanggal DESC";
                            $result = mysqli_query($conn, $sql);
                            $no = 1;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                    <tr>
                      <td class='text-center'>{$no}</td>
                      <td>{$row['nama']}</td>
                      <td>{$row['kelas']}</td>
                      <td>{$row['nama_penyakit']}</td>
                      <td class='text-center'>{$row['nilai_total']}</td>
                      <td class='text-center'>{$row['tanggal']}</td>
                    </tr>
                  ";
                                    $no++;
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center text-muted'>Belum ada data konsultasi.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Content End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s">
        <div class="container text-center pt-5">
            <h3 class="text-white mb-4">Hubungi Kami</h3>
            <p class="mb-4">Untuk informasi lebih lanjut mengenai sistem ini, hubungi kami melalui kontak berikut.</p>
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
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../lib/twentytwenty/jquery.event.move.js"></script>
    <script src="../lib/twentytwenty/jquery.twentytwenty.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>