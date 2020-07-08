<?php include "/db/dbConn.php"; ?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <title>메인페이지</title>
  <script type="text/javascript" src="/js/slide.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
  <link rel="stylesheet" type="text/css" href="/css/user.css" />
  <link rel="stylesheet" type="text/css" href="/css/slide.css" />
  <link rel="stylesheet" type="text/css" href="/css/logo.css" />
  <link rel="stylesheet" type="text/css" href="/css/facebook.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
  <link rel="stylesheet" type="text/css" href="/css/swiper.css" />
</head>

<body>
  <!-- 로고 -->
  <li class="logo"><a href='/member/main.php'>PCUSC</a></li>

  <!-- 메뉴바 -->
  <div class = "menubar">
     <ul>
        <li><a href="#" id="current">게시판</a>
           <ul>
             <li><a href="/board/noticeBoard.php">공지사항</a></li>
             <li><a href="/board/QNABoard.php">질문게시판</a></li>
             <li><a href="/board/SJBoard.php">선후배게시판</a></li>
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
        <a href="/captcha/captchaCheck.php">회원가입 |</a>
        <a href="/member/login.php"> 로그인하기</a>
      <?php } ?>
    </div>
  </div>
  <!-- 유저 정보 끝 -->

  <!-- 활동 사진 슬라이드 -->
  <div class="slide">
    <ul>
      <li><a href='#'><img src="/img/활동1.png"></a></li>
      <li><a href='#'><img src="/img/활동2.png"></a></li>
      <li><a href='#'><img src="/img/활동3.png"></a></li>
      <li><a href='#'><img src="/img/활동4.png"></a></li>
    </ul>
  </div>
  <!-- 활동 사진 슬라이드 끝 -->

  <!-- 교수님 사진 스와이퍼
    Swiper를 사용하기 위한 최소 기본 형태
    클래스명은 변경하면 안 됨 -->
  <div class="swiper-container">
	   <div class="swiper-wrapper">
		     <div class="swiper-slide"><img src="/img/professor/01조인준 교수님.png"></div>
         <div class="swiper-slide"><img src="/img/professor/02이병엽 교수님.png"></div>
         <div class="swiper-slide"><img src="/img/professor/03함형민 교수님.png"></div>
         <div class="swiper-slide"><img src="/img/professor/04곽내정 교수님.png"></div>
         <div class="swiper-slide"><img src="/img/professor/05서상훈 교수님.png"></div>
         <div class="swiper-slide"><img src="/img/professor/06신영진 교수님.png"></div>
         <div class="swiper-slide"><img src="/img/professor/07김은중 교수님.png"></div>
         <div class="swiper-slide"><img src="/img/professor/08강무영 교수님.png"></div>
     </div>
     <!-- 네비게이션 지정 -->
	    <div class="swiper-button-next"></div><!-- 다음 버튼 (오른쪽에 있는 버튼) -->
	    <div class="swiper-button-prev"></div><!-- 이전 버튼 -->
  </div>

  <!-- 좌우 버튼 스크립트 -->
  <script>
    new Swiper('.swiper-container', {
      navigation : {
        nextEl : '.swiper-button-next', // 다음 버튼 클래스명
        prevEl : '.swiper-button-prev', // 이번 버튼 클래스명
      },
    });
  </script>
  <!-- 좌우 버튼 스크립트 끝 -->

  <!-- 교수님 사진 스와이퍼 끝 -->

  <!-- 페이스북 링크 -->
  <div class="facebook">
    <a href='https://www.facebook.com/%EB%B0%B0%EC%9E%AC%EB%8C%80%ED%95%99%EA%B5%90-%EC%82%AC%EC%9D%B4%EB%B2%84%EB%B3%B4%EC%95%88%ED%95%99%EA%B3%BC-366863963663450/'>FACEBOOK</a>
  </div>
  <!-- 페이스북 링크 끝 -->



</body>
