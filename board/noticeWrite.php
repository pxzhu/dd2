<?php include "dbConn.php";
$id = $_SESSION['userid'];
?>
<!doctype html>

<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="/css/write.css" />
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
</head>

<body>
  <?php
  if(isset($id)){ ?>
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
  <!--메뉴바 부분 끝-->
  <div id="board_write">
    <h1><a href="noticeBoard.php">공지사항</a></h1>
    <!-- 등급 미달시 접근 금지-->
    <h4>글을 작성하는 공간입니다.</h4>
    <div id="write_area">
      <form action="noticeOk.php" method="post" enctype="multipart/form-data">
        <div id="in_title">
          <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
        </div>
        <div class="wi_line"></div>
        <div id="in_content">
          <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
        </div>
        <div id="in_file">
          <input type="file" value="1" name="file" />
        </div>
        <div class="bt_se">
          <button type="submit">글 작성</button>
        </div>
      </form>
    </div>
  </div>
</body>
<?php } else{ ?>
  <script type="text/javascript">
    alert("글쓰기 권한이 없습니다.");
    history.back();
  </script>
<?php } ?>


</html>
