<?php
session_start();

session_destroy();

session_start();
$_SESSION['login_error'] = "Kamu berhasil keluar";

header('location:login.php');
?>