<?php
include  "dbConn.php";
session_start(); ?>

<!doctype html>

<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
  <link rel="stylesheet" type="text/css" href="/css/board.css" />
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
          <li><a href="#">Apps</a></li>
          <li><a href="#">Extensions</a></li>
        </ul>
      </li>
      <li><a href="#">Company</a></li>
      <li><a href="#">Address</a></li>
    </ul>
  </div>
  <!--여기까지 메뉴바 부분-->
  <div id="board_area">
    <h1>공지사항</h1>
    <h4>공지사항 게시판입니다.</h4>
    <table class="list-table">
      <thead>
        <tr>
          <th width="70">번호</th>
          <th width="500">제목</th>
          <th width="120">글쓴이</th>
          <th width="100">작성일</th>
          <th width="100">조회수</th>
        </tr>
      </thead>
      <?php
         // board테이블에있는 idx를 기준으로 내림차순해서 5개까지 표시
          $sql = "SELECT * FROM noticeBoard ORDER BY idx desc limit 5";
          $query = mysqli_query($dbConn, $sql);

          while ($board = mysqli_fetch_array($query)) {
              $title = $board["title"]; // $title에 $board에서 불러온 title 저장

              if (strlen($title)>30) {
                  //title이 30을 넘어서면 ...표시
                  $title = str_replace($board["title"], mb_substr($board["title"], 0, 30, "utf-8")."...", $board["title"]);
              } ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><a href="noticeRead.php"><?php echo $title; ?></a></td>
          <td width="120"><?php echo $board['name']; ?></td>
          <td width="100"><?php echo $board['date']; ?> </td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php
          } ?>
    </table>
    <div id="write_btn">
      <a href="noticeWrite.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>

</html>
