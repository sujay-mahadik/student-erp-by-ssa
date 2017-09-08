<?php
include_once 'includes/db_connect.php';
session_start();
echo "here...";
$userid=$_SESSION['duserid'];
$table=$_SESSION['dtable_found'];

$sql = "DELETE FROM `{$table}` WHERE userid='$userid'"  ;
if ($conn->query($sql) === TRUE) {
	echo "successfully ";
	$_SESSION['deleted']= "Deleted successful of USER ID : ".$_SESSION['duserid'];
	$_SESSION['delete']=1;
	header("Location: tab-student.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

?>