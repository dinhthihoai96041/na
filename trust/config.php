<?php

	session_start();
	ob_start();

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_data = "bibigang";

	$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_data);
	mysqli_set_charset($connect, 'utf8');

	$title = "Title HaiGMr";
	$description = "Description Config";
	$keywords = "Keywords Config";
	$home_url = "http://localhost";
	$id_fb = "hai195"; // id fb admin


?>