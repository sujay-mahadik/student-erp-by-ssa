<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['aai']))
	{header("Location: login-index.php");
}
$id=$_POST["uname"];
$_SESSION['showdelete']=0;
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
	$_SESSION['dtable_found']=$table_found;
	$_SESSION['duserid']=$row['userid'];
	$_SESSION['dfname']=$row['fname'];
	$_SESSION['dmname']=$row['mname'];
	$_SESSION['dlname']=$row['lname'];
	$_SESSION['daddress']=$row['address'];
	$_SESSION['demail']=$row['email'];
	$_SESSION['dyear']=$row['year'];
	$_SESSION['ddept']=$row['dept'];
	$_SESSION['dimage']=$row['image'];
	$_SESSION['searched']="1";
	$_SESSION['delete']='1';
	$_SESSION['showdelete']='1';
	header("Location: tab-student.php");
}
else{
	session_start();
	$_SESSION['search-errord'] = '*User ID not fount';
	$_SESSION['delete']='1';
	$_SESSION['showdelete']='0';
	header("Location: tab-student.php");
}
?>