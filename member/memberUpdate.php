<?php
include "dbConn.php";
session_start();

$pw = $_POST['userpw'];
$pwc = $_POST['userpwc'];
$phone = $_POST['phone'];

//비밀번호와 비밀번호 확인 일치 검사
if ($pw != $pwc) {
    echo '비밀번호가 일치하지 않습니다.';
    exit;
} else {
    $pw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
}
$userid = $_SESSION["userid"];
if ($_SESSION['userid'] != null) {
    $sql = "UPDATE users SET pw = '$pw', phoneN = '$phone' WHERE id = '$userid'";
    $query = mysqli_query($dbConn, $sql);
    echo "<script>alert('정보변경이 완료되었습니다'); location.href='main.php';</script>";
} else {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
} ?>
