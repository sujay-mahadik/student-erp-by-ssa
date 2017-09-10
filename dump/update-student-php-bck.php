<?php
include_once 'includes/db_connect.php';

echo "here...";
//$name=$_POST["uid"];
//$name_padded = sprintf("%03d", $name);
$password=SHA1($_POST["upass"]);
$fname=$_POST["firstname"];
$mname=$_POST["middlename"];
$lname=$_POST["lastname"];
$email=$_POST["email"];

$sql = "UPDATE `{$table_found}` SET fname= '$fname' WHERE userid='$_SESSION['userid']'"  ;
if ($conn->query($sql) === TRUE) {
	echo "successfully ";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}