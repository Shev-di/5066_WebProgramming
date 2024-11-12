<?php
require '../auth/config.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Ambil data berdasarkan NIM
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
    <title>Edit Nilai Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-check-label {
            font-size: 1rem;
        }

        .form-control {
            border-radius: 8px;
        }

        .alert {
            margin-top: 30px;
        }

        .mt-5 {
            margin-top: 50px !important;
        }

        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card p-4">
            <h3 class="card-title text-center mb-4">Edit Nilai Mahasiswa: <?= $data['nama'] ?> (<?= $data['nim'] ?>)</h3>
            <form method="POST" action="proses_edit.php">
                <input type="hidden" name="nim" value="<?= $nim ?>">

                <!-- Pilihan untuk mengedit nilai -->
                <div class="mb-4">
                    <label class="form-label">Pilih Nilai yang Ingin Diedit:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edit_nilai[]" value="tugas" id="edit_tugas" 
                        <?php if (isset($data['tugas']) && $data['tugas'] != 0) echo 'checked'; ?>>
                        <label class="form-check-label" for="edit_tugas">Edit Nilai Tugas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edit_nilai[]" value="responsi" id="edit_responsi"
                        <?php if (isset($data['responsi']) && $data['responsi'] != 0) echo 'checked'; ?>>
                        <label class="form-check-label" for="edit_responsi">Edit Nilai Responsi</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edit_nilai[]" value="uts" id="edit_uts"
                        <?php if (isset($data['uts']) && $data['uts'] != 0) echo 'checked'; ?>>
                        <label class="form-check-label" for="edit_uts">Edit Nilai UTS</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edit_nilai[]" value="uas" id="edit_uas"
                        <?php if (isset($data['uas']) && $data['uas'] != 0) echo 'checked'; ?>>
                        <label class="form-check-label" for="edit_uas">Edit Nilai UAS</label>
                    </div>
                </div>

                <!-- Field untuk mengedit nilai yang dipilih -->
                <?php
                if (isset($data['tugas'])) {
                ?>
                <div class="mb-3" id="tugas_field" style="display: <?= isset($_POST['edit_nilai']) && in_array('tugas', $_POST['edit_nilai']) ? 'block' : 'none'; ?>;">
                    <label for="tugas" class="form-label">Nilai Tugas</label>
                    <input type="number" class="form-control" name="tugas" value="<?= $data['tugas'] ?>" required>
                </div>
                <?php
                }

                if (isset($data['responsi'])) {
                ?>
                <div class="mb-3" id="responsi_field" style="display: <?= isset($_POST['edit_nilai']) && in_array('responsi', $_POST['edit_nilai']) ? 'block' : 'none'; ?>;">
                    <label for="responsi" class="form-label">Nilai Responsi</label>
                    <input type="number" class="form-control" name="responsi" value="<?= $data['responsi'] ?>" required>
                </div>
                <?php
                }

                if (isset($data['uts'])) {
                ?>
                <div class="mb-3" id="uts_field" style="display: <?= isset($_POST['edit_nilai']) && in_array('uts', $_POST['edit_nilai']) ? 'block' : 'none'; ?>;">
                    <label for="uts" class="form-label">Nilai UTS</label>
                    <input type="number" class="form-control" name="uts" value="<?= $data['uts'] ?>" required>
                </div>
                <?php
                }

                if (isset($data['uas'])) {
                ?>
                <div class="mb-3" id="uas_field" style="display: <?= isset($_POST['edit_nilai']) && in_array('uas', $_POST['edit_nilai']) ? 'block' : 'none'; ?>;">
                    <label for="uas" class="form-label">Nilai UAS</label>
                    <input type="number" class="form-control" name="uas" value="<?= $data['uas'] ?>" required>
                </div>
                <?php
                }
                ?>

                <!-- Tombol Submit -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2">Simpan Perubahan</button>
                    <a href="rekap_nilai.php" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Menampilkan atau menyembunyikan input berdasarkan pilihan checkbox
        document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                let fieldId = checkbox.id.replace('edit_', '') + '_field';
                let field = document.getElementById(fieldId);
                if (checkbox.checked) {
                    field.style.display = 'block';
                } else {
                    field.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
<?php
    } else {
        echo "<div class='alert alert-warning mt-3'>Data tidak ditemukan!</div>";
    }
}
?>
