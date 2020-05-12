<?php include "dbConn.php";

if (isset($_SESSION['userid'])) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
} else {
?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <title>비밀번호 변경</title>
  <style>
    * {
      margin: 0 auto;
    }
    .find {
      text-align: center;
      width: 300px;
      margin-top: 30px;
    }
    .pass{
      border-right:none;
      border-left:none;
      border-top:none;
      border-bottom:none;
    }
    .test{
        border: solid 2px #D1B6E1;
    }
    .btn {
      margin-top: 10px;
      width: 300px;
      background: #D1B6E1;
      border: solid 0px;
      color: #FFFFFF;
      font-size: 20px;
      font-weight: bold;
      padding: 10px;
    }
  </style>
  <script type="text/javascript" src="/js/checkPw.js"></script>
  <script type="text/javascript" src="/js/jquery-3.5.0.min.js"></script>
</head>

<body>
  <form onsubmit="return upCheckAll()"  name="form" class="find" method="post" action="memberPwUpdateOk.php">
    <fieldset class="test">
      <table>
        <tr>
          <td><input class="pass" type="password" size="30" name="userpw" placeholder="변경 비밀번호"></td>
        </tr>
      </table>
    </fieldset>
    <input class="btn" type="submit" value="변경하기"/>
  </form>
</body>

</html>
<?php
} ?>
