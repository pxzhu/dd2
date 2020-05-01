<?php include "dbConn.php";

  $bno = $_GET['idx'];
  $id = $_SESSION['userid'];
  $sql = mq("SELECT * FROM QNABoard WHERE idx = '$bno';");
  $row = mysqli_fetch_array($sql);
  if($id == $row["id"]){
  $dsql = mq("DELETE FROM QNABoard WHERE idx = '$bno';");
?>
<!-- 등급 미달시 접근 금지-->
<script type="text/javascript">
  alert("삭제되었습니다.");
</script>
<meta http-equiv="refresh" content="0 url=/QNABoard.php" />
<?php
} else { ?>
  <script type="text/javascript">
    alert("삭제 권한이 없습니다.");
    history.back();
  </script>
<?php } ?>
