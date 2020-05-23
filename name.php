<?php 
session_start();
?>
<?php
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];
if (isset($name)) {
	echo $name;
}
?>