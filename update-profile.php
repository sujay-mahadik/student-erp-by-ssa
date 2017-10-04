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

$tmp_name =$_FILES['myfile']['tmp_name'];
$name = $_SESSION['id'].".png";
$Location = "profile-image/".$name;
move_uploaded_file($tmp_name, $Location);
$photo=$Location;

$sql="UPDATE  `{$tabledisplay}` SET fname='$fname', lname='$lname' , mname='$mname' ,address='$address',email='$email',image='$photo' WHERE userid= '$idupdate' ";
$result=$conn->query($sql);


header("Location: student-index.php");
?>
