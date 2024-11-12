<?php
require "../auth/config.php";

session_start();

$akses = @$_SESSION['akses'];

#pengecekan apakah user memiliki akses
if ($akses != true) {
  #ketika akses false akan dilempar ke login
  header("location:login.php?ERROR = BELUM LOGIN");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="rekap_nilai.css">
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
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
            <p class="mb-0">Nama Dosen</p>
            <p class="mb-0">NIP</p>
          </div>
          <!-- Tombol edit -->
          <div class=" align-items-end  flex-column d-flex  justify-content-end ">
            <a href="../tambah_data/data.html">
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
          <div class=" mt-3 p-2 ps-2 ">
            <div class="d-flex  align-items-center">
              <img src="../source/home-icon-silhouette.png " class="dashboard " alt="">
              <div class=" text-light">
                <h6 class="mb-0 inter ms-3">Dashboard</h6>
              </div>
            </div>
          </div>
        </a>

        <!-- Rekap -->
        <a href="../rekapnilai/rekap_nilai.php" class="text-decoration-none">
          <div class="mt-3 p-2 ps-2 bg-7180B9">
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
      <div class="col-sm-10 bg-DFF3E4 p-4 inter">
        <div class="bg-9D9D9D p-3 mx-4 me-4 rounded-3">
          <div class="ms-2 align-items-center">
            <h5 class="mb-0 inter-bold">Semester Genap . Tahun Ajaran 2023/2024</h5>
          </div>
        </div>

        <div class="dropdown ms-4 mt-3 d-flex ">
          <div>

            <button type="button" class="btn bg-9D9D9D inter-bold dropdown-toggle p-2 ps-4 " data-bs-toggle="dropdown">
              Pilih Kelas
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">23-WEB01</a></li>
              <li><a class="dropdown-item" href="#">23-WEB02</a></li>
              <li><a class="dropdown-item" href="#">22-SI01</a></li>
            </ul>
          </div>

          <!-- Button to Open the Modal -->
          <button type="button" class="btn bg-9D9D9D ms-4 p-2 ps-4 pe-4 inter-bold" data-bs-toggle="modal"
            data-bs-target="#myModal">
            Tambah Nilai
          </button>

          <!-- The Modal -->
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title inter-bold">Tambah Nilai </h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form class="modal-body inter" method="POST" action="proses_tambah.php">
                  <section>
                    <div id="searchForm" class="d-flex" role="search">
                      <input id="nimInput" class="form-control me-2" type="text" name="nimInput"
                        placeholder="Masukkan NIM" required>
                    </div>
                  </section>

                  <section class="mt-4">
                    <div>Jenis Nilai</div>
                    <select class="form-select" name="sellist1" required>
                      <option value="Tugas">Tugas</option>
                      <option value="Responsi">Responsi</option>
                      <option value="UTS">UTS</option>
                      <option value="UAS">UAS</option>
                    </select>
                  </section>

                  <section class="mt-3">
                    <div>Masukkan Nilai</div>
                    <input class="form-control" type="number" name="nilai" placeholder="NILAI" required>
                  </section>


                  <!-- Modal footer -->
                  <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn bg-3423A6 text-light px-2" data-bs-dismiss="modal">Simpan</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
          <!-- Modal End -->

        </div>



        <section class=" d-flex">
          <div class="bg-9D9D9D ms-4 mt-3 rounded-3 p-2 inter-bold px-4">
            Nilai Tugas
          </div>
        </section>

        <div class="bg-FFFFFF border rounded-3 overflow-auto table-wrapper ">
          <?php
          $sql = "SELECT * FROM mahasiswa";
          $query = mysqli_query($sambung, $sql)
            ?>
          <table class="table table-borderless inter-bold text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>TUGAS</th>
                <th>RESPONSI</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                $nomer = 1;
                while ($datauser = mysqli_fetch_array($query)) {
                  echo "<tr>";
                  echo "<td>" . $nomer . "</td>";
                  echo "<td>" . $datauser["nama"] . "</td>";
                  echo "<td>" . $datauser["nim"] . "</td>";
                  echo "<td>" . $datauser["tugas"] . "</td>";
                  echo "<td>" . $datauser["responsi"] . "</td>";
                  echo "<td>" . $datauser["uts"] . "</td>";
                  echo "<td>" . $datauser["uas"] . "</td>";
                  echo "<td>
                          <a href='edit.php?nim=" . $datauser["nim"] . "' class='btn btn-warning btn-sm'>Edit</a>
                          <a href='hapus.php?nim=" . $datauser["nim"] . "' class='btn btn-danger btn-sm'>Pilih Hapus</a>
                        </td>";
                  echo "</tr>";
                  echo "</tr>";

                  $nomer++;
                }
                ?>
              </tr>

            </tbody>
          </table>
        </div>

        <section class="mt-3 d-flex">
          <div class="bg-9D9D9D ms-4  rounded-3 p-2 inter-bold px-4">
            Kehadiran
          </div>
        </section>

        <div class="bg-FFFFFF border rounded-3 overflow-auto table-wrapper ">
          <table class="table table-borderless inter-bold text-center">
            <thead>
              <tr class="">
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>P1</th>
                <th>P2</th>
                <th>P3</th>
                <th>P4</th>
                <th>P5</th>
                <th>P6</th>
                <th>P7</th>
                <th>P8</th>
                <th>P9</th>
                <th>P10</th>
                <th>P11</th>
                <th>P12</th>
                <th>P13</th>
                <th>P14</th>
                <th>R1</th>
                <th>R2</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Nama.......................</td>
                <td>23.01.****</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>....</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Nama.......................</td>
                <td>23.01.****</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>

                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>....</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Nama.......................</td>
                <td>23.01.****</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>

                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>....</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Nama.......................</td>
                <td>23.01.****</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>

                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>....</td>
              </tr>
              <tr>
                <td>5</td>
                <td>Nama.......................</td>
                <td>23.01.****</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>

                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>Y</td>
                <td>....</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</body>

</html>