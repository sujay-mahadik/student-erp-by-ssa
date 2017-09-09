<?php
include_once 'includes/db_connect.php';
session_start();
echo "here...";
//$name=$_POST["uid"];
//$name_padded = sprintf("%03d", $name);
$password=SHA1($_POST["upass"]);
$fname=$_POST["firstname"];
$mname=$_POST["middlename"];
$lname=$_POST["lastname"];
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
`email`	varchar(50) NOT NULL,
`year`  varchar(50) NOT NULL,
`dept`  varchar(50) NOT NULL,
`image` varchar(1024)
)";

if($conn->query($newtable)===TRUE){
	$start=$cyear.$deptid."001";

	$startset="alter table `{$table}` AUTO_INCREMENT=".$start."";
	$conn->query($startset);
}
echo "here";


$sql = "INSERT INTO `{$table}` (password,fname,mname,lname,email,year,dept) VALUES ('$password','$fname','$mname','$lname','$email','$year','$dept')";
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully at $cyear$deptid$maxid_padded";

	$_SESSION['add']=1;
	header("Location: tab-student.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}