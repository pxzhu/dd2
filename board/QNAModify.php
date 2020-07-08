<?php include "../db/dbConn.php";

  $bno = $_GET['idx'];
  $id = $_SESSION['userid'];
  $sql1 = mq("SELECT * FROM QNABoard WHERE idx = '$bno';");
  $row = mysqli_fetch_array($sql1);

  if($id == $row["id"]){
    $sql = mq("SELECT * FROM QNABoard WHERE idx = '$bno';");
    $board = mysqli_fetch_array($sql);
?>
<!doctype html>
<!-- 등급 미달시 접근 금지-->
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="/css/write.css" />
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
  <link rel="stylesheet" type="text/css" href="/css/logo.css" />
</head>

<body>
  <li class="logo"><a href='/member/main.php'>PCUSC</a></li>
  <!--메뉴바 부분-->
  <div class="menubar">
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
  <!--여기까지 메뉴바 부분-->
  <div class="boardW">
    <div class="writeA">
      <form action="/board/QNAModifyOk.php/<?php echo $board['idx']; ?>" method="post">
        <input type="hidden" name="idx" value="<?=$bno?>" />
        <div class="wirteT">
          <textarea name="title" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
        </div>
        <div class="writeC">
          <textarea name="content" placeholder="내용" required><?php echo $board['content']; ?></textarea>
        </div>
        <input type="file" value="1" name="file" />
        <div class="btn">
          <button type="submit">수정하기</button>
          <input type="button" onclick="history.back();" value="취소"/>
        </div>
      </form>
    </div>
  </div>
<?php
  }else{  ?>
    <script type="text/javascript">
      alert("수정 권한이 없습니다.");
      history.back();
    </script>
  <?php } ?>
</body>

</html>
