<?php include  "dbConn.php";
$id = $_SESSION['userid'];
?>
<!doctype html>

<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="/css/menubar.css" />
  <link rel="stylesheet" type="text/css" href="/css/board.css" />
  <link rel="stylesheet" type="text/css" href="/css/logo.css" />
</head>

<body>
  <li class="logo"><a href='main.php'>PCUSC</a></li>
  <!--메뉴바 부분-->
  <div class="menubar">
    <ul>
       <li><a href="#" id="current">게시판</a>
          <ul>
            <li><a href="noticeBoard.php">공지사항</a></li>
            <li><a href="QNABoard.php">질문게시판</a></li>
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
  <div id="board_area">
    <!--검색 추가-->
    <?php
    $category = $_GET['category'];
    $search = $_GET['search'];
    if($category=="title"){
      $category="제목";
    }else if($category=="content"){
      $category="내용";
    }else if($category=="name"){
      $category="글쓴이";
    }
    ?>
      <h2><?php echo $category; ?> '<?php echo $search; ?>' 검색결과</h2>
      <?php
      if($category=="제목"){
        $category="title";
      }else if($category=="내용"){
        $category="content";
      }else if($category=="글쓴이"){
        $category="name";
      }
       ?>
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
      $searchch = "'%$search%'";
      $sql = mq("SELECT * FROM QNABoard WHERE $category like $searchch ORDER BY idx desc;");
       // board테이블에있는 idx를 기준으로 내림차순해서 5개까지 표시
      while ($board=mysqli_fetch_array($sql)) {
        $title=$board["title"];
        if (strlen($title)>30) {
          $title=str_replace($board["title"], mb_substr($board["title"], 0, 30, "utf-8")."...", $board["title"]);
        }
        $rcidx = $board['idx'];
        $rcsql = mq("SELECT * FROM reply WHERE con_num='$rcidx';");
        $rcrow = mysqli_num_rows($rcsql);
       ?>

      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500">
            <?php
            $boardtime = $board['date'];
            $timeformat = date("Y-m-d ", strtotime($boardtime));
            $timenow = date("Y-m-d ");
            if($timenow == $timeformat){
              $img = "<img src = '/img/new.png' alt = 'new' title = 'new' />";
            }else{
              $img = "";
            }
            ?>
            <a href='QNARead.php?idx=<?php echo $board["idx"]; ?>'><span style="background:#FAFA96;"><?php echo $title; ?></span><span id="rcst">[<?php echo $rcrow; ?>]</span> <?php echo $img; ?></a></td>
            <td width="120"><?php echo $board['name']; ?></td>
            <td width="100"><?php echo $board['date']; ?> </td>
            <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>

      <?php } ?>
    </table>
    <?php if(isset($id)){?>
    <div class="btn">
      <a href="QNAWrite.php"><button>글쓰기</button></a>
    </div>
    <?php } ?>
    <br />
    <!-- 검색 기능 -->
    <div class="search">
      <form action="QNASearch.php" method="get">
        <select name="category">
          <option value="title">제목</option>
          <option value="name">글쓴이</option>
          <option value="content">내용</option>
        </select>
        <input type="text" name="search" size="40" required />
        <button>검색</button>
      </form>
    </div>
  </div>
</body>

</html>
