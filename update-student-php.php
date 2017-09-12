<?php
include_once 'includes/db_connect.php';
session_start();
echo "here...";
//$name=$_POST["uid"];
//$name_padded = sprintf("%03d", $name);
$fname=$_POST["ufirstname"];
$mname=$_POST["umiddlename"];
$lname=$_POST["ulastname"];
$email=$_POST["uemail"];
$table=$_SESSION['utable_found'];
$userid=$_SESSION['uuserid'];
$table=$_SESSION['utable_found'];

$sql = "UPDATE `{$table}` SET fname= '$fname',lname='$lname',mname='$mname',email='$email' WHERE userid='$userid'"  ;
if ($conn->query($sql) === TRUE) {
	echo "successfully ";
	$_SESSION['updated']= "Update successful of USER ID : ".$_SESSION['uuserid'];
	$_SESSION['update']=1;
    $_SESSION['found']="hidden";
	header("Location: tab-student.php");

} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

?>