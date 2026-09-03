<?php
include 'includes/config.php';
include 'includes/functions.php';

// =========================
// Ambil data dari form
// =========================
$nama = $_POST['nama'] ?? '';
$kelas = $_POST['kelas'] ?? '';
$jawaban_user = $_POST['gejala'] ?? [];

// Validasi data
if (empty($nama) || empty($kelas) || empty($jawaban_user)) {
    die("<h3>Data tidak lengkap. Silakan isi kembali form dengan benar.</h3>");
}

// =========================
// Simpan user ke database
// =========================
mysqli_query($conn, "INSERT INTO user (nama, kelas) VALUES ('$nama', '$kelas')");
$id_user = mysqli_insert_id($conn);

// =========================
// Jalankan algoritma
// =========================
$hasil = diagnosaFuzzy($conn, $jawaban_user);

// Jika fungsi gagal atau error, cegah crash
if (!is_array($hasil)) {
    $hasil = [
        'forward_chaining' => [
            'id_penyakit' => null,
            'nilai' => 0
        ],
        'fuzzy' => [
            'id_penyakit' => null,
            'derajat_kecocokan' => 0,
            'validasi' => 'Tidak Valid'
        ],
        'diagnosa_akhir' => null
    ];
}

// Ambil hasil akhir
$id_penyakit    = $hasil['diagnosa_akhir'];
$nilai_forward  = $hasil['forward_chaining']['nilai'];
$nilai_fuzzy    = $hasil['fuzzy']['derajat_kecocokan'];
$validasi_fuzzy = $hasil['fuzzy']['validasi'];

// Nilai total untuk penyimpanan
$nilai = $nilai_fuzzy;


// =========================
// Ambil data penyakit utama
// =========================
if ($id_penyakit) {

    // Simpan hasil konsultasi
    mysqli_query($conn, "
        INSERT INTO hasil_konsultasi (id_user, id_penyakit, nilai_total)
        VALUES ('$id_user', '$id_penyakit', '$nilai')
    ");

    // Ambil detail penyakit
    $data = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM penyakit WHERE id_penyakit='$id_penyakit'")
    );
} else {

    // Default jika tidak ada yang cocok
    $data = [
        'nama_penyakit' => 'Tidak Terdeteksi Gangguan Mental',
        'deskripsi' => 'Jawaban kamu tidak menunjukkan adanya tanda signifikan stres, kecemasan, atau depresi.',
        'saran' => 'Tetap jaga kesehatan mentalmu dengan berpikir positif dan berinteraksi secara sehat dengan lingkungan sekitar.'
    ];
}


// =========================
// Fungsi: Ambil nama penyakit dari ID
// =========================
function getNamaPenyakit($conn, $id)
{

    if ($id === null || $id === '' || $id === '-') {
        return "-";
    }

    $q = mysqli_query($conn, "SELECT nama_penyakit FROM penyakit WHERE id_penyakit='$id'");
    $d = mysqli_fetch_assoc($q);

    return $d ? $d['nama_penyakit'] : "-";
}

// Ambil nama penyakit dari masing-masing metode
$nama_forward = getNamaPenyakit($conn, $hasil['forward_chaining']['id_penyakit']);
$nama_fuzzy   = getNamaPenyakit($conn, $hasil['fuzzy']['id_penyakit']);
$nama_final   = getNamaPenyakit($conn, $hasil['diagnosa_akhir']);

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Hasil Konsultasi - Sistem Pakar Kesehatan Mental Remaja</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <h4 class="m-0 text-primary">Sistem Pakar Kesehatan Mental Remaja</h4>
        </a>
    </nav>
    <!-- Navbar End -->

    <!-- Hero -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Hasil Konsultasi</h1>
            </div>
        </div>
    </div>

    <!-- Hasil Start -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light rounded p-4 shadow-sm text-center">
                    <h3 class="text-primary mb-4">Hasil Analisis Kesehatan Mental</h3>
                    <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
                    <p><strong>Kelas:</strong> <?= htmlspecialchars($kelas) ?></p>
                    <hr>
                    <h4 class="text-success mt-3"><?= htmlspecialchars($data['nama_penyakit']) ?></h4>
                    <p class="mt-3 text-muted"><?= htmlspecialchars($data['deskripsi']) ?></p>
                    <div class="alert alert-info mt-4 text-start">
                        <strong>Saran:</strong> <?= htmlspecialchars($data['saran']) ?>
                    </div>
                    <hr>

                    <h5 class="mt-4 text-primary">Detail Perhitungan Sistem</h5>
                    <div class="text-start mt-3">
                        <p><strong>Forward Chaining:</strong></p>
                        <ul>
                            <li>Penyakit Terpilih: <?= $nama_forward ?></li>
                            <li>Jumlah Gejala Cocok: <?= $hasil['forward_chaining']['nilai'] ?></li>
                        </ul>

                        <p><strong>Fuzzy Matching:</strong></p>
                        <ul>
                            <li>Penyakit Terpilih: <?= $nama_fuzzy ?></li>
                            <li>Derajat Kecocokan: <?= $hasil['fuzzy']['derajat_kecocokan'] ?></li>
                            <li>Validasi Hasil: <?= $hasil['fuzzy']['validasi'] ?></li>
                        </ul>

                        <p><strong>Diagnosa Akhir:</strong> <?= $nama_final ?></p>
                    </div>

                    <a href="consultation.php" class="btn btn-primary mt-3">Kembali Konsultasi</a>
                    <a href="index.php" class="btn btn-outline-secondary mt-3">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hasil End -->
</body>

</html>