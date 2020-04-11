<?php
    include "dbConn.php";
        session_start();
        $id = $_SESSION['userid'];
?>
<!doctype html>

<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="/css/read.css" />
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
  <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery-ui.js"></script>

  <script type="text/javascript">
    /*$(function() {
      $("#dialog").dialog({
        autoOpen: false,
        modal: true,
        width: 650,
        height: 200,
        title: "댓글 수정",
      });
      $("#dialogBtn").on("click", function() {
        $("#dialog").dialog("open");
      });
    });*/
    $(document).ready(function(){
      $("#dialogBtn").click(function(){
        var obj = $(this).closest(".dap_lo").find("#dialogSc");
        obj.dialog({
          modal:true,
          width:650,
          hieght:200,
          title:"댓글 수정"
        });
      });
    });

  </script>
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
  <?php
    $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
        $query = "SELECT * FROM noticeBoard WHERE idx = '$bno'";
        $row = mysqli_query($dbConn, $query);
        $array = mysqli_fetch_array($row);
        $hit = $array['hit'] + 1;

        $uquery = "UPDATE noticeBoard SET hit = '$hit' WHERE idx = '$bno'";
        $urow = mysqli_query($dbConn, $uquery);

        $bquery = "SELECT * FROM noticeBoard WHERE idx = '$bno'";
        $brow = mysqli_query($dbConn, $bquery);
        $barray = mysqli_fetch_array($brow);
  ?>
  <!-- 글 불러오기 -->
  <div id="board_read">
    <h2><?php echo $barray['title']; ?></h2>
    <div id="user_info">
      <?php echo $barray['name']; ?> <?php echo $barray['date']; ?> 조회:<?php echo $barray['hit']; ?>
      <div id="bo_line"></div>
    </div>
    <div>
      파일 : <a href="/file/<?php echo $barray['file'];?>" download><?php echo $barray['file']; ?></a>
    </div>
    <div id="bo_content">
      <?php echo nl2br($barray['content']); ?>
    </div>
    <!-- 목록, 수정, 삭제 -->
    <div id="bo_ser">
      <ul>
        <li><a href="noticeBoard.php">[목록으로]</a></li>
        <li><a href="noticeModify.php?idx=<?php echo $barray['idx']; ?>">[수정]</a></li>
        <li><a href="noticeDelete.php?idx=<?php echo $barray['idx']; ?>">[삭제]</a></li>
      </ul>
    </div>
  </div>
  <?php if(isset($id)){?>
  <!-- 댓글 입력 창 -->
  <div class="dap_ins">
    <form method="post" class="reply_form" action="replyOk.php">
      <input type="hidden" name="bno" value="<?php echo $bno; ?>">
      <div style="margin-top:10px;">
        <textarea name="content" class="reply_content" id="re_content" required></textarea>
        <button type="submit" id="rep_bt" class="re_bt">댓글</button>
      </div>
    </form>
  </div>
<?php } ?>
  <!-- 댓글 불러오기 -->
  <?php
  $rsql = "SELECT * FROM reply WHERE con_num = '$bno' ORDER BY idx desc";
  $rquery = mysqli_query($dbConn, $rsql);
    while ($reply = mysqli_fetch_array($rquery)) {
        ?>
  <div class="dap_lo">
    <div><b><?php echo $reply['name']; ?></b></div>
    <div class="dap_to"><?php echo nl2br($reply['content']); ?></div>
    <div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
    <?php
        $replyUserId = $reply['id'];
        if ($id == $replyUserId) {
            ?>
    <input type="button" id=dialogBtn value="수정">
    <!-- 댓글 삭제 -->
    <form method="post" action="replyDelete.php">
      <input type="hidden" name="bno" value="<?php echo $bno; ?>">
      <input type="hidden" name="content" value="<?php echo $reply['content']; ?>">
      <input type="hidden" name="date" value="<?php echo $reply['date']; ?>">
      <button type="submit">삭제</button>
    </form>

    <?php
        } ?>
    <!-- 댓글 수정 폼 dialog -->
    <div id="dialogSc">
      <form method="post" action="replyModifyOk.php">
        <input type="hidden" name="idx" value="<?php echo $reply['idx']; ?>" />
        <input type="hidden" name="bno" value="<?php echo $bno; ?>">
        <textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
        <input type="submit" value="수정하기" class="re_mo_bt">
      </form>
    </div>
  </div>
  <?php
    } ?>

</body>

</html>
