<?php include "dbConn.php";

$userpw = password_hash($_POST["userpw"], PASSWORD_DEFAULT);
$userid = $_SESSION["uid"];

if ($_SESSION['uid'] != null) {
    $sql = mq("UPDATE users SET pw = '$userpw' WHERE id = '$userid';");

    session_destroy();
    echo "<script>alert('비밀번호를 변경했습니다.'); location.href='login.php';</script>";
} ?>
