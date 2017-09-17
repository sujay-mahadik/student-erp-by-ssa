<?php
include_once 'includes/db_connect.php';

session_start();
if (!isset($_SESSION['aoi'])){
	header("Location: login-index.php");
}
$id=$_SESSION['uuserid'];
$amount=$_POST['amount'];
$for=$_POST['for'];
$table = $_SESSION['utable_found'];
//begin transaction
$conn->begin_transaction();

// Set autocommit to off
$conn->autocommit(FALSE);
//transaction
$sql=$conn->prepare("UPDATE `{$table}` SET `{$for}` = `{$for}` + '$amount' WHERE userid = '$id'");
//check if amount is negative
if ($amount<0 || !$sql->execute()) {
	$conn->rollback();
	$_SESSION['issue']=1;
	$_SESSION['showissue']='0';
	$_SESSION['feeerror']="Error while issuing.. Rolled back transaction.. Retry after some time";
	header("Location: office-fees.php");
	# code...
}
else{

	$sql->close();
	// Commit transaction
	$conn->commit();

	//update balance in view in office-fees.php
	$new_bal_sql = "SELECT * FROM `{$table}` where userid='$id'";
	$bal_result = $conn->query($new_bal_sql);
	if ($bal_result->num_rows > 0) {
		$row = mysqli_fetch_array($bal_result);
		$_SESSION['uexamfees']=$row['examfees'];
		$_SESSION['ulibraryfine']=$row['libraryfine'];
		$_SESSION['uotherfees']=$row['otherfees'];
	}
	$_SESSION['issue']=1;
	$_SESSION['showissue']='1';
	$_SESSION['feesissued']="Fees Issued Succesfully";
	header("Location: office-fees.php");

}
?>