<?php include "../db/dbConn.php";
$id = $_SESSION['userid'];
?>
<!doctype html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="/css/read.css" />
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
  <link rel="stylesheet" type="text/css" href="/css/logo.css" />
  <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery-ui.js"></script>
  <script type="text/javascript" src="/js/common.js"></script>
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
  <!--메뉴바 부분 끝-->
  <?php //게시글 클릭 시 조회수 + 1 증가, DB 저장, 글 불러오기 DB 작업, 비밀글 접근 권한
    $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
    $sql = mq("SELECT * FROM noticeBoard WHERE idx = '$bno';");
    $array = mysqli_fetch_array($sql);
    $hit = $array['hit'] + 1;

    $bsql = mq("SELECT * FROM noticeBoard WHERE idx = '$bno';");
    $barray = mysqli_fetch_array($bsql);
  ?>
  <!-- 글 불러오기 -->
  <div class = "boardR">
    <h2><?php echo $barray['title']; ?></h2>
    <div class="userInfo">
      <?php echo $barray['name']; ?>
      <?php echo $barray['date']; ?>
      조회 : <?php echo $barray['hit']; ?>
    </div>
    <div class="boardL"></div>
    <?php if($barray['file'] != NULL){ ?>
    <div>
      파일 : <a href="/file/<?php echo $barray['file'];?>" download><?php echo $barray['file']; ?></a>
    </div>
    <?php } ?>
    <div class="boardC">
      <?php echo nl2br($barray['content']); ?>
    </div>
    <div class="boardL"></div>
    <!-- 목록, 수정, 삭제 -->
    <div class="board3">
      <ul>
        <li><a href="/board/noticeBoard.php">[목록으로]</a></li>
        <li><a href="/board/noticeModify.php?idx=<?php echo $barray['idx']; ?>">[수정]</a></li>
        <li><a href="/board/noticeDelete.php?idx=<?php echo $barray['idx']; ?>">[삭제]</a></li>
      </ul>
    </div>
    <!-- 목록, 수정, 삭제 끝 -->
  </div>
  <!-- 글 불러오기 끝-->
  <?php if(isset($id)){?>
  <!-- 댓글 입력 창 -->
  <div class="replyF">
    <form method="post" class="reply_form" action="/reply/replyOk.php">
      <input type="hidden" name="bno" value="<?php echo $bno; ?>">
      <div style="margin-top:10px;">
        <textarea name="content" class="replyC" required></textarea>
        <button type="submit" class="replyB">등록하기</button>
      </div>
    </form>
  </div>
  <!-- 댓글 입력 창 끝-->
  <?php } ?>
  <?php //댓글 불러오기 DB 작업
    $rsql = mq("SELECT * FROM reply WHERE con_num = '$bno' ORDER BY idx desc;");
    while ($reply = mysqli_fetch_array($rsql)) {
  ?>
  <!-- 댓글 불러오기 -->
  <div class="reList">
    <div><b><?php echo $reply['name']; ?></b></div>
    <div class="reDate"><?php echo $reply['date']; ?></div>
    <div class="reCont"><?php echo nl2br($reply['content']); ?></div>
    <?php
      $replyUserId = $reply['id'];
      if ($id == $replyUserId) {
    ?>
    <!-- 댓글 삭제 -->
    <form class="reDelB" method="post" action="/reply/replyDelete.php">
      <input type="hidden" name="bno" value="<?php echo $bno; ?>">
      <input type="hidden" name="content" value="<?php echo $reply['content']; ?>">
      <input type="hidden" name="date" value="<?php echo $reply['date']; ?>">
      <button type="submit">삭제</button>
    </form>
    <!-- 댓글 삭제 끝-->
    <?php } ?>
  </div>
  <!-- 댓글 불러오기 끝-->
  <?php } ?>
</body>
</html>
