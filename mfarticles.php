<?php
session_start();
?>
<?php 
$use ='ghost';
$passd = 'ghost';
$host = 'localhost';
$db = "dw_articles";
$conn = mysqli_connect($host, $use, $passd, $db) or die("Could not connect to server");

if (!isset($_SESSION['username'])) {
	echo "You have to log in or sign up to see your favourited articles";
}
else {
	$user = $_SESSION['username'];
	$mfaq = mysqli_query($conn, "SELECT TITLE, URL FROM `articles_favourited` WHERE USERNAME = '$user'");
	while ($row = mysqli_fetch_array($mfaq, MYSQLI_ASSOC)) {
		$title = $row["TITLE"];
		$url = $row['URL'];
		echo "<a href = 'http://localhost/Dworld/articles/$url'>$title</a><br/><br/>";
	}
}