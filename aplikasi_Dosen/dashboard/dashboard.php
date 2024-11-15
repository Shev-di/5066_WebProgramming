<?php
require "../auth/config.php";

session_start();

$akses = @$_SESSION['akses'];

#pengecekan apakah user memiliki akses
if ($akses != true) {
    #ketika akses false akan dilempar ke login
    header("location:../login/login.php?ERROR = BELUM LOGIN");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard Dosen - Universitas Amikom</title>
</head>

<body>
    <div class="bg-DFF3E4 vh-100 w-100">
        <!-- Atas -->
        <div class=" bg-2E1760 ">
            <nav class=" d-flex p-4  container-fluid">
                <button class="btn me-4 ms-3"><img class="more" src="../source/more.png" alt=""></button>
                <!-- profile -->
                <div class="box-putih rounded-3 d-flex text-light p-2">
                    <!-- user -->
                    <div class="d-flex align-items-center">
                        <img class="user" src="../source/user.png" alt="">
                    </div>
                    <!-- Nama -->
                    <div class="px-3 k2d">
                        <!-- <p class="mb-0">Nama Dosen</p>
                        <p class="mb-0">NIP</p> -->
                        <?php
                        $sql = "SELECT * FROM login";
                        $query = mysqli_query($sambung, $sql);
                        $datauser = mysqli_fetch_array($query);
                        // $query =mysqli_query($sambung, "SELECT * FROM users");
                        echo "<p class='mb-0'>" . $datauser["nama"] . "</p>";
                        echo "<p class='mb-0'>NIP</p>";
                        // echo "<p class='mb-0'>" . $datauser["nama"] . "</p>";
                        // $nomer++;

                        ?>
                    </div>
                    <!-- Tombol edit -->
                    <div class=" align-items-end  flex-column d-flex  justify-content-end ">
                        <a href="../tambah_data/data.php">
                            <div class="bg-7180B9 pe-2 h-6 btn ps-2 k2d-bold ">
                                <p class="mb-0">Edit Profil</p>
                            </div>
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Nav & isi -->
        <div class=" row w-100 h-85 ">
            <div class="bg-3423A6 col-sm-2">
                <!-- dashboard -->
                <a href="../dashboard/dashboard.php" class="text-decoration-none">
                    <div class="bg-7180B9 mt-3 p-2 ps-2 ">
                        <div class="d-flex  align-items-center">
                            <img src="../source/home-icon-silhouette.png " class="dashboard " alt="">
                            <div class=" text-light">
                                <h6 class="mb-0 inter ms-3">Dashboard</h6>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Rekap -->
                <a href="../rekapnilai/rekap_nilai.php " class="text-decoration-none">
                    <div class="mt-3 p-2 ps-2">
                        <div class="d-flex align-items-center">
                            <img src="../source/assignment.png" class="dashboard" alt="">
                            <h6 class="mb-0 ms-3 inter text-light">Rekapitulasi Nilai</h6>
                        </div>
                    </div>
                </a>

                <!-- Logout -->
                <div class=" container d-flex flex-column justify-content-end align-items-center h-75 pb-3">
                    <a href="../proseslogout.php">
                        <div class=" pe-2 ps-2 btn box-putih text-light bg-FF0000 me-3 ms-3">
                            <p class="mb-0 inter">LOGOUT</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Isi -->
            <div class="col-sm-10 bg-DFF3E4 p-4  inter">
                <div class="bg-9D9D9D p-3 mx-4 me-4 rounded-3">
                    <div class="ms-2 align-items-center">
                        <h5 class="mb-0 inter-bold">Semester Genap . Tahun Ajaran 2023/2024</h5>
                    </div>
                </div>

                <div class="bg-FFFFFF content mt-3 mx-4 me-4 rounded-3">
                    <table class="table table-striped  text-center ">
                        <thead>
                            <tr class="">
                                <th>No</th>
                                <th>Hari</th>
                                <th>Waktu</th>
                                <th>MatKul</th>
                                <th>Kelas</th>
                                <th>Jumlah Mahasiswa</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr class="bg-E7E7E7 ">
                                <td>1</td>
                                <td>Senin</td>
                                <td>07.00-08.40</td>
                                <td>Nama Matkul</td>
                                <td>Kelas</td>
                                <td>.. Mahasiswa</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Senin</td>
                                <td>08.50-10.30</td>
                                <td>Nama Matkul</td>
                                <td>Kelas</td>
                                <td>.. Mahasiswa</td>
                            </tr>

                            <tr class="bg-E7E7E7">
                                <td>3</td>
                                <td>Senin</td>
                                <td>15.30-17.10</td>
                                <td>Nama Matkul</td>
                                <td>Kelas</td>
                                <td>.. Mahasiswa</td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>Senin</td>
                                <td>08.50-10.30</td>
                                <td>Nama Matkul</td>
                                <td>Kelas</td>
                                <td>.. Mahasiswa</td>
                            </tr>
                            <tr class="bg-E7E7E7">
                                <td>5</td>
                                <td>Senin</td>
                                <td>13.20-15.00</td>
                                <td>Nama Matkul</td>
                                <td>Kelas</td>
                                <td>.. Mahasiswa</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Senin</td>
                                <td>07.00-08.30</td>
                                <td>Nama Matkul</td>
                                <td>Kelas</td>
                                <td>.. Mahasiswa</td>
                            </tr>
                            <tr class="bg-E7E7E7">
                                <td>7</td>
                                <td>Senin</td>
                                <td>13.20-15.00</td>
                                <td>Nama Matkul</td>
                                <td>Kelas</td>
                                <td>.. Mahasiswa</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>