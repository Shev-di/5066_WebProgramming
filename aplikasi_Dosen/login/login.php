<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="login.css">
    <title>Login Dosen - Universitas Amikom </title>
</head>

<body class="gradient vh-100 ">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="bg-2e1760 gradient2 rounded-3">
            <!-- isi box -->
            <form class="card-body" action="proseslogin.php" method="POST">
                <nav class="container text-light">
                    <h5 class="mt-1 text-center text-decoration-underline k2d">Login</h5>
                </nav>
                <div class="pe-2 ps-2">
                    <!-- email -->
                    <label for="email" class="ms-1 text-light k2d">Email </label>
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == 'user') {
                            echo "<p style='color:red;'>username tidak ditemukan</p>";
                        } else if ($_GET['pesan'] == 'all') {
                            echo "<p style='color:red;'>username tidak ditemukan</p>";
                        }
                    }
                    ?><br>
                    <input type="tel" name="email" id="email" class="bg-7180B9 border-0 container  rounded-3 k2d "
                        placeholder="xxxx@gmail.com"><br>
                    <!-- password -->
                    <label for="password" class=" ms-1 text-light mt-4 k2d">Password </label>
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == 'pw') {
                            echo "<p style='color:red;'>password salah</p>";
                        } else if ($_GET['pesan'] == 'all') {
                            // echo "<p style='color:red;'>password salah</p>";
                        }
                    }
                    ?>
                    <input type="password" name="password" id="password"
                        class="bg-7180B9 border-0 container rounded-3  k2d" placeholder="*********"><br>
                    <!-- button -->

                    <div class="container d-flex justify-content-center mt-3">
                        <a class=" k2d-bold text-decoration-none" href="../dashboard/dashboard.php">
                            <button type="submit"
                                class="d-flex bg-DFF3E4 mt-3 btn button:hover border-black fs-6 pe-3 ps-2">
                                <img class="" src="../source/arrow.png" alt="">
                                <div class="flex-column align-items-center d-flex justify-content-center ">
                                    <h6 class=" color-3423A6 mt-1 k2d-bold mb-0">Login</h6>
                                </div>
                            </button>
                        </a>
                    </div>
                    <!-- link regis -->
                </div>
                <div class="d-flex fs-a mt-3 inter">
                    <p class="text-light  ">Jika Belum Memiliki Akun Silahkan Klik. <a href="../register/register.php"
                            class="color-0DC536">Register</a> </p>
                </div>
            </form>
            <!-- isi box end -->
        </div>
    </div>
</body>

</html>