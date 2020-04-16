<?php
include "dbConn.php";

if ($_POST["id"] == "" || $_POST["name"] == "" || $_POST["code"] == "" || $_POST["phone"] == "" || $_POST["email"] == "") {
    echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
} else {
    $userid = $_POST['id'];
    $username = $_POST['name'];
    $usercode = $_POST['code'];
    $userphone = $_POST['phone'];
    $email = $_POST['email'].'@'.$_POST['emadress'];

    $sql = mq("SELECT id, name, code, phoneN, email FROM users WHERE id = '$userid' AND name = '$username' AND code = '$usercode' AND phoneN = '$userphone' AND email = '$email';");
    $result = mysqli_fetch_array($sql);

    if ($result["id"] == $userid && $result["name"] == $username && $result["code"] == $usercode && $result["phoneN"] == $userphone && $result["email"] == $email) {
        session_start();
        $_SESSION["uid"] = $userid;
        echo "<script>alert('회원님의 비밀번호를 변경합니다.'); location.href='memberPwUpdate.php';</script>";
    } else {
        echo "<script>alert('없는 계정입니다.'); history.back();</script>";
    }
} ?>
