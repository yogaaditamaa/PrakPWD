<?php

	session_start();

	$random_alpha 	= md5(rand()); //perintah untuk membuat kode captcha
	$captcha_code 	= substr($random_alpha, 0, 6); //perintah untuk membuat kode captcha
	$_SESSION["captcha_code"] 	= $captcha_code; //captcha yang dibuat akan disimpan di dalam $_SESSION["captcha_code"] 	= $captcha_code
	$target_layer 	= imagecreatetruecolor(70,30); //pembuatan kode captcha menjadi image
	$captcha_background 	= imagecolorallocate($target_layer, 255, 160, 119); //pembuatan kode captcha menjadi image
	imagefill($target_layer,0,0,$captcha_background); //pembuatan kode captcha menjadi image
	$captcha_text_color 	= imagecolorallocate($target_layer, 0, 0, 0); //pembuatan kode captcha menjadi image
	imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color); //pembuatan kode captcha menjadi image
	header("Content-type: image/jpeg"); //pembuatan kode captcha menjadi image
	imagejpeg($target_layer); //pembuatan kode captcha menjadi image

?>