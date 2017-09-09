<?php
include_once 'includes/db_connect.php';

$newtable = "CREATE TABLE If NOT EXISTS teacher (
`id` int(11) AUTO_INCREMENT PRIMARY KEY,
`userid` int(11) NOT NULL,
`password` varchar(40) NOT NULL,
`fname` varchar(50) NOT NULL,
`mname` varchar(50) NOT NULL,
`lname` varchar(50) NOT NULL,
`email` varchar(50) NOT NULL,

`image` varchar(1024)
)";
if($conn->query($newtable) === TRUE){
    echo "table create or present";
}
$password=SHA1($_POST["upass"]);
$fname=$_POST["firstname"];
$mname=$_POST["middlename"];
$lname=$_POST["lastname"];
$email=$_POST["email"];
$maxidsql = mysqli_query($conn, "SELECT MAX(id) AS maxid FROM teacher");
$row = mysqli_fetch_assoc($maxidsql);
$maxid = $row['maxid']+"1";
$maxid_padded = sprintf("%03d", $maxid);
$sql = "INSERT INTO teacher (userid,password,fname,mname,lname,email) VALUES ('$maxid','$password','$fname','$mname','$lname','$email')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully at $cyear$deptid$maxid_padded";
    $_SESSION['added']="USER added with USER id ".$cyear.$deptid.$maxid_padded;
    $_SESSION['add']=1;
    header("Location: tab-teacher.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>