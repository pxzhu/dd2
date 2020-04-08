<?php
  include "dbConn.php";
  session_start();

  $bno = $_GET['idx'];
  $id = $_SESSION['userid'];
  $sql = "SELECT * FROM noticeBoard WHERE idx = '$bno';";
  $query = mysqli_query($dbConn, $sql);
  $row = mysqli_fetch_array($query);
  if($id == $row["id"]){
  $dsql = "DELETE FROM noticeBoard WHERE idx = '$bno';";
  $dquery = mysqli_query($dbConn, $dsql);
?>
<!-- 등급 미달시 접근 금지-->
<script type="text/javascript">
  alert("삭제되었습니다.");
</script>
<meta http-equiv="refresh" content="0 url=/noticeBoard.php" />
<?php
} else { ?>
  <script type="text/javascript">
    alert("삭제 권한이 없습니다.");
    history.back();
  </script>
<?php } ?>
