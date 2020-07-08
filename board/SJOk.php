<?php include "../db/dbConn.php";

$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$title = $_POST['title'];
$content = $_POST['content'];

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
    $sql = mq("INSERT INTO SJBoard(name, id, title, content, date, hit, file) VALUES('$username', '$userid', '$title', '$content', default, 0, '$oname');");
}else{
$sql = mq("INSERT INTO SJBoard(name, id, title, content, date, hit, file) VALUES('$username', '$userid', '$title', '$content', default, 0, '$oname');");
}
?>

<script type="text/javascript">
  alert("글쓰기 완료되었습니다.");
</script>
<meta http-equiv="refresh" content="0 url=/board/SJBoard.php" />
