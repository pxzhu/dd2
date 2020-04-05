<?php

$ip='localhost';
$id='root';
$pw='root';
$dbname='myservice';

$dbConn=mysqli_connect($ip, $id, $pw, $dbname)
or die("SQL server not connected!");

mysqli_query("SET NAMES UTF8");

?>
