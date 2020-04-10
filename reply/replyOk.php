<?php
  include "dbConn.php";
  session_start();
  $id=$_SESSION['userid'];
  $name=$_SESSION['username'];
  $con_num=$_POST['bno'];
  $content=$_POST['content'];

  $sql = "INSERT INTO reply(con_num, name, id, content, date)
  VALUES('$con_num', '$name', '$id', '$content', default);";
  $query = mysqli_query($dbConn, $sql);
?>
<script type="text/javascript">
  alert('댓글이 등록되었습니다.');
  location.replace("noticeRead.php?idx=<?php echo $con_num; ?>");
</script>
