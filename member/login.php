<?php include "dbConn.php"; ?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <title>회원가입 및 로그인 사이트</title>
  <link rel="stylesheet" type="text/css" href="/css/signUp.css" />
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
</head>

<body>
  <li class="logo"><a href='main.php'>PCUSC</a></li>
    <form id="login_box" action="loginCheck.php" method="post">
      <table>
        <tr>
          <td>
            <input type="text" size=30 name="userid" class="inph" placeholder="아이디">
          </td>
        </tr>
        <tr>
          <td>
            <input type="password" size=30 name="userpw" class="inph" placeholder="패스워드">
          </td>
        </tr>
        <tr>
          <td>
            <button type="submit" class= "btn">로그인</button>
          </td>
        </tr>
      </table>
    </form>
    <nav class="find">
      <a href="captchaCheck.php">회원가입 |</a>
      <a href="memberFind.php">찾기</a>
    </nav>
</body>

</html>
