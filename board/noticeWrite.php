<!doctype html>

<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="/css/write.css" />
</head>

<body>
  <div id="board_write">
    <h1><a href="noticeBoard.php">공지사항</a></h1>
    <!-- 등급 미달시 접근 금지-->
    <h4>글을 작성하는 공간입니다.</h4>
    <div id="write_area">
      <form action="noticeOk.php" method="post">
        <div id="in_title">
          <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
        </div>
        <div class="wi_line"></div>
        <div id="in_content">
          <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
        </div>
        <div class="bt_se">
          <button type="submit">글 작성</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
