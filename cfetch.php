<?php
$use ='ghost';
$passd = 'ghost';
$host = 'localhost';
$db = 'dw_comments';
$conn = mysqli_connect($host, $use, $passd, $db) or die("Could not connect to server");

$title = $_GET['title'];
$id = "SELECT * FROM  `$title`";


$retval = mysqli_query($conn, $id);
if(!$retval) {
	
	die("could not get the requested data");
	
}
else {
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		echo "<span class='c-usern'>{$row['USERNAME']}</span><br /><br />"
	.
	"<div class='c-comm'>{$row['COMMENT']}<i style='float:right; font-size:14px;'>{$row['DATE']}</i><br /></div><br />";
	}
}
?>