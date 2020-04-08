<?php
  include "dbConn.php";
  session_start();

  $bno = $_GET['idx'];
  $sql = "DELETE FROM noticeBoard WHERE idx = '$bno';";
  $query = mysqli_query($dbConn, $sql);
?>
<!-- 등급 미달시 접근 금지-->
<script type="text/javascript">
  alert("삭제되었습니다.");
</script>
<meta http-equiv="refresh" content="0 url=/noticeBoard.php" />
