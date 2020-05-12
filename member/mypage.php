<?php include "dbConn.php";
if (isset($_SESSION['userid'])) {
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>내 정보</title>
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
  <link rel="stylesheet" type="text/css" href="/css/logo.css" />
  <style>
    .find {
      margin: 0 auto;
      width: 450px;
      margin-top: 3%;
    }
    .btn {
      margin: 0 auto;
      margin-top: 10px;
      width: 480px;
      background: #D1B6E1;
      border: solid 0px;
      color: #FFFFFF;
      font-size: 20px;
      font-weight: bold;
      padding: 10px;
    }
    .mypage{
      color: #519D9E;
      font-weight: bold;
    }
  </style>
  <script type="text/javascript" src="/js/checkPw.js"></script>
  <script type="text/javascript" src="/js/jquery-3.5.0.min.js"></script>
</head>

<body>
  <li class="logo"><a href='main.php'>PCUSC</a></li>
  <div class="find">
    <form onsubmit="return checkAll()" name="form" method="post" action="memberUpdate.php">
<?php
    $sql = mq("SELECT * FROM users WHERE id='{$_SESSION['userid']}';");
    while ($member = mysqli_fetch_array($sql)) { ?>
      <fieldset>
        <legend class="mypage">MY PAGE</legend>
        <table class="find">
          <tr>
            <td>학번</td>
            <td><input type="text" size="35" name="code" placeholder="학번" value="<?php echo $member['code']; ?>" disabled></td>
          </tr>
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
            <td>전화번호</td>
            <td><input type="text" size="35" name="phone" placeholder="'-'를 제외하고 입력해주십시오." value="<?php echo $member['phoneN']; ?>" required></td>
          </tr>
          <tr>
            <td>이메일</td>
            <td><input type="text" size="35" name="email" placeholder="이메일" value="<?php echo $member['email']; ?>" disabled></td>
          </tr>
        </table>
      </fieldset>
      <input class="btn" type="submit" value="정보변경" />
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
