<?php
include "dbConn.php";
session_start();

session_destroy();
?>
<meta charset="utf-8">
<script>
  alert("로그아웃되었습니다.");
  location.href = "main.php";
</script>
