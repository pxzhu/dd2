<!--- 게시글 수정 -->
<?php
  include "dbConn.php";
  session_start();

  $bno = $_GET['idx'];
  $sql = "SELECT * FROM noticeBoard WHERE idx = '$bno';";
  $query = mysqli_query($dbConn, $sql);
  $board = mysqli_fetch_array($query);
?>
<!doctype html>
<!-- 등급 미달시 접근 금지-->
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" href="/css/read.css" />
</head>

<body>
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
</body>

</html>
