<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <title>자동가입방지문구</title>
  <script type="text/javascript">
    /* 문자 새로고침 */
    function refresh_captcha() {
      document.getElementById("capt_img").src = "captcha.php?waste=" + Math.random();
      //capt_img id를 불러와 문구들을 랜덤으로 돌린다
    }
  </script>
  <style>
    .logo{
      text-align: center;
      list-style: none;
      font-size: 80px;
      font-weight: bold;
    }
    .logo a{
      color: #D1B6E1;
      text-decoration: none;
    }
    img{
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <li class="logo"><a href='main.php'>PCUSC</a></li>
  <form method="post" action="captchaOk.php">
    <img src="captcha.php" alt="captcha" title="captcha" id="capt_img" />
    <input type="text" name="captcha" />
    <input type="submit" vlaue="확인" />
  </form>
  <button onclick="refresh_captcha();">새로고침</button>
</body>

</html>
