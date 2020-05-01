<?php include "dbConn.php";

if (isset($_SESSION['userid'])) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
} else {
?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <title>회원가입 폼</title>
  <link rel="stylesheet" type="text/css" href="/css/logo.css" />
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
  <div class="find">
    <li class="logo"><a href='main.php'>PCUSC</a></li>
    <form method="post" action="memberFindId.php">
      <fieldset>
        <legend>아이디 찾기</legend>
        <table>
          <tr>
            <td>이름</td>
            <td><input type="text" size="35" name="name" placeholder="이름" required></td>
          </tr>
          <tr>
            <td>학번</td>
            <td><input type="text" size="35" name="code" placeholder="학번이 없다면 9999를 입력해주세요." required></td>
          </tr>
          <tr>
            <td>핸드폰번호</td>
            <td><input type="text" size="35" name="phone" placeholder="'-'를 제외하고 입력해주세요." required></td>
          </tr>
          <tr>
            <td>이메일</td>
            <td><input type="text" name="email" required>@
              <select name="emadress">
                <option value="pcu.ac.kr">pcu.ac.kr</option>
                <option value="naver.com">naver.com</option>
                <option value="nate.com">nate.com</option>
                <option value="hanmail.com">hanmail.com</option>
                <option value="google.com">google.com</option>
              </select>
            </td>
          </tr>
        </table>
        <input type="submit" value="아이디 찾기" />
      </fieldset>
    </form>
  </div>
  <div class="find">
    <form method="post" action="memberFindPw.php">
      <fieldset>
        <legend>비밀번호 찾기</legend>
        <table>
          <tr>
            <td>아이디</td>
            <td><input type="text" size="35" name="id" placeholder="아이디" required></td>
          </tr>
          <tr>
            <td>이름</td>
            <td><input type="text" size="35" name="name" placeholder="이름" required></td>
          </tr>
          <tr>
            <td>학번</td>
            <td><input type="text" size="35" name="code" placeholder="학번이 없다면 9999를 입력해주세요." required></td>
          </tr>
          <tr>
            <td>핸드폰번호</td>
            <td><input type="text" size="35" name="phone" placeholder="'-'를 제외하고 입력해주세요." required></td>
          </tr>
          <tr>
            <td>이메일</td>
            <td><input type="text" name="email" required>@
              <select name="emadress">
                <option value="pcu.ac.kr">pcu.ac.kr</option>
                <option value="naver.com">naver.com</option>
                <option value="nate.com">nate.com</option>
                <option value="hanmail.com">hanmail.com</option>
                <option value="google.com">google.com</option>
              </select>
            </td>
          </tr>
        </table>
        <input type="submit" value="비밀번호 찾기" />
      </fieldset>
    </form>
  </div>
</body>

</html>
<?php } ?>
