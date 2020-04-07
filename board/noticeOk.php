<?php

include "dbConn.php";
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$title = $_POST['title'];
$content = $_POST['content'];


$sql = "INSERT INTO noticeBoard(name, id, title, content, date, hit)
VALUES('$username', '$userid', '$title', '$content', default, 0);";
$query = mysqli_query($dbConn, $sql); ?>

<script type="text/javascript">
  alert("글쓰기 완료되었습니다.");
</script>
<meta http-equiv="refresh" content="0 url=noticeBoard.php" />
