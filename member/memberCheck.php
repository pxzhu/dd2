<?php
include "/db/dbConn.php";
$name = $_POST['username'];
$id = $_POST['userid'];
$pw = $_POST['userpw'];
$pwc = $_POST['userpwc'];
$code = $_POST['code'];
$email = $_POST['email'].'@'.$_POST['emadress'];
$phone = $_POST['userphone'];

$sql1 = mq("SELECT id FROM users WHERE id = '$id';");
$check = mysqli_fetch_array($sql1);
if($check >= 1){
  echo "<script> alert('아이디가 중복됩니다.'); history.back(); </script>";
}else{

$pw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$sql = mq("INSERT INTO users(name,id,pw,code,email,phoneN,manager)
    VALUES('$name', '$id', '$pw', '$code', '$email', '$phone','');");
?>
<meta charset="utf-8" />
<script type="text/javascript">
  alert('회원가입이 완료되었습니다.');
</script>
<meta http-equiv="refresh" content="0 url=/member/login.php">
<?php } ?>
