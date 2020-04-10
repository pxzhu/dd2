<?php
  include "dbConn.php";
  session_start();
  $idx = $_POST['idx'];
  $con_num = $_POST['bno'];
  $content = $_POST['content'];

  $sql = "UPDATE reply
          SET content = '$content'
          WHERE con_num = '$con_num'
          AND idx = '$idx';";
  $query = mysqli_query($dbConn, $sql);

?>
<script type="text/javascript">
  alert('댓글이 수정되었습니다.');
  location.replace("noticeRead.php?idx=<?php echo $con_num; ?>");
</script>
