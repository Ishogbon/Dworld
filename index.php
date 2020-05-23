<?php
$use ='ghost';
$passd = 'ghost';
$host = 'localhost';
$db = 'dw_articles';
$conn = mysqli_connect($host, $use, $passd, $db) or die("<div style='background: #CB0003; color:snow; font-size: 14px; padding:3px;'>Sorry could not connect to Discovery World database at this moment, Please try again later</div>");


if(isset($_GET['url'])) {
	$url = $_GET['url'];
	$urlc = mysqli_num_rows(mysqli_query($conn, "SELECT ID FROM `articles` WHERE URL = '$url'"));
	if ($urlc < 1) {
		$title = "Article could not be found"; 
		die("<div style='width:100%; background:#196CEB; color:white; font-size:200%; border-radius:2px; box-shadow:1px 1px 2px 2px #999; padding-top:5%; padding-bottom:5%; top:0; position:absolute; left:0; right:0;'>The requested article could not be found</div>
		<footer style='position:absolute;
	width:100%;
	color:white;
	background-color:#196CEB;
	margin-top:5%;
	box-shadow:0px -3px 4px 1px #999;
	border-radius:2px;
	padding-top:0.5%;
	padding-bottom:0.5%;
	left:0;
	right:0;
	border-top:3px solid yellow;
	bottom:0;
	display:inline-block;
	
	'>
  <div>
        <ul >
          <li style='list-style-type:none;
	margin-top:.5%;
	margin-bottom:.5%;
	display: inline;
	margin-left: 5%;'><a href='http://localhost/Scholars/tou.html' style='text-decoration:none; color:white'>Terms of Use</a></li>
          <li style='list-style-type:none;
	margin-top:.5%;
	margin-bottom:.5%;
	display: inline;
	margin-left: 5%;'><a href='http://localhost/Scholars/htu.html' style='text-decoration:none; color:white'>How to use</a></li>
          <li style='list-style-type:none;
	margin-top:.5%;
	margin-bottom:.5%;
	display: inline;
	margin-left: 5%;'><a href='http://localhost/Scholars/aboutUs.html' style='text-decoration:none; color:white'>About us</a></li>
          <li id='tpfoo' style='list-style-type:none;
	margin-top:.5%;
	margin-bottom:.5%;
	display: inline;
	margin-left: 5%;'><a style='text-decoration:none; color:white' href='http://localhost/Scholars/Toparticles.php'>Top Articles</a></li><br />
          <li><a>Follow us</a></li>
        </ul>
	  </div>
      
        
        
   
      
        <ul >
          
         
        </ul>
        <div align='center' style='background:#0050F3; padding:4px; margin-bottom: -7px; border-top:1px solid #004ED9;'>
  <b style='padding-top:2%;'>Scholars&copy;2017</b>
	  </div>
    </footer>");
	}
	else {
$url = $_GET['url'];
	$query = mysqli_query($conn, "SELECT ARTICLE FROM `articles` WHERE URL = '$url'") or die ("<div align='center' style='background: #CB0003; color:snow; font-size: 14px; padding:3px;'>Article could not be loaded</div>");
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	$artic = $row['ARTICLE'];
}
$keywordq = mysqli_query($conn, "SELECT KEYWORDS FROM `articles` WHERE URL = '$url'") or die ("dworld");
	
	$titl = mysqli_query($conn, "SELECT TITLE FROM `articles` WHERE URL = '$url'") or die ("title");
	
		$categor = mysqli_query($conn, "SELECT CATEGORY FROM `articles` WHERE URL = '$url'") or die ("T-F-A");
		
		$da = mysqli_query($conn, "SELECT DATE FROM `articles` WHERE URL = '$url'") or die ("Date");
		
	while($titlee = mysqli_fetch_assoc($titl) ) {
		$title = $titlee['TITLE'];
	}

while($keywordr = mysqli_fetch_assoc($keywordq)) {

	$keyword = $keywordr['KEYWORDS'];
}
		while($categr = mysqli_fetch_assoc($categor)) {

	$category = $categr['CATEGORY'];
}
		while($dat = mysqli_fetch_assoc($da)) {

	$date = $dat['DATE'];
}
}
}
else if(!isset($_GET['url'])) {
	$url = "t-f-a";
	$query = mysqli_query($conn, "SELECT ARTICLE FROM `articles` WHERE CATEGORY = '$url'") or die ("<div align='center' style='background: #CB0003; color:snow; font-size: 14px; padding:3px;'>Article could not be loaded</div>");
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	$artic = $row['ARTICLE'];
}
$keywordq = mysqli_query($conn, "SELECT KEYWORDS FROM `articles` WHERE CATEGORY = '$url'") or die ("dworld");
	
	$titl = mysqli_query($conn, "SELECT TITLE FROM `articles` WHERE CATEGORY = '$url'") or die ("title");
	
		$categor = mysqli_query($conn, "SELECT CATEGORY FROM `articles` WHERE CATEGORY = '$url'") or die ("T-F-A");
	
	$da = mysqli_query($conn, "SELECT DATE FROM `articles` WHERE CATEGORY = '$url'") or die ("Date");
	while($titlee = mysqli_fetch_assoc($titl) ) {
		$title = $titlee['TITLE'];
	}

while($keywordr = mysqli_fetch_assoc($keywordq)) {

	$keyword = $keywordr['KEYWORDS'];
}
		while($categr = mysqli_fetch_assoc($categor)) {

	$category = $categr['CATEGORY'];
}
	while($dat = mysqli_fetch_assoc($da)) {

	$date = $dat['DATE'];
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow" />
<meta name="Description" "<?php echo $title; ?>" />
<meta name="Keywords" charset="<?php echo $keyword; ?>" />
<link rel="Shortcut icon" href="dw.png" />
<link type="text/css" rel="stylesheet" href="index.css" />
<script src="jquery.js" type="text/javascript"></script>
<title><?php echo $title; ?></title>
</head>

<body onLoad="iframe()">
<div id="extra-content-body" align="center">
	<div id="signup"><span id="signup-cancel"><img src="unnamed (48).png" alt="cancel" height="18px" width="18px"/></span><div id="resp">Please refresh the page</div>
	<div align="left" id="signup-head">Sign up
</div>

		<label for="name">Name<br>
<input id="name" name="name" type="text" placeholder="Please input your name here" /></label><br><br>


		<label for="surname">Surname<br>
<input id="surname" name="surname" type="text" placeholder="Please input your surname here" /></label><br><br>

<label for="username">Username<br>
<input id="username" name="username" type="text" placeholder="Please input your choosen username here" /></label><br><br>


		<label for="email">Email<br>
<input id="email" name="email" type="email" placeholder="Please input your email here" /></label><br><br>


		<label for="password">Password<br>
<input id="password" name="password" type="password" placeholder="Please input your password here" /></label><br><br>

	
		<label for="cpassword">Confirm password<br>
<input id="cpassword" name="cpassword" type="password" placeholder="Please confirm the password here" /></label><br><br>

<button id="submit-signup" onClick="signupd()">Sign up</button><br>

<button id="submit-for-scholars-signup">Or sign up with your Newsroom account instead</button><br>
	</div>
</div>


		<section class="nav"><p id="cap">Schol<img height="20px" width="20px" src="dw.png"/>rs</p><hr color="#757575"/><div><img src="unnamed (15).png" height="18px" width="18px" /> <a>Home</a></div><div id="cat"><img src="unnamed (14).png" height="18px" width="18px" /> <a>Categories<div class="navconcon">
<div><img src="unnamed (22).png" height="18px" width="18px" /> <a href="#">History</a></div>
<div><img src="unnamed (23).png" height="18px" width="18px" /> <a href="#">Comedy</a></div>
<div><img src="Icon_Photo.png" height="18px" width="18px" /> <a href="#">lifestyle</a></div>
<div><img src="unnamed (24).png" height="18px" width="18px" /> <a href="#">Romance</a></div>
<div><img src="unnamed (25).png" height="18px" width="18px" /> <a href="#">Movies</a></div>
<div><img src="unnamed (26).png" height="18px" width="18px" /> <a href="#">Sports</a></div>
<div><img src="unnamed (27).png" height="18px" width="18px" /> <a href="#">Social</a></div>
<div><img src="unnamed (29).png" height="18px" width="18px" /> <a href="#">Government</a></div>
<div><img src="unnamed (30).png" height="18px" width="18px" /> <a href="#">Science</a></div>
<div><img src="unnamed (31).png" height="20px" width="20px" /> <a href="#">Art</a></div>
<div><img src="unnamed (32).png" height="18px" width="18px" /> <a href="#">literature</a></div>
<div><img src="unnamed (33).png" height="18px" width="18px" /> <a href="#">Religion</a></div>
<div><img src="america-1300088_960_720.png" height="18px" width="18px" /> <a href="#">Landmarks</a></div>
<div><img src="unnamed (34).png" height="18px" width="18px" /> <a href="#">Companies</a></div>
<div><img src="unnamed (35).png" height="18px" width="18px" /> <a href="#">Education</a></div>
<div><img src="unnamed (36).png" height="18px" width="18px" /> <a href="#">Shopping</a></div>
<div><img src="unnamed (37).png" height="18px" width="18px" /> <a href="#">Novels</a></div>
<div><img src="unnamed (38).png" height="18px" width="18px" /> <a href="#">Commerce</a></div>
<div><img src="unnamed (39).png" height="18px" width="18px" /> <a href="#">Ecnomics</a></div>
<div><img src="unnamed (40).png" height="18px" width="18px" /> <a href="#">Accounting</a></div>
<div><img src="unnamed (41).png" height="18px" width="18px" /> <a href="#">Politics</a></div>
<div><img src="unnamed (42).png" height="18px" width="18px" /><a href="#">Celebrities</a></div>
<div><img src="unnamed (43).png" height="18px" width="18px" /> <a href="#">Legends & Myths</a></div>
<div><img src="mb-puzzle-piece-hi.png" height="18px" width="18px" /> <a href="#">Puzzles & Riddles</a></div>
<div><img src="unnamed (44).png" height="18px" width="18px" /> <a href="#">Transportation</a></div>
<div><img src="unnamed (45).png" height="18px" width="18px" /> <a href="#">Gaming</a></div>
<div><img src="images (14).png" height="18px" width="18px" /> <a href="#">Schools</a></div>
	<div><img src="download (2).png" height="18px" width="18px" /> <a href="#">Medicine</a></div>
<div><img src="unnamed (46).png" height="18px" width="18px" /> <a href="#">Technology</a></div>
<div><img src="unnamed (52).png" height="18px" width="18px" /> <a href="#">Notables</a></div>
<div><img src="unnamed (50).png" height="18px" width="18px" /> <a href="#">Foods & Cooking</a></div>
<div><img src="unnamed (49).png" height="18px" width="18px" /> <a href="#">Comics</a></div>
<div><img src="unnamed (53).png" height="18px" width="18px" /> <a href="#">Nature</a></div>
	<div><img src="unnamed (51).png" height="18px" width="18px" /> <a href="#">Fitness & Gym</a></div></div></a></div><div><img src="unnamed (17).png" height="18px" width="18px" /> <a>Recent</a></div><div><img src="Icon_18-512.png" height="18px" width="18px" /> <a id="mfsto">Most favourited</a></div><div id="mfarticles"></div><hr /><div><img src="unnamed (18).png" height="18px" width="18px" /> <a>Account & preferences</a></div><div><img src="star.png" height="18px" width="18px" /> <a>Favourites</a></div><div><img src="unnamed (19).png" height="18px" width="18px" /> <a>Read later</a></div><hr/><div><img src="term-condition-legal-transaction-bank-transfer-activity-3f492a4e9df712c9-512x512.png" height="18px" width="18px" /> <a>Terms of use</a></div><div><img src="unnamed (21).png" height="18px" width="18px" /> <a>About us</a></div></section>
		<div class="article">	<header><span class="menut"><img src = "menu-grey.png" height = "20px" width = "20px" alt="Toggle menu"/></span>
		<span id="DisW-header">Sch<img id="logo" src="dwr.png" height="3%" width="5%"/>lars</span><span id="cate"><?php echo $category; ?></span>
		<div id="pupdate">
	
	<ul id="op">
			<li id="signup-toggle">Sign up</li>
			<li id="login-toggle">Log in</li>
		</ul></div>
		</header><div class="login-form"><label id="l_u_e">Username/Email<input id="l-usere" type="text" /></label><label id="l_password">Password<input id="l-password" type="password"/></label><div align="center" id="log-error"></div><br />
<input id="login-button" type="button" value="Sign in" /></div><br><form method="get" action="asearch.php"><label id="search-box"><span id="searchHead">Search</span><input type="search" id="searchArea" name="searchArea" min="1" placeholder="Discover anything you wish"/><button type="submit" id="searchSubmit"><img src="unnamed (55).png" height="20px" width="22px" alt="Go!" /></button></label></form><br /><br />

<div id="a-heading"><h1 id="a-title"><?php echo $title; ?></h1> <h4>Date: <?php echo $date; ?></h4></div>
			<article>
<?php echo $artic ?></article><br> <div id="a-favour">Favourite <span id="a-star">&#9734;</span><p id="f-mess"></p></div><br />
<br />

<div id="comment"><div id = "cmhb"><span id="cmh">Comments</span><br />
</div><div id="rcmhb"></div><br>
	<div id="comment-box"><box class="c-r-resp"><b id="r-c-cresp">Your comment could not be posted</b><br />
<input type="button" id="b-b" value="Ok" /></box><textarea name="commentinputhold" id="comment-input-hold"></textarea><iframe name="commentInput" id="commentInput" ></iframe><div id="comment-formatters"><input id="ccolor" type="color"/><button onClick="ccolor()" id="colorButton">c</button><img onClick="cunlink()" src="unlink-icon-white.png" height="15px" width="18px" /><img src="unnamed (54).png" height="16px" width="20px" onclick="clink()"/><b onClick="cbold()">B</b><i onClick="citalic()">I</i><ins onClick="cunderline()">U</ins></div><br /><button id="c-post">Post comment</button></div>
</div></div>
	

	
	<script type="text/javascript" src="index.js"></script>
</body>
</html>
