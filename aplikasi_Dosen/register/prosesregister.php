<?php
require "../auth/config.php";
session_start();

$name = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if ($password != $cpassword) {
    header('location:register.php?pesan=pw');
} else {
    $query = mysqli_query($sambung, "SELECT * FROM login WHERE email='$email' AND password='$password'");
    $result = mysqli_num_rows($query);

    if ($result > 0) {
        header('location:register.php?pesan=ada');
    } else {
        $sql = "INSERT INTO login (nama, email, password) VALUES ('$name','$email', '$password')";
        $query = mysqli_query($sambung, $sql);
        if ($query) {
            header('location:../login/login.php?status=sukses');
        } else {
            header('location:../login/login.php?status=gagal');
        }
    }
}
?>