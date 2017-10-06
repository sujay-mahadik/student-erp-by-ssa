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
`userid` int(11) PRIMARY KEY,

`fname` varchar(50) NOT NULL,
`mname` varchar(50) ,
`lname` varchar(50) ,
`address` varchar(100) NOT NULL,
`email`	varchar(50) NOT NULL,
`year`  varchar(50) NOT NULL,
`dept`  varchar(50) NOT NULL,
`image` varchar(1024) default 'profile-image/default.png',
`examfees` int(10),
`libraryfine` int(10),
`otherfees` int(10),
`remarks` varchar(50),
FOREIGN KEY (userid) REFERENCES users(userid) ON DELETE CASCADE
)";

$conn->query($newtable);
$tableat=$cyear.$dept."am";
$maxuseridsql = mysqli_query($conn, "SELECT MAX(userid) AS maxuserid FROM `{$table}`");
$row = mysqli_fetch_assoc($maxuseridsql);
$maxuserid = $row['maxuserid'];
echo $maxuserid;
if($maxuserid=="")
{
    $maxuserid=$start=$cyear.$deptid."000";

    $newtableattendance = "CREATE TABLE If NOT EXISTS `{$tableat}` (
		`userid` int(11),
		`subj1` int DEFAULT 0,
		`subj2` int DEFAULT 0,
		`subj3` int DEFAULT 0,
		`subj4` int DEFAULT 0,
		`subj5` int DEFAULT 0,
		FOREIGN KEY (userid) REFERENCES `{$table}`(userid) ON DELETE CASCADE
	)";
	$conn->query($newtableattendance);
    $attendanceid=substr($maxuserid,0,3);
    $sql="INSERT into attendance (userid) values ($attendanceid)";
        $conn->query($sql);
}

$maxuserid = $maxuserid + 1;
$sql = "INSERT INTO users VALUES ('$maxuserid','$password','s')";
$conn->query($sql);
$sql = "INSERT INTO `{$table}` (userid,fname,mname,lname,address,email,year,dept) VALUES ('$maxuserid','$fname','$mname','$lname','$address','$email','$year','$dept')";
$conn->query($sql);
    $_SESSION['added']="Student added with USER ID :".$maxuserid." default password password";
    $_SESSION['add']=1;
    $sql="INSERT into `{$tableat}`(userid) values ($maxuserid)";
		$conn->query($sql);
    header("Location: tab-student.php");



















?>