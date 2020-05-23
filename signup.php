<?php

$name = $_POST['name'];

$surname = $_POST['surname'];

$email = $_POST['email'];

$password = $_POST['password'];

$cpassword = $_POST['cpassword'];

$username = $_POST['username'];

$name = htmlspecialchars($name);

$surname = htmlspecialchars($surname);

$username = htmlspecialchars($username);

$email = htmlspecialchars($email); 

$password = htmlspecialchars($password);

$cpassword = htmlspecialchars($cpassword);


?>
<?php
$use ='ghost';
$passd = 'ghost';
$host = 'localhost';
$db = 'dw_users_data';
$conn = mysqli_connect($host, $use, $passd, $db) or die("Sorry could not connect to the DiscoveryWorld database at this moment, Please try again later");

$squery = mysqli_query($conn, "SELECT * FROM dw_users_data WHERE EMAIL = '$email'");

$result = mysqli_query($conn, $db);

$erows = mysqli_num_rows($squery);

$unchek = mysqli_query($conn, "SELECT * FROM dw_users_data WHERE USERNAME = '$username'");

$urows = mysqli_num_rows($unchek);
if (empty($name)) {
	echo "Oops! you forgot to input your name";
}
else if (strlen($name) > 30) {
	echo "Your name can't exceed 30 characters";
}
else if (empty($surname)) {
	echo "Oops! you forgot to input your surname";
}
else if (strlen($surname) > 50) {
	echo "Your surname can't exceed 30 characters";
}
else if (empty($username)) {
	echo "You must have a username";
}
else if (strlen($username) > 30) {
	echo "Your username can't exceed 30 characters";
}
else if (empty($email)) {
	echo "Please input an email address";
}
else if (strlen($email) < 6) {
	echo "Your email can't be less than 6 characters";
}
else if (strlen($email) > 50) {
	echo "Your email can't exceed 30 characters";
}
else if (empty($password)) {
	echo "Your password can't be empty";
}
else if (strlen($password) < 5) {
	echo "Your password can't be less than 5 characters";
}
else if (strlen($password) > 20) {
	echo "Your password can't exceed 20 characters";
}
else if ($urows >= 1) {
	echo "Username is used already";
}
else if ($erows >= 1) {
	echo "E-mail is already used";
}

else {
	mysqli_query($conn, "INSERT INTO dw_users_data (NAME, SURNAME, USERNAME, EMAIL, PASSWORD, DATE) VALUES('$name', '$surname', '$username', '$email', '$password', NOW())") or die("Sorry could not upload your data to the database for some unknown reason, Please try again later");
	
	{
$_SESSION['login'] = "1";
echo 1;
	}	

}

?>
<?php 
session_start();

$_SESSION['name'] = $name;
$_SESSION['surname'] = $surname;
$_SESSION['email'] = $email;
$_SESSION['username'] = $username;
?>

