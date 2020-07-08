<?php include "/db/dbConn.php";
session_destroy();
?>
<meta charset="utf-8">
<script>
  alert("로그아웃되었습니다.");
  location.href = "/member/main.php";
</script>
