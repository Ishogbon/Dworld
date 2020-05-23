<?php
session_start();
?>
<?php 
$use ='ghost';
$passd = 'ghost';
$host = 'localhost';
$db = "dw_comments";
$conn = mysqli_connect($host, $use, $passd, $db) or die("Could not connect to server");

$title = $_GET['title'];
$comment = $_GET['comment'];

$title = htmlspecialchars($title);

if (!isset($_SESSION['username'])) {
	echo "Please login or sign up to post your comment";
}
else if (strlen($comment) <= 4) {
	echo "please enter a comment";
}
else {
	$user = $_SESSION['username'];


mysqli_query($conn, "INSERT INTO `$title` (USERNAME, COMMENT, DATE) VALUES('$user', '$comment', NOW())") or die("Oops, could not post your comment now, please try again later");
echo "Comment has been posted successfully";
}
?>