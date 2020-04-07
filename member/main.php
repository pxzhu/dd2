<?php
include "dbConn.php";

session_start();
?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <title>메인페이지</title>
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
</head>

<body>
  <!--메뉴바 부분-->
  <div class = "menubar">
     <ul>
        <li><a href="main.php">홈으로</a></li>
        <li><a href="#" id="current">게시판</a>
           <ul>
             <li><a href="noticeBoard.php">공지사항</a></li>
             <li><a href="#">질문게시판</a></li>
             <li><a href="#">Apps</a></li>
             <li><a href="#">Extensions</a></li>
           </ul>
        </li>
        <li><a href="#">Company</a></li>
        <li><a href="#">Address</a></li>
     </ul>
  </div>
  <!--여기까지 메뉴바 부분-->

<?php
if (isset($_SESSION['userid'])) {
    echo "<h2>{$_SESSION['username']}({$_SESSION['userid']})님 환영합니다.</h2>"; ?>
  <a href="logout.php"><input id="button" type="button" value="로그아웃" /></a>
  <a href="mypage.php"><input id="button" type="button" value="내 정보 변경" /></a>
<?php
} else {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    } ?>
</body>
