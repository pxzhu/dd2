<?php
  include "dbConn.php";
  session_start();
  $con_num = $_POST['bno'];
  $id=$_SESSION['userid'];
  $content = $_POST['content'];
  $date=$_POST['date'];

  $sql = "DELETE FROM reply
          WHERE id='$id'
          AND con_num = '$con_num'
          AND content = '$content'
          AND date = '$date';";
  $query = mysqli_query($dbConn, $sql);

?>

<script type="text/javascript">
  alert('댓글이 삭제되었습니다.');
  location.replace("noticeRead.php?idx=<?php echo $con_num; ?>");
</script>