<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "xiaomipdgs";

$conn = mysqli_connect($host,$user,$pass);
if($conn){
	$buka = mysqli_select_db($conn, $db);
	if(!$buka){
		die("Database tidak dapat dibuka");
	}
} else {
	die("Server MySQL tidak terhubung");
}
?>