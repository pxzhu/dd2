<?php include "../db/dbConn.php";

$con_num = $_POST['bno'];
$id=$_SESSION['userid'];
$content = $_POST['content'];
$date=$_POST['date'];

$sql = mq("DELETE FROM SJReply WHERE id='$id' AND con_num = '$con_num' AND content = '$content' AND date = '$date';");
?>

<script type="text/javascript">
  alert('댓글이 삭제되었습니다.');
  location.replace("/board/SJRead.php?idx=<?php echo $con_num; ?>");
</script>
