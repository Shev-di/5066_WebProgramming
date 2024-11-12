<?php
session_start();
#penghapusan akses
session_destroy();
#menuju halaman login
header("location:login/login.php");

?>