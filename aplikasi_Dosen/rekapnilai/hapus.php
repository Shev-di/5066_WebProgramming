<?php
require '../auth/config.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Ambil data mahasiswa berdasarkan NIM
    $query = "SELECT * FROM mahasiswa WHERE nim = ?";
    $stmt = $sambung->prepare($query);
    $stmt->bind_param("s", $nim);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Data untuk Dihapus</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-3423A6 text-white">
                <h3>Hapus Nilai untuk: <?= $data['nama'] ?> (<?= $data['nim'] ?>)</h3>
            </div>
            <div class="card-body bg-E7E7E7">
                <form method="POST" action="proses_hapus.php">
                    <input type="hidden" name="nim" value="<?= $nim ?>">

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="hapus_nilai[]" value="tugas" id="hapus_tugas">
                        <label class="form-check-label" for="hapus_tugas">Hapus Tugas</label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="hapus_nilai[]" value="responsi" id="hapus_responsi">
                        <label class="form-check-label" for="hapus_responsi">Hapus Responsi</label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="hapus_nilai[]" value="uts" id="hapus_uts">
                        <label class="form-check-label" for="hapus_uts">Hapus UTS</label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="hapus_nilai[]" value="uas" id="hapus_uas">
                        <label class="form-check-label" for="hapus_uas">Hapus UAS</label>
                    </div>

                    <!-- <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="hapus_nilai[]" value="all" id="hapus_all">
                        <label class="form-check-label" for="hapus_uas">Hapus Semua</label>
                    </div> -->

                    <button type="submit" class="btn btn-danger w-100 mt-3">Hapus Data</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    } else {
        echo "<div class='alert alert-warning mt-3'>Data tidak ditemukan!</div>";
    }
}
?>
