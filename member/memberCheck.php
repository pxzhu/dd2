<?php
include "dbConn.php";

$name = $_POST['username'];
$id = $_POST['userid'];
$pw = $_POST['userpw'];
$pwc = $_POST['userpwc'];
$code = $_POST['code'];
$email = $_POST['email'].'@'.$_POST['emadress'];
$phone = $_POST['userphone'];

$pw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$sql = mq("INSERT INTO users(name,id,pw,code,email,phoneN)
    VALUES('$name', '$id', '$pw', '$code', '$email', '$phone');");
?>

<meta charset="utf-8" />
<script type="text/javascript">
  alert('회원가입이 완료되었습니다.');
</script>
<meta http-equiv="refresh" content="0 url=/login.php">
