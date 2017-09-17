<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['aoi'])){
	header("Location: login-index.php");
}
$id=$_POST["uname"];
$_SESSION['showcollect']=0;
$result = $conn->query("SHOW TABLES from erp LIKE '%db'");
$tables="";
$i=0;
while ($row = mysqli_fetch_array($result)) {
	$tables = $row[$i];
	$search_sql = "SELECT * FROM `{$tables}` where userid='$id'";
	$search_result = $conn->query($search_sql);
	if ($search_result->num_rows > 0) {
		$table_found = $tables;
	}
}
$table_found_sql = "SELECT * FROM `{$table_found}` where userid='$id'";
$table_found_result = $conn->query($table_found_sql);
if ($table_found_result->num_rows > 0) {
	session_start();
	$row = mysqli_fetch_array($table_found_result);
	$_SESSION['utable_found']=$table_found;
	$_SESSION['uuserid']=$row['userid'];
	$_SESSION['ufname']=$row['fname'];
	$_SESSION['umname']=$row['mname'];
	$_SESSION['ulname']=$row['lname'];
	$_SESSION['uemail']=$row['email'];
	$_SESSION['uaddress']=$row['address'];
	$_SESSION['uyear']=$row['year'];
	$_SESSION['udept']=$row['dept'];
	$_SESSION['uexamfees']=$row['examfees'];
	$_SESSION['ulibraryfine']=$row['libraryfine'];
	$_SESSION['uotherfees']=$row['otherfees'];
	$_SESSION['uimage']=$row['image'];
	$_SESSION['searched']="1";
	$_SESSION['collect']=1;
	$_SESSION['showcollect']='1';
	header("Location: office-fees.php");
}
else{
	session_start();
	$_SESSION['search-error'] = '*User ID not fount';
	$_SESSION['collect']='1';
	$_SESSION['showcollect']='0';
	header("Location: office-fees.php");
}
?>