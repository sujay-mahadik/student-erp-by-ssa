<?php
include_once 'includes/db_connect.php';
session_start();

$doc_name =$_POST['doc_name'];
echo $doc_name;
$name =$_FILES['myfile']['name'];
$tmp_name =$_FILES['myfile']['tmp_name'];
echo $tmp_name;
$year=$_POST['year'];
$dept=$_POST['dept'];
if($year == "fe"){
	$cyear = date('y');
}
elseif($year == "se"){
	$cyear = date('y')-"1";
}
elseif($year == "te"){
	$cyear = date('y')-"2";
}
elseif($year == "be"){
	$cyear = date('y')-"3";
}
else{
	echo "year not available";
}

$Location = "docs/".$name;
echo $Location;
move_uploaded_file($tmp_name, $Location);


$query="INSERT INTO docs (name,loc,year,dept) VALUES ('$doc_name','$Location','$cyear','$dept')";
$result=$conn->query($query);
$_SESSION['fuploadedmsg']="Upload Success";
header("Location:upload.php");



?>