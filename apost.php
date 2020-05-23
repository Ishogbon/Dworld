<?php 
$use ='ghost';
$passd = 'ghost';
$host = 'localhost';
$db = "dw_articles";
$conn = mysqli_connect($host, $use, $passd, $db) or die("Could not connect to server");

$title = $_POST['title'];
$keyword = preg_replace("/'/", "&#39;", $_POST['keyword']);
$category = preg_replace("/'/", "&#39;", $_POST['category']);
$article = preg_replace("/'/", "&#39;",  $_POST['article']);
$urle = preg_replace('/\s\s+/', ' ', $title); //Replaces any whitespace found in the title

$url = preg_replace("/ /", "-", $urle);
if(empty($title) && empty($keyword)) {
	echo "can't launch";
}
else {
mysqli_query($conn, "INSERT INTO `articles` (TITLE, ARTICLE, URL, KEYWORDS, CATEGORY, DATE) VALUES('$title', '$article', '$url', '$keyword', '$category',  NOW())") or die(mysqli_error($conn));
mysqli_query($conn, "CREATE TABLE `dw_comments`.`$title` (ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, USERNAME VARCHAR(30), COMMENT VARCHAR(9999), DATE DATETIME NOT NULL)")or die(mysqli_error($conn));
echo "articles posted successfully";
}
?>