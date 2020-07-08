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
  <link rel="stylesheet" type="text/css" href="/css/logo.css" />
  <style>
    .btn input{
      margin-top: 5px;
      width: 80px;
      background: #D1B6E1;
      border: solid 0px;
      color: #FFFFFF;
      font-size: 15px;
      font-weight: bold;
      padding: 10px;
    }
    .btn input:hover{
      background: #519D9E;
      border: 0px;
      color: #000000;
      text-decoration: none;
    }
    .resize{
      resize:both;
      max-width: 20px;
      height: auto;
    }
    .test{
      width: 107px;
      margin: 0 auto;
    }
    .test input[type="text"]{
      text-align: center;
      border-right:none;
      border-left:none;
      border-top:none;
      border-bottom:none;
    }

  </style>
</head>

<body>
  <li class="logo"><a href='/member/main.php'>PCUSC</a></li>
  <form class="test" method="post" action="captchaOk.php">
    <img src="/captcha/captcha.php" alt="captcha" title="captcha" id="capt_img" />
    <img class="resize" src = /img/refresh.png onclick="refresh_captcha()"/>
    <input type="text" name="captcha" size=7 placeholder="입력"/>
    <div class="btn">
      <input type="submit" vlaue="확인" />
    </div>
  </form>
</body>

</html>
