<?php
// Koneksi ke database
require '../auth/config.php';
session_start();


if ($sambung->connect_error) {
    die("Koneksi gagal: " . $sambung->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nimInput'] ;
    $jenis_nilai = $_POST['sellist1'] ;
    $nilai = $_POST['nilai'] ;

    // Periksa apakah data dengan NIM dan Jenis Nilai sudah ada
    $query = mysqli_query($sambung,"SELECT * FROM mahasiswa WHERE nim = '$nim'");
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        // Data ditemukan, lakukan update
        $updateQuery = mysqli_query($sambung, "UPDATE mahasiswa SET $jenis_nilai = '$nilai' WHERE nim = '$nim'");
        
        if ($updateQuery) {
            echo "<script>alert('Nilai berhasil diperbarui!'); window.location = 'rekap_nilai.php';</script>";
            // header("location: rekap_nilai.php");
        } else {
            echo "<script>alert('Gagal memperbarui nilai: " . $sambung->error . "');</script>";
        }
    } else {
        // Data tidak ditemukan
        echo "<script>alert('Data dengan NIM dan Jenis Nilai tersebut tidak ditemukan.'); window.location = 'rekap_nilai.php';</script>";
    }

    // $stmtCheck->close();
}
if (!$query) {
    die("Query Error: " . mysqli_error($sambung));
}


// $sambung->close();
?>
