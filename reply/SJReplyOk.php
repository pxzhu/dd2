<?php include "../db/dbConn.php";
$id=$_SESSION['userid'];
$name=$_SESSION['username'];
$con_num=$_POST['bno'];
$content=$_POST['content'];

$sql = mq("INSERT INTO SJReply(con_num, name, id, content, date) VALUES('$con_num', '$name', '$id', '$content', default);");
?>
<script type="text/javascript">
  alert('댓글이 등록되었습니다.');
  location.replace("/board/SJRead.php?idx=<?php echo $con_num; ?>");
</script>
