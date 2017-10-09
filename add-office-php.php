<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['aai']))
    {header("Location: login-index.php");
}
//$name=$_POST["uid"];
//$name_padded = sprintf("%03d", $name);
$password=SHA1(12345678);
$balance=0;
$fname=$_POST["firstname"];
$mname=$_POST["middlename"];
$lname=$_POST["lastname"];
$address=$_POST["address"];
$email=$_POST["email"];
$post=$_POST["post"];
$tablecreate="CREATE TABLE IF NOT EXISTS office (
`userid` int(11) PRIMARY KEY,
`fname` varchar(50) NOT NULL,
`mname` varchar(50) ,
`lname` varchar(50) ,
`address` varchar(100) NOT NULL,
`email` varchar(50) NOT NULL,
`post`  varchar(50) NOT NULL,
`balance` int(10) ,
`image` varchar(1024) default 'profile-image/default.png',
FOREIGN KEY (userid) REFERENCES users(userid) ON DELETE CASCADE
)";

$conn->query($tablecreate);

$maxuseridsql = mysqli_query($conn, "SELECT MAX(userid) AS maxuserid FROM office");
$row = mysqli_fetch_assoc($maxuseridsql);
$maxuserid = $row['maxuserid'];
echo $maxuserid;
if($maxuserid=="")
{
    $maxuserid=300;

}

$maxuserid = $maxuserid + 1;
$sql = "INSERT INTO users VALUES ('$maxuserid','$password','o')";
$conn->query($sql);
$sql = "INSERT INTO office (userid,fname,mname,lname,address,email,post,balance) VALUES ('$maxuserid','$fname','$mname','$lname','$address','$email','$post',0)";
$conn->query($sql);
    $_SESSION['added']="office added with USER ID :".$maxuserid." default password password";
    $_SESSION['add']=1;
    header("Location: tab-office.php");






?>