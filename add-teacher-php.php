<?php
include_once 'includes/db_connect.php';

$name=$_POST["uid"];
$password=SHA1($_POST["upass"]);
$fname=$_POST["firstname"];
$mname=$_POST["middlename"];
$lname=$_POST["lastname"];
$sql = "INSERT INTO teacher
VALUES ('$name','$password','$fname','$mname','$lname')";
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
?>