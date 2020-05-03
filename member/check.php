<?php include "dbConn.php";

// 아이디 중복체크 
$uid = $_GET['userid'];
$sql = mq("SELECT id FROM users WHERE id='$uid';");
$row = mysqli_num_rows($sql);

$returnStr="";

if ($row==0) {
  $returnStr="0";
} else {
  $returnStr="1";
}
mysqli_free_result($result);
echo $returnStr;
?>
