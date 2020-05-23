<?php
function load() {
	$use ='ghost';
$passd = 'ghost';
$host = 'localhost';
$db = 'dw_articles';
$conn = mysqli_connect($host, $use, $passd, $db) or die("<div style='background: #CB0003; color:snow; font-size: 14px; padding:3px;'>Sorry could not connect to Scholars database at this moment, Please try again later</div>");
if(ctype_space($_GET['searchArea']) || empty($_GET['searchArea'])) {
	echo "<div style='margin-bottom:62%;'>Empty search request</div>";
	}
	else if (isset($_GET['searchArea']) && isset($_GET['cat'])) {
		$asearch = $_GET['searchArea'];
		$cat = strtolower($_GET['cat']);
$asearche = preg_replace("#[^ 0-9a-z]#i", "", $asearch);
		$query = mysqli_query($conn, "SELECT * FROM `articles` WHERE CATEGORY = '$cat' AND TITLE LIKE '%$asearche%'");
	
	$check = mysqli_num_rows($query);
	
	 if ($check == 0) {
		$check = "No results was found";
	}
	
	else {
		echo "<form method='get' action='asearch.php'><input type='search' id='searchArea' name='searchArea' min='1' placeholder='Discover anything you wish'/><button type='submit' id='searchSubmit'><img src='unnamed (55).png' height='20px' width='22px' alt='Go!' /></button><div align='center'>$check results found</div>";
		echo "<br /><div style='float:left; width:15%' id='cat'>Categories<br /><div><img src='unnamed (22).png' height='18px' width='18px' /> <input type='submit' name='cat' value='History'></div>
<div><img src='unnamed (23).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Comedy'></div>
<div><img src='Icon_Photo.png' height='18px' width='18px' /> <input type='submit' name='cat' value='lifestyle'></div>
<div><img src='unnamed (24).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Romance'></div>
<div><img src='unnamed (25).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Movies'></div>
<div><img src='unnamed (26).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Sports'></div>
<div><img src='unnamed (27).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Social'></div>
<div><img src='unnamed (29).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Government'></div>
<div><img src='unnamed (30).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Science'></div>
<div><img src='unnamed (31).png' height='20px' width='20px' /> <input type='submit' name='cat' value='Art'></div>
<div><img src='unnamed (32).png' height='18px' width='18px' /> <input type='submit' name='cat' value='literature'></div>
<div><img src='unnamed (33).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Religion'></div>
<div><img src='america-1300088_960_720.png' height='18px' width='18px' /> <input type='submit' name='cat' value='Landmarks'></div>
<div><img src='unnamed (34).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Companies'></div>
<div><img src='unnamed (35).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Education'></div>
<div><img src='unnamed (36).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Shopping'></div>
<div><img src='unnamed (37).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Novels'></div>
<div><img src='unnamed (38).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Commerce'></div>
<div><img src='unnamed (39).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Ecnomics'></div>
<div><img src='unnamed (40).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Accounting'></div>
<div><img src='unnamed (41).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Politics'></div>
<div><img src='unnamed (42).png' height='18px' width='18px' /><input type='submit' name='cat' value='Celebrities'></div>
<div><img src='unnamed (43).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Legends & Myths'></div>
<div><img src='mb-puzzle-piece-hi.png' height='18px' width='18px' /> <input type='submit' name='cat' value='Puzzles & Riddles'></div>
<div><img src='unnamed (44).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Transportation'></div>
<div><img src='unnamed (45).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Gaming'></div>
<div><img src='images (14).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Schools'></div>
	<div><img src='download (2).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Medicine'></div>
<div><img src='unnamed (46).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Technology'></div>
<div><img src='unnamed (52).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Notables'></div>
<div><img src='unnamed (50).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Cooking'>Foods & </div>
<div><img src='unnamed (49).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Comics'></div>
<div><img src='unnamed (53).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Nature'></div>
	<div><img src='unnamed (51).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Fitness & Gym'></div></div></form>";
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$id = 'id'.$row['ID'];
		$title = $row['TITLE'];
		$date = $row['DATE'];
		$category = $row['CATEGORY'];
		$article = $row['ARTICLE'];
		$url = $row['URL'];
		echo "<div align='center'><div style='background:#FCFCFC; padding:1%; box-shadow:1px 1px 2px 2px #999; width:70%; height:100px; overflow:hidden;' align='left'><div style='font-size:20px;'><ins style='font-family:Georgia, Times New Roman, Times, serif; color:green;'>Date</ins>: <a style='color:#BAB31D; cursor:pointer;'>$date</a></div><div style='font-size:20px; margin-left:5%;'><ins style='font-family:Georgia, Times New Roman, Times, serif; color:green;'>Title</ins>: <a  style=' color:#3347FB; cursor:pointer;' href='http://localhost/Dworld/articles/$url'>$title</a></div><hr color='green' /><div>$article</div></div></div></div><div align = 'center'> Click the title to read</div><br /><br />";
	}
	}

	}
	else if(isset($_GET['searchArea']) && !isset($_GET['cat'])) {
	
	$asearch = $_GET['searchArea'];
$asearche = preg_replace("#[^ 0-9a-z]#i", "", $asearch);
		$query = mysqli_query($conn, "SELECT * FROM `articles` WHERE TITLE  LIKE '%$asearche%'");
	
	$check = mysqli_num_rows($query);
	
	 if ($check == 0) {
		echo "No results was found";
	}
	
	else {
		echo "<form method='get' action='asearch.php'><input type='search' id='searchArea' name='searchArea' min='1' placeholder='Discover anything you wish'/><button type='submit' id='searchSubmit'><img src='unnamed (55).png' height='20px' width='22px' alt='Go!' /></button><div align='center'>$check results found</div>";
		echo "<br /><div style='float:left; width:15%' id='cat'>Categories<br /><div><img src='unnamed (22).png' height='18px' width='18px' /> <input type='submit' name='cat' value='History'></div>
<div><img src='unnamed (23).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Comedy'></div>
<div><img src='Icon_Photo.png' height='18px' width='18px' /> <input type='submit' name='cat' value='lifestyle'></div>
<div><img src='unnamed (24).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Romance'></div>
<div><img src='unnamed (25).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Movies'></div>
<div><img src='unnamed (26).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Sports'></div>
<div><img src='unnamed (27).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Social'></div>
<div><img src='unnamed (29).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Government'></div>
<div><img src='unnamed (30).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Science'></div>
<div><img src='unnamed (31).png' height='20px' width='20px' /> <input type='submit' name='cat' value='Art'></div>
<div><img src='unnamed (32).png' height='18px' width='18px' /> <input type='submit' name='cat' value='literature'></div>
<div><img src='unnamed (33).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Religion'></div>
<div><img src='america-1300088_960_720.png' height='18px' width='18px' /> <input type='submit' name='cat' value='Landmarks'></div>
<div><img src='unnamed (34).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Companies'></div>
<div><img src='unnamed (35).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Education'></div>
<div><img src='unnamed (36).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Shopping'></div>
<div><img src='unnamed (37).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Novels'></div>
<div><img src='unnamed (38).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Commerce'></div>
<div><img src='unnamed (39).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Ecnomics'></div>
<div><img src='unnamed (40).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Accounting'></div>
<div><img src='unnamed (41).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Politics'></div>
<div><img src='unnamed (42).png' height='18px' width='18px' /><input type='submit' name='cat' value='Celebrities'></div>
<div><img src='unnamed (43).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Legends & Myths'></div>
<div><img src='mb-puzzle-piece-hi.png' height='18px' width='18px' /> <input type='submit' name='cat' value='Puzzles & Riddles'></div>
<div><img src='unnamed (44).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Transportation'></div>
<div><img src='unnamed (45).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Gaming'></div>
<div><img src='images (14).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Schools'></div>
	<div><img src='download (2).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Medicine'></div>
<div><img src='unnamed (46).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Technology'></div>
<div><img src='unnamed (52).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Notables'></div>
<div><img src='unnamed (50).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Cooking'>Foods & </div>
<div><img src='unnamed (49).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Comics'></div>
<div><img src='unnamed (53).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Nature'></div>
	<div><img src='unnamed (51).png' height='18px' width='18px' /> <input type='submit' name='cat' value='Fitness & Gym'></div></div></form>";
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$id = 'id'.$row['ID'];
		$title = $row['TITLE'];
		$date = $row['DATE'];
		$category = $row['CATEGORY'];
		$article = $row['ARTICLE'];
		$url = $row['URL'];
		echo "<div align='center'><div style='background:#FCFCFC; padding:1%; box-shadow:1px 1px 2px 2px #999; width:70%; height:100px; overflow:hidden;' align='left'><div style='font-size:20px;'><ins style='font-family:Georgia, Times New Roman, Times, serif; color:green;'>Date</ins>: <a style='color:#BAB31D; cursor:pointer;'>$date</a></div><div style='font-size:20px; margin-left:5%;'><ins style='font-family:Georgia, Times New Roman, Times, serif; color:green;'>Title</ins>: <a  style=' color:#3347FB; cursor:pointer;' href='http://localhost/Dworld/articles/$url'>$title</a></div><hr color='green' /><div>$article</div></div></div></div><div align = 'center'> Click the title to read</div><br /><br />";
	}
	}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="scholarsi.png" sizes="30"/>
<title>Article search results</title>
<style>
	@font-face {
		font-family:roboto;
		src:url(Roboto-Light.ttf);
	}
	#cat div {
		font-size: 17px;
		font-family: roboto;
		box-shadow: 1px 1px 2px 1px #999;
		margin-top: 2.5%;
		border-radius: 3px;
	}
	#cat {
		font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
		font-size: 35px;
		color:grey;
	}
	#cat div input {
		font-family: roboto;
		text-decoration: none;
		color: rgba(99,99,99,0.9);
		background: none;
		border:none;
		box-shadow: none;
		font-size: 16px;
		cursor:pointer;
	}
	#searchArea {
	background: rgba(255,255,255,0.5);
	font-family: "roboto";
	border:none;
	box-shadow: 0px 2px 2px 0px #999;
	font-size: 15px;
	width:45%;
	padding:2px;
	color:rgba(0,0,0,0.6);
}
#searchSubmit {
	background: rgba(255,255,255,0.5);
	font-family: "roboto";
	border:none;
	box-shadow: 2px 2px 2px 0px #999;
	font-size: 14px;
	padding:2px;
	margin-left: -7px;
	position:absolute;
	cursor: pointer;
	border-radius: 0px 2px 2px 0px;
}
</style>
</head>
<script src="jquery.js" type="text/javascript"></script>
<body><form onsubmit="return artsear()" method="get" action="asearch.php">
<label>
    </form><?php  load() ?>

   
</body>
</html>