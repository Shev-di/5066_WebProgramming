<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="register.css">
    <title>Register Dosen - Universitas Amikom </title>
</head>

<body class="gradient vh-100 ">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="bg-2e1760 gradient2 rounded-3">
            <!-- isi box -->
            <div class="card-body">
                <nav class="container text-light">
                    <h5 class="mt-1 text-center text-decoration-underline k2d">Register</h5>
                </nav>
                <form class="pe-2 ps-2 mt-2" method="POST" action="prosesregister.php">
                    <!-- Nama -->
                    <label for="Nama" class=" text-light k2d">Nama </label><br>
                    <input type="tel" name="nama" id="nama" class="bg-7180B9 px-4 me-3 border-0 container  rounded-3 k2d "
                        placeholder="nama"><br>
                    <!-- email -->
                    <label for="email" class=" text-light mt-1  k2d">Email </label><br>
                    <input type="tel" name="email" id="email" class="bg-7180B9 border-0 container  rounded-3 k2d "
                        placeholder="xxxx@gmail.com"><br>
                    <!-- password -->
                    <label for="password" class="text-light k2d">Password </label><br>
                    <input type="tel" name="password" id="password" class="bg-7180B9 border-0 container rounded-3  k2d"
                        placeholder="*********"><br>
                    <!-- confirm password -->
                    <label for="password" class="text-light k2d">Confirm Password </label><br>
                    <input type="tel" name="cpassword" id="password" class="bg-7180B9 border-0 container rounded-3  k2d"
                        placeholder="*********"><br>
                    <!-- button -->
                    <div class="container d-flex justify-content-center align-items-center mt-1 mb-2">
                        <button type="submit" class="d-flex bg-DFF3E4 mt-3 btn border-black fs-6 pe-2 ps-2 p-1">
                            <img class="paper me-1 " src="../source/paper.png" alt="">
                            <h6 class="mb-0"><a class="color-3423A6 k2d-bold text-decoration-none">Register</a></h6>
                        </button>
                    </div>
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == 'pw' ) {
                            echo "<p class='text-danger'>Password tidak sama ! </p>";
                        } else if ($_GET['pesan'] == 'ada'){
                            echo "<p class='text-danger'>Akun sudah ada ! </p>";
                        }
                    }
                    ?>
            <!-- isi box end -->
        </form>
    </div>
</body>

</html>