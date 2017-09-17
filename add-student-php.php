<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['aai']))
	{header("Location: login-index.php");
}
echo "here...";
//$name=$_POST["uid"];
//$name_padded = sprintf("%03d", $name);
$password=SHA1(12345678);
$examfees=0;
$libraryfine=0;
$otherfees=0;
$fname=$_POST["firstname"];
$mname=$_POST["middlename"];
$lname=$_POST["lastname"];
$address=$_POST["address"];
$email=$_POST["email"];
//$pattern=$_POST["pattern"];
$year=$_POST["year"];
$dept=$_POST["dept"];
if($dept == "civil"){
	$deptid = "1";
}
elseif($dept == "computer"){
	$deptid = "2";
}
elseif($dept == "it"){
	$deptid = "3";
}
elseif ($dept == "entc") {
	$deptid = "4";
}
elseif ($dept == "mechanical") {
	$deptid = "5";
}
else{
	echo "Dept not available";
}


if($year == "fe"){
	$cyear = date('y');
}
elseif($year == "se"){
	$cyear = date('y')-"1";
}
elseif($year == "te"){
	$cyear = date('y')-"2";
}
else{
	echo "year not available";
}


$table = $cyear.$dept."db";

$newtable = "CREATE TABLE If NOT EXISTS `{$table}` (
`userid` int(11) AUTO_INCREMENT PRIMARY KEY,
`password` varchar(40) NOT NULL,
`fname` varchar(50) NOT NULL,
`mname` varchar(50) NOT NULL,
`lname` varchar(50) NOT NULL,
`address` varchar(100) NOT NULL,
`email`	varchar(50) NOT NULL,
`year`  varchar(50) NOT NULL,
`dept`  varchar(50) NOT NULL,
`image` varchar(1024),
`examfees` int(10),
`libraryfine` int(10),
`otherfees` int(10),
`remarks` varchar(50)
)";

if($conn->query($newtable)===TRUE){
	$start=$cyear.$deptid."001";

	$startset="alter table `{$table}` AUTO_INCREMENT=".$start."";
	$conn->query($startset);
}
//attendacne table
$tableat=$cyear.$dept."am";
$newtableattendance = "CREATE TABLE If NOT EXISTS `{$tableat}` (
`userid` int(11),
`subj1` int DEFAULT 0,
`subj2` int DEFAULT 0
)";
if($conn->query($newtableattendance)===TRUE){
	$sql="INSERT into `{$tableat}`(userid) values (99)";
	$conn->query($sql);
}

$sql = "INSERT INTO `{$table}` (password,fname,mname,lname,address,email,year,dept,examfees,libraryfine,otherfees) VALUES ('$password','$fname','$mname','$lname','$address','$email','$year','$dept','$examfees','$libraryfine','$otherfees')";

if ($conn->query($sql) === TRUE) {
	$maxuseridsql = mysqli_query($conn, "SELECT MAX(userid) AS maxuserid FROM `{$table}`");
	$row = mysqli_fetch_assoc($maxuseridsql);
	$maxuserid = $row['maxuserid'];
	$_SESSION['added']="Student added with USER ID :".$maxuserid." default password 12345678";
	$_SESSION['add']=1;
	header("Location: tab-student.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
//insert id into attendance table
$sql = "INSERT INTO `{$tableat}` (userid) VALUES ('$maxuserid')";

if ($conn->query($sql) === TRUE) {

	header("Location: tab-student.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
?>