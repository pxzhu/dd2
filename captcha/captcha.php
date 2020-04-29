<?php
/* 자동가입방지 문자*/
session_start();
header('Content-Type: image/gif');


$captcha = '';
$patten = '123456789QWEERTYUIOPASZDFGHJKLZMXNCBVqpwoeirutyalskdjfhgzmxncbv'; //패턴 설정

for ($i = 0, $len = strlen($patten) -1; $i < 6; $i++) { //6가지 문자 생성
	$captcha .= $patten[rand(0, $len)];
}
$_SESSION['capt'] = $captcha;


$img = imagecreatetruecolor(80, 20); //크기
imagefilledrectangle($img, 0, 0, 80, 20, 0x519D9E); // 배경색
imagestring($img, 5, 6, 3, $captcha, 0xffffff); //문자 여백, 문자색상
imageline($img, 0, rand() % 20, 100, rand() % 20, 0xD1B6E1); //줄 색상
imagegif($img);
imagedestroy($img);
?>
