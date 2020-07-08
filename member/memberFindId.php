<?php include "/db/dbConn.php";

if ($_POST["name"] == "" || $_POST["code"] == "" || $_POST["phone"] == "" || $_POST["email"] == "") {
    echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
} else {
    $username = $_POST['name'];
    $usercode = $_POST['code'];
    $userphone = $_POST['phone'];
    $email = $_POST['email'].'@'.$_POST['emadress'];

    $sql = mq("SELECT name, code, phoneN, email, id FROM users WHERE name = '$username' AND code = '$usercode' AND phoneN = '$userphone' AND email = '$email';");
    $result = mysqli_fetch_array($sql);

    if ($result["name"] == $username && $result["code"] == $usercode && $result["phoneN"] == $userphone && $result["email"] == $email) {
        echo "<script>alert('회원님의 ID는 ".$result['id']."입니다.'); history.back();</script>";
    } else {
        echo "<script>alert('없는 계정입니다.'); history.back();</script>";
    }
}
?>
