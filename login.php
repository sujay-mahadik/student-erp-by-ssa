<?php
include_once 'includes/db_connect.php';
$id=$_POST["uname"];

$password=SHA1($_POST["upass"]);
$conn->query("delete * from table_name where column is NULL ");
$sql = "SELECT * FROM admin where userid='$id' and password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	session_start();
	$_SESSION['aai'] = 1;
	$_SESSION['id']=$id;
	$row = mysqli_fetch_array($result);
	$_SESSION['username']=$row['fname'];
	$_SESSION['image']=$row['image'];
	echo $row['image'];
	
	header("Location: admin-index.php");
}
else {
	$sql = "SELECT * FROM teacher where userid='$id' and password='$password'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		session_start();
		$_SESSION['ati'] = 1;
		$_SESSION['id']=$id;
		$row = mysqli_fetch_array($result);
		$_SESSION['username']=$row['fname'];
		$_SESSION['image']=$row['image'];
		$sql = "SELECT * FROM users ";
		$result = $conn->query($sql);
		$_SESSION['users']=$result->num_rows;
		header("Location: teacher-index.php");
	}
	else {
		$sql = "SELECT * FROM office where userid='$id' and password='$password'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			session_start();
			$_SESSION['aoi'] = 1;
			$_SESSION['id']=$id;
			$row = mysqli_fetch_array($result);
			$_SESSION['username']=$row['fname'];
			$_SESSION['post']=$row['post'];
			$_SESSION['image']=$row['image'];
			$sql = "SELECT * FROM users ";
			$result = $conn->query($sql);
			$_SESSION['users']=$result->num_rows;
			header("Location: office-index.php");
		}

		else{
			$result = $conn->query("SHOW TABLES from erp LIKE '%db'");
			$tables="";
			$i=0;
			while ($row = mysqli_fetch_array($result)) {
				$tables = $row[$i];
				$search_sql = "SELECT * FROM `{$tables}` where userid='$id' and password='$password' ";
				$search_result = $conn->query($search_sql);
				if ($search_result->num_rows > 0) {
					$table_found = $tables;
				}
			}
			$table_found_sql = "SELECT * FROM `{$table_found}` where userid='$id' and password='$password'";
			$table_found_result = $conn->query($table_found_sql);
			if ($table_found_result->num_rows > 0) {
				session_start();
				$_SESSION['id']=$id;
				$_SESSION['asi'] = 1;
				$row = mysqli_fetch_array($table_found_result);
				$_SESSION['username']=$row['fname']." ".$row['mname']." ".$row['lname'];
				$_SESSION['email']=$row['email'];
				$_SESSION['address']=$row['address'];
				$_SESSION['class']=$row['year']."-".$row['dept'];
				$_SESSION['examfees']=$row['examfees'];
				$_SESSION['libraryfine']=$row['libraryfine'];
				$_SESSION['otherfees']=$row['otherfees'];
				$_SESSION['totalfees']=$row['examfees']+$row['libraryfine']+$row['otherfees'];
				$_SESSION['image']=$row['image'];
				$_SESSION['foundtable']=substr($table_found,0,-2);
				header("Location: student-index.php");
			}
			else{
				session_start();
				$_SESSION['login-error'] = '*invalid details';
				header("Location: login-index.php");
			}
		}
	}
}
$conn->close();
?>