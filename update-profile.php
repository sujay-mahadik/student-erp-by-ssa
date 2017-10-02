<?php
include_once 'includes/db_connect.php';

session_start();

$idupdate=$_SESSION['id'];
$tabledisplay=$_SESSION['stf'];
$fname=$_POST['firstname'];
$mname=$_POST['middlename'];
$lname=$_POST['lastname'];
$address=$_POST['address'];
$email=$_POST['email'];
$photo=$_POST['imagelink'];

$sql="UPDATE  `{$tabledisplay}` SET fname='$fname', lname='$lname' , mname='$mname' ,address='$address',email='$email',image='$photo' WHERE userid= '$idupdate' ";
$result=$conn->query($sql);
echo $result;



header("Location: student-index.php");
?>
