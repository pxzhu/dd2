<?php include "dbConn.php";

$uid = $_GET['userid'];

$sql = mq("SELECT id FROM users WHERE id='$uid';");
$row = mysqli_num_rows($sql);

if ($row==0) {
    ?>
<div style='font-family:"malgun gothic"; color:skyblue;'><?php echo $uid; ?>는 사용가능한 아이디입니다.</div>
<?php
} else {
        ?>
<div style='font-family:"malgun gothic"; color:red;'><?php echo $uid; ?>중복된아이디입니다.</div>
<?php
    }
?>
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>
