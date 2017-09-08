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
`id` int(11) AUTO_INCREMENT PRIMARY KEY,
`userid` int(11) NOT NULL,
`password` varchar(40) NOT NULL,
`fname` varchar(50) NOT NULL,
`mname` varchar(50) NOT NULL,
`lname` varchar(50) NOT NULL,
`email`	varchar(50) NOT NULL,
`year`  varchar(50) NOT NULL,
`dept`  varchar(50) NOT NULL,
`image` varchar(1024)
)";

if($conn->query($newtable) === TRUE){
	echo "table create or present";
}

$maxidsql = mysqli_query($conn, "SELECT MAX(id) AS maxid FROM `{$table}`");
$row = mysqli_fetch_assoc($maxidsql);
$maxid = $row['maxid']+"1";
$maxid_padded = sprintf("%03d", $maxid);
$sql = "INSERT INTO `{$table}` (userid,password,fname,mname,lname,email,year,dept) VALUES (concat('$cyear','$deptid','$maxid_padded'),'$password','$fname','$mname','$lname','$email','$year','$dept')";
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully at $cyear$deptid$maxid_padded";
	$_SESSION['added']="USER added with USER id ".$cyear.$deptid.$maxid_padded;
	$_SESSION['add']=1;
	header("Location: tab-student.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}