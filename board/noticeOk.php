<?php

include "dbConn.php";
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$title = $_POST['title'];
$content = $_POST['content'];

if(isset($_POST['lockpost'])){
  $lockp = 1;
}else{
  $lockp = 0;
}


$fileDir = './file';
$allowedExt = array('jpg','jpeg','png');

$error = $_FILES['file']['error'];
$oname = $_FILES['file']['name'];
if ($oname != null) {
    $ext = array_pop(explode('.', $oname));
    if ($error != UPLOAD_ERR_OK) {
        switch ($error) {
    case UPLOAD_ERR_FORM_SIZE:
      echo "파일이 너무 큽니다. ($error)";
  }
        exit;
    }
    if (!in_array($ext, $allowedExt)) {
        echo "허용되지 않는 확장자입니다.";
        exit;
    }

    move_uploaded_file($_FILES['file']['tmp_name'], "$fileDir/$oname");
    $sql = "INSERT INTO noticeBoard(name, id, title, content, date, hit, lockb, file)
          VALUES('$username', '$userid', '$title', '$content', default, 0, '$lockp', '$oname');";
    $query = mysqli_query($dbConn, $sql);
}else{
$sql = "INSERT INTO noticeBoard(name, id, title, content, date, hit, lockb, file)
      VALUES('$username', '$userid', '$title', '$content', default, 0, '$lockp', '$oname');";
$query = mysqli_query($dbConn, $sql);
}
?>

<script type="text/javascript">
  alert("글쓰기 완료되었습니다.");
</script>
<meta http-equiv="refresh" content="0 url=noticeBoard.php" />
