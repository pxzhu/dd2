<?php
  include "dbConn.php";
  session_start();

  $bno = $_POST['idx'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $sql = "UPDATE noticeBoard SET title = '$title', content='$content' WHERE idx='$bno';";
  $query = mysqli_query($dbConn, $sql) ?>
<script type="text/javascript">
  alert("수정되었습니다.");
</script>
<meta http-equiv="refresh" content="0 url=/noticeRead.php?idx=<?php echo $bno; ?>">
