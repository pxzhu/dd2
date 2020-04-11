<?php
include  "dbConn.php";
session_start();
$id = $_SESSION['userid'];
?>

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
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $psql = "SELECT * FROM noticeBoard";
        $pquery = mysqli_query($dbConn, $psql);
        $row_num = mysqli_num_rows($pquery); //게시판 총 레코드 수
        $list = 5; //한 페이지에 보여줄 개수
        $block_pg = 5; //블록당 보여줄 페이지 개수

        $block_num = ceil($page/$block_pg); // 현재 페이지 블록 구하기
        $block_start = (($block_num -1) * $block_pg) + 1; // 블록의 시작번호
        $block_end = $block_start + $block_pg - 1; //블록 마지막 번호

        $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
        if ($block_end > $total_page) {
            $block_end = $total_page;
        } //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
        $total_block = ceil($total_page/$block_pg); //블럭 총 개수
        $start_num = ($page - 1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

        $sql = "SELECT * FROM noticeBoard ORDER BY idx desc limit $start_num, $list";
         // board테이블에있는 idx를 기준으로 내림차순해서 5개까지 표시
        $query = mysqli_query($dbConn, $sql);
        while ($board = mysqli_fetch_array($query)) {
            $title = $board["title"]; // $title에 $board에서 불러온 title 저장

            if (strlen($title)>30) {
                //title이 30을 넘어서면 ...표시
                $title = str_replace($board["title"], mb_substr($board["title"], 0, 30, "utf-8")."...", $board["title"]);
            }
            $rcidx = $board['idx'];
            $rcsql = "SELECT * FROM reply WHERE con_num='$rcidx';";
            $rcquery = mysqli_query($dbConn, $rcsql);
            $rcrow = mysqli_num_rows($rcquery);

            ?>
      <tbody>
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
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><a href="/noticeRead.php?idx=<?php echo $board['idx']; ?>"><?php echo $title; ?><span id="rcst">[<?php echo $rcrow; ?>]</span> <?php echo $img; ?></a></td>
          <td width="120"><?php echo $board['name']; ?></td>
          <td width="100"><?php echo $board['date']; ?> </td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php
        } ?>
    </table>
    <div id="page_num">
      <ul>
        <?php
          if ($page <= 1) { //만약 page가 1보다 크거나 같다면
            echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시
          } else {
              echo "<li><a href='?page=1'>처음</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
          }
          if ($page <= 1) { //만약 page가 1보다 크거나 같다면 빈값
          } else {
              $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
            echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
          }
          for ($i=$block_start; $i<=$block_end; $i++) {
              //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
            if ($page == $i) { //만약 page가 $i와 같다면
              echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
            } else {
                echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
            }
          }
          if ($block_num >= $total_block) { //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
          } else {
              $next = $page + 1; //next변수에 page + 1을 해준다.
            echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
          }
          if ($page >= $total_page) { //만약 page가 페이지수보다 크거나 같다면
            echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
          } else {
              echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
          }
        ?>
      </ul>
    </div>
    <?php if(isset($id)){?>
    <div id="write_btn">
      <a href="noticeWrite.php"><button>글쓰기</button></a>
    </div>
    <?php } ?>
    <br />
    <!-- 검색 기능 -->
    <div id="search_box">
      <form action="noticeSearch.php" method="get">
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
