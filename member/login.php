<?php include "dbConn.php"; ?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <title>회원가입 및 로그인 사이트</title>
  <link rel="stylesheet" type="text/css" href="/css/signUp.css" />
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
  <div id="login_box" class="hc wc">
    <center>
      <h2>로그인</h2>
    </center>
    <form action="loginCheck.php" method="post">
      <table align="center" border="0" cellspacing="0" width="300">
        <tr>
          <td width="130" colspan="1">
            <input type="text" name="userid" class="inph">
          </td>
          <td rowspan="2" align="center" width="100">
            <button type="submit" id= "btn">로그인</button>
          </td>
        </tr>
        <tr>
          <td width="130" colspan="1">
            <input type="password" name="userpw" class="inph">
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center" class="mem">
            <a href="captchaCheck.php">회원가입 &nbsp; / &nbsp; </a>
            <a href="memberFind.php">&nbsp;찾기</a>
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>
