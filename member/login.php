<?php include "dbConn.php"; ?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <title>회원가입 및 로그인 사이트</title>
  <link rel="stylesheet" type="text/css" href="/css/signUp.css" />
</head>

<body>
  <div id="login_box">
    <h1>로그인</h1>
    <form action="loginCheck.php" method="post">
      <table align="center" border="0" cellspacing="0" width="300">
        <tr>
          <td width="130" colspan="1">
            <input type="text" name="userid" class="inph">
          </td>
          <td rowspan="2" align="center" width="100">
            <button type="submit" id="btn">로그인</button>
          </td>
        </tr>
        <tr>
          <td width="130" colspan="1">
            <input type="password" name="userpw" class="inph">
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center" class="mem">
            <a href="captchaCheck.php">회원가입 하시겠습니까?</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" class="mem">
            <a href="memberFind.php">계정 찾기</a>
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>
