<?php
require '../auth/config.php';
session_start();

$username_input = @$_POST["email"];
$password_input = @$_POST["password"];
if(!empty($username_input)&& !empty($password_input)){
    $query = mysqli_query($sambung,"SELECT * FROM login WHERE email='$username_input' AND password='$password_input'");
    $allsalah = mysqli_query($sambung,"SELECT * FROM login WHERE email!='$username_input' AND password !='$password_input'");
    $usersalah = mysqli_query($sambung,"SELECT * FROM login WHERE email!='$username_input' AND password ='$password_input'");
    $pwsalah = mysqli_query($sambung,"SELECT * FROM login WHERE email='$username_input' AND password !='$password_input'");
    $all= mysqli_num_rows($allsalah);
    $user= mysqli_num_rows($usersalah);
    $pw= mysqli_num_rows($pwsalah);
    $result = mysqli_num_rows($query);

        if ($result>0){
            session_start();
            $_SESSION['nama'] = $datauser['nama'];
            $_SESSION['status'] = "login";
            $_SESSION["akses"] = true ;
                header("location:../dashboard/dashboard.php");
        }else if ($user>0){
            header("location:login.php?pesan=user");
        }else if ($pw>0){
            header("location:login.php?pesan=pw");
        }else if ($all>0){
            header("location:login.php?pesan=all");
        }
        else{
            header("location:login.php?pesan=gagal");
        }
// } else if (!empty($username_input)&& !empty($password_input)){

}else{
    header("location:login.php");
}

?>