<?php
    include "dbConn.php";
		session_start();
?>
<!doctype html>

<head>
	<meta charset="UTF-8">
	<title>게시판</title>
	<link rel="stylesheet" type="text/css" href="/css/read.css" />
</head>

<body>
	<?php
  	$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		$query = "SELECT * FROM noticeBoard WHERE idx = '$bno'";
		$row = mysqli_query($dbConn, $query);
		$array = mysqli_fetch_array($row);
		$hit = $array['hit'] + 1;

		$uquery = "UPDATE noticeBoard SET hit = '$hit' WHERE idx = '$bno'";
		$urow = mysqli_query($dbConn, $uquery);

		$bquery = "SELECT * FROM noticeBoard WHERE idx = '$bno'";
		$brow = mysqli_query($dbConn, $bquery);
		$barray = mysqli_fetch_array($brow);
  ?>
	<!-- 글 불러오기 -->
	<div id="board_read">
		<h2><?php echo $barray['title']; ?></h2>
		<div id="user_info">
			<?php echo $barray['name']; ?> <?php echo $barray['date']; ?> 조회:<?php echo $barray['hit']; ?>
			<div id="bo_line"></div>
		</div>
		<div id="bo_content">
			<?php echo nl2br($barray['content']); ?>
		</div>
		<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<li><a href="noticeBoard.php">[목록으로]</a></li>
				<li><a href="noticeModify.php?idx=<?php echo $barray['idx']; ?>">[수정]</a></li>
				<li><a href="noticeDelete.php?idx=<?php echo $barray['idx']; ?>">[삭제]</a></li>
			</ul>
		</div>
	</div>
</body>

</html>
