<?php
function diagnosaFuzzy($conn, $jawaban_user) {

    // -----------------------------
    // 1. FORWARD CHAINING
    // -----------------------------
    $query_rule = mysqli_query($conn, "SELECT * FROM rule");
    $hasil = [];
    $total_gejala_penyakit = [];

    while ($r = mysqli_fetch_assoc($query_rule)) {
        $id_penyakit = $r['id_penyakit'];
        $id_gejala   = $r['id_gejala'];

        // Hitung total gejala tiap penyakit
        if (!isset($total_gejala_penyakit[$id_penyakit])) {
            $total_gejala_penyakit[$id_penyakit] = 0;
        }
        $total_gejala_penyakit[$id_penyakit]++;

        // Jika user memilih gejala tersebut
        if (isset($jawaban_user[$id_gejala]) && $jawaban_user[$id_gejala] == 1) {
            if (!isset($hasil[$id_penyakit])) {
                $hasil[$id_penyakit] = 0;
            }
            $hasil[$id_penyakit]++;
        }
    }

    // Cari nilai tertinggi dari Forward Chaining
    $id_forward = null;
    $nilai_forward = 0;

    foreach ($hasil as $id_penyakit => $nilai) {
        if ($nilai > $nilai_forward) {
            $nilai_forward = $nilai;
            $id_forward = $id_penyakit;
        }
    }

    // -----------------------------
    // 2. FUZZY MATCHING PERCENTAGE
    // -----------------------------
    $fuzzy_scores = [];

    foreach ($total_gejala_penyakit as $id_penyakit => $total) {
        $cocok = isset($hasil[$id_penyakit]) ? $hasil[$id_penyakit] : 0;
        
        // Rumus fuzzy derajat kecocokan
        // μ = cocok / total
        $derajat = $cocok / $total;
        $fuzzy_scores[$id_penyakit] = $derajat;
    }

    // Cari fuzzy tertinggi
    $id_fuzzy = null;
    $nilai_fuzzy = 0;

    foreach ($fuzzy_scores as $id_penyakit => $derajat) {
        if ($derajat > $nilai_fuzzy) {
            $nilai_fuzzy = $derajat;
            $id_fuzzy = $id_penyakit;
        }
    }

    // -----------------------------
    // 3. VALIDASI AKHIR
    // -----------------------------
    $threshold = 0.5; 

    if ($nilai_fuzzy < $threshold) {
        $validasi = "Rendah (hasil kurang meyakinkan)";
    } elseif ($nilai_fuzzy < 0.75) {
        $validasi = "Sedang (hasil cukup meyakinkan)";
    } else {
        $validasi = "Tinggi (hasil sangat meyakinkan)";
    }

    // -----------------------------
    // RETURN HASIL KOMBINASI
    // -----------------------------
    return [
        "forward_chaining" => [
            "id_penyakit" => $id_forward,
            "nilai" => $nilai_forward
        ],
        "fuzzy" => [
            "id_penyakit" => $id_fuzzy,
            "derajat_kecocokan" => round($nilai_fuzzy, 2),
            "validasi" => $validasi
        ],
        "diagnosa_akhir" => $id_fuzzy 
    ];
}
?>
