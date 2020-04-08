<?php
    include "dbConn.php";
		session_start();
?>
<!doctype html>

<head>
	<meta charset="UTF-8">
	<title>게시판</title>
	<link rel="stylesheet" type="text/css" href="/css/read.css" />
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
</head>

<body>
  <!--메뉴바 부분-->
  <div class="menubar">
    <ul>
       <li><a href="main.php">홈으로</a></li>
       <li><a href="#" id="current">게시판</a>
          <ul>
            <li><a href="noticeBoard.php">공지사항</a></li>
            <li><a href="#">질문게시판</a></li>
            <li><a href="#">선후배게시판</a></li>
          </ul>
       </li>
       <li><a href="#" id="current">학과행사</a>
         <ul>
           <li><a href="#">활동사진</a></li>
           <li><a href="#">일정</a></li>
         </ul>
       </li>
       <li><a href="#" id="current">학교 홈페이지</a>
         <ul>
           <li><a href="http://pcu.ac.kr">배재대학교</a></li>
           <li><a href="http://course.pcu.ac.kr">LMS</a></li>
           <li><a href="http://tis.pcu.ac.kr">통합정보시스템</a></li>
         </ul>
       </li>
    </ul>
  </div>
  <!--여기까지 메뉴바 부분-->
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
