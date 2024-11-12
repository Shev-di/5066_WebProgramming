<?php
require '../auth/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $hapus_nilai = $_POST['hapus_nilai']; // Array jenis nilai
        foreach ($hapus_nilai as $nilai) {
            $query = "UPDATE mahasiswa SET $nilai = 0 WHERE nim = ?";
            $stmt = $sambung->prepare($query);
            $stmt->bind_param("s", $nim);
            $stmt->execute();
        }

    echo "<script>alert('Data berhasil dihapus!'); window.location = 'rekap_nilai.php';</script>";
}
?>
