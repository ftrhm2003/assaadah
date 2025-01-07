<?php
session_start();

session_destroy();

session_start();
$_SESSION['login_error'] = "You have successfully logged out";

header('location:login.php');
?>