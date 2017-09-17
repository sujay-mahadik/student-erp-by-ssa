<?php
include_once 'includes/db_connect.php';
session_start();

if (!isset($_SESSION['aai'])){
	header("Location: login-index.php");
}
echo "here...";
//$name=$_POST["uid"];
//$name_padded = sprintf("%03d", $name);
$fname=$_POST["ufirstname"];
$mname=$_POST["umiddlename"];
$lname=$_POST["ulastname"];
$address=$_POST["uaddress"];
$email=$_POST["uemail"];
$table=$_SESSION['utable_found'];
$userid=$_SESSION['uuserid'];
$table=$_SESSION['utable_found'];
$sql = "UPDATE `{$table}` SET fname= '$fname', mname='$mname', lname='$lname', email='$email', address='$address' WHERE userid='$userid'"  ;
if ($conn->query($sql) === TRUE) {
	echo "successfully ";
	$_SESSION['updated']= "Update successful of USER ID : ".$_SESSION['uuserid'];
	$_SESSION['update']=1;
	$_SESSION['showupdate']=0;
	header("Location: tab-student.php");
	
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
unset($_SESSION['uuserid']);
unset($_SESSION['ufname']);
unset($_SESSION['umname']);
unset($_SESSION['ulname']);
unset($_SESSION['uaddress']);
unset($_SESSION['uemail']);
unset($_SESSION['uyear']);
unset($_SESSION['udept']);
unset($_SESSION['uimage']);
?>