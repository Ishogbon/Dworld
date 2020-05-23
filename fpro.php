<?php
session_start();
?>
<?php 
$use ='ghost';
$passd = 'ghost';
$host = 'localhost';
$db = "dw_articles";
$conn = mysqli_connect($host, $use, $passd, $db) or die("Could not connect to server");

$title = $_GET['title'];

$title = strtolower($title);
$urle = preg_replace('/\s\s+/', ' ', $title); //Replaces any whitespace found in the title

$url = preg_replace("/ /", "-", $urle);

if (!isset($_SESSION['username'])) {
	echo 2;
}
else if(!isset($_GET['type'])) {
	$user = $_SESSION['username'];
$afc = mysqli_query($conn, "SELECT ID FROM `articles_favourited` WHERE USERNAME = '$user' AND TITLE = '$title'");
	if(mysqli_num_rows($afc) >= 1) {
		mysqli_query($conn, "DELETE FROM `articles_favourited` WHERE USERNAME = '$user' AND TITLE = '$title'");
		echo 0;
	}
	else {
		mysqli_query($conn, "INSERT INTO `articles_favourited` (USERNAME, TITLE, URL) VALUES('$user', '$title', '$url')");
		echo 1;
	}
}
if (isset($_GET['type']) && isset($_SESSION['username'])) {
	$user = $_SESSION['username'];
	$cff = mysqli_query($conn, "SELECT ID FROM `articles_favourited` WHERE USERNAME = '$user' AND TITLE = '$title'");
	if(mysqli_num_rows($cff) >= 1) {
		echo 4;
}
}
?>