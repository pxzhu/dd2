<!--- 게시글 수정 -->
<?php
  include "dbConn.php";
  session_start();

  $bno = $_GET['idx'];
  $id = $_SESSION['userid'];
  $sql1 = "SELECT * FROM noticeBoard WHERE idx = '$bno';";
  $query1 = mysqli_query($dbConn, $sql1);
  $row = mysqli_fetch_array($query1);

  if($id == $row["id"]){
    $sql = "SELECT * FROM noticeBoard WHERE idx = '$bno';";
    $query = mysqli_query($dbConn, $sql);
    $board = mysqli_fetch_array($query);
?>
<!doctype html>
<!-- 등급 미달시 접근 금지-->
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="/css/write.css" />
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
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
  <div id="board_write">
    <h1><a href="/noticeBoard.php">자유게시판</a></h1>
    <h4>글을 수정합니다.</h4>
    <div id="write_area">
      <form action="noticeModifyOk.php/<?php echo $board['idx']; ?>" method="post">
        <input type="hidden" name="idx" value="<?=$bno?>" />
        <div id="in_title">
          <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
        </div>
        <div class="wi_line"></div>
        <div id="in_content">
          <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
        </div>
        <div class="bt_se">
          <button type="submit">수정하기</button>
        </div>
      </form>
      <div class="bt_se">
        <button onclick="history.back();">취소</button>
      </div>
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
