<?php
include "dbConn.php";
session_start();

$userpw = password_hash($_POST["pw"], PASSWORD_DEFAULT);
$userid = $_SESSION["uid"];

if ($_SESSION['uid'] != null) {
    $sql = "UPDATE users
          SET pw = '$userpw'
          WHERE id = '$userid'";
    $query = mysqli_query($dbConn, $sql);

    session_destroy();
    echo "<script>alert('비밀번호를 변경했습니다.'); location.href='login.php';</script>";
} ?>
