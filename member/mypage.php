<?php include "dbConn.php";
if (isset($_SESSION['userid'])) {
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>내 정보</title>
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
  <style>
    * {
      margin: 0 auto;
    }
    a {
      color: #333;
      text-decoration: none;
    }
    .find {
      text-align: center;
      width: 500px;
      margin-top: 30px;
    }
  </style>
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
  <div class="find">
    <form method="post" action="memberUpdate.php">
<?php
    $sql = mq("SELECT * FROM users WHERE id='{$_SESSION['userid']}';");
    while ($member = mysqli_fetch_array($sql)) { ?>
      <h1>내 정보</h1>
      <p><a href="main.php">홈으로</a></p>
      <fieldset>
        <legend>마이페이지</legend>
        <table>
          <tr>
            <td>이름</td>
            <td><input type="text" size="35" name="name" placeholder="이름" value="<?php echo $member['name']; ?>" disabled></td>
          </tr>
          <tr>
            <td>아이디</td>
            <td><input type="text" size="35" name="userid" value="<?php echo $_SESSION['userid']; ?>" disabled></td>
          </tr>
          <tr>
            <td>비밀번호</td>
            <td><input type="password" size="35" name="userpw" placeholder="비밀번호" required></td>
          </tr>
          <tr>
            <td>비밀번호 확인</td>
            <td><input type="password" size="35" name="userpwc" placeholder="비밀번호 확인" required></td>
          </tr>
          <tr>
            <td>학번</td>
            <td><input type="text" size="35" name="code" placeholder="학번" value="<?php echo $member['code']; ?>" disabled></td>
          </tr>
          <tr>
            <td>이메일</td>
            <td><input type="text" size="35" name="email" placeholder="이메일" value="<?php echo $member['email']; ?>" disabled></td>
          </tr>
          <tr>
            <td>핸드폰 번호</td>
            <td><input type="text" size="35" name="phone" placeholder="'-'를 제외하고 입력해주십시오." value="<?php echo $member['phoneN']; ?>" required></td>
          </tr>
        </table>
        <input type="submit" value="정보변경" />
        <button onclick="history.back();">취소</button>
      </fieldset>
      <?php } ?>
    </form>
  </div>
</body>

</html>
<?php
} else {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    }
?>
