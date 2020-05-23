<?php 

$use ='ghost';
$passd = 'ghost';
$host = 'localhost';
$db = 'dw_users_data';
$conn = mysqli_connect($host, $use, $passd, $db) or die("<div align='center' style='background: #CB0003; color:snow; font-size: 14px; padding:3px;'>Sorry could not connect to Scholars database at this moment, Please try again later</div>");


 $email = $_POST['email'];
 $pass = $_POST['password'];
 
 $email = htmlspecialchars($email);
 
 $pass = htmlspecialchars($pass);
 
 
 
  $logq = mysqli_query($conn, "SELECT * FROM dw_users_data WHERE EMAIL = '$email' OR USERNAME = '$email' AND PASSWORD = '$pass' ");
 
 $numb = mysqli_num_rows($logq);
 if(strlen($email) < 1) {
	 echo 3;
 } 
else if(strlen($pass) < 1) {
	echo 2;
}
 else if ($numb == 1) {
	 echo 0;
 }

 else {
	echo 1;
	
 }

	

$retval = mysqli_query($conn, " SELECT NAME, SURNAME, USERNAME, EMAIL FROM dw_users_data WHERE EMAIL = '$email' OR USERNAME = '$email' AND PASSWORD = '$pass'") or die("<div style='background: #CB0003; color:snow; font-size: 14px; padding:3px;'>Unable to question your info's with the database, please try again later</div>");

$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);



$name = $row['NAME'];
$surname = $row['SURNAME'];
$email = $row['EMAIL'];
$uname = $row['USERNAME'];


 ?>
 <?php 
session_start();

$_SESSION['name'] = $name;
$_SESSION['surname'] = $surname;
$_SESSION['email'] = $email;
$_SESSION['username'] = $uname;
?>
