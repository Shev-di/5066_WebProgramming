<?php
require '../auth/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $edit_nilai = isset($_POST['edit_nilai']) ? $_POST['edit_nilai'] : [];

    // Persiapkan query untuk update data
    $query = "UPDATE mahasiswa SET ";
    $params = [];
    $types = "";

    // Cek nilai yang dipilih dan tambahkan ke query
    if (in_array('tugas', $edit_nilai)) {
        $query .= "tugas = ?, ";
        $params[] = $_POST['tugas'];
        $types .= "i"; 
    }

    if (in_array('responsi', $edit_nilai)) {
        $query .= "responsi = ?, ";
        $params[] = $_POST['responsi'];
        $types .= "i";
    }

    if (in_array('uts', $edit_nilai)) {
        $query .= "uts = ?, ";
        $params[] = $_POST['uts'];
        $types .= "i";
    }

    if (in_array('uas', $edit_nilai)) {
        $query .= "uas = ?, ";
        $params[] = $_POST['uas'];
        $types .= "i";
    }

    // Hapus koma terakhir
    $query = rtrim($query, ", ") . " WHERE nim = ?";

    // Tambahkan NIM ke parameter
    $params[] = $nim;
    $types .= "s"; // 's' untuk string (NIM)

    // Eksekusi query
    $stmt = $sambung->prepare($query);
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        header('Location: rekap_nilai.php?status=success');
        exit;
    } else {
        echo "Terjadi kesalahan saat menyimpan perubahan.";
    }
}
?>
