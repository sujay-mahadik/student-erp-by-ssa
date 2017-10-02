<?php
include_once 'includes/db_connect.php';

session_start();

$tabledisplay=$_SESSION['tablemrk'];
$subj=$_SESSION['subj'];
            //echo $subj;
$allstudentresult = $conn->query("SELECT * FROM `{$tabledisplay}` ");
while($row=mysqli_fetch_array($allstudentresult,MYSQLI_ASSOC))
{
	if($_POST[$row['userid']]=="on")
	{
		$id=$row['userid'];
		$sql="update  `{$tabledisplay}` set `{$subj}`=`{$subj}`+1 where userid= '$id' ";
		$result=$conn->query($sql);
            //echo $result;
	}
}
$sql="update  `{$tabledisplay}` set `{$subj}`=`{$subj}`+1 where userid=99";
$result=$conn->query($sql);
$_SESSION['updatemsg']="update successfull";
header("Location: attendance.php");
?>
