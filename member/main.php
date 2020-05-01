<?php include "dbConn.php"; ?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <title>메인페이지</title>
  <script type="text/javascript" src="/js/slide.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
  <link rel="stylesheet" type="text/css" href="/css/user.css" />
  <link rel="stylesheet" type="text/css" href="/css/slide.css" />
  <link rel="stylesheet" type="text/css" href="/css/logo.css" />
</head>

<body>
  <!-- 로고 -->
  <li class="logo"><a href='main.php'>PCUSC</a></li>
  
  <!-- 메뉴바 -->
  <div class = "menubar">
     <ul>
        <li><a href="#" id="current">게시판</a>
           <ul>
             <li><a href="noticeBoard.php">공지사항</a></li>
             <li><a href="QNABoard.php">질문게시판</a></li>
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
  <!-- 메뉴바 끝 -->

  <!-- 유저 정보 -->
  <div class="userF">
    <div class="user">
      <?php
      if (isset($_SESSION['userid'])) {
        echo "<h3>{$_SESSION['username']}({$_SESSION['userid']})님 환영합니다.</h3>"; ?>
        <a href="logout.php"><input id="button" type="button" value="로그아웃" /></a>
        <a href="mypage.php"><input id="button" type="button" value="내 정보" /></a>
        <?php
      } else { ?>
        <a href="captchaCheck.php">회원가입 |</a>
        <a href="login.php"> 로그인하기</a>
      <?php } ?>
    </div>
  </div>
  <!-- 유저 정보 끝 -->

  <!-- 슬라이드 -->
  <div class="slide">
    <ul>
      <li><a href='#'><img src="/img/활동1.png"></a></li>
      <li><a href='#'><img src="/img/활동2.png"></a></li>
      <li><a href='#'><img src="/img/활동3.png"></a></li>
      <li><a href='#'><img src="/img/활동4.png"></a></li>
    </ul>
  </div>
  <!-- 슬라이드 끝 -->
</body>
