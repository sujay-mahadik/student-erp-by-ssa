<?php
include_once 'includes/db_connect.php';

session_start();
if (!isset($_SESSION['aoi'])){
	header("Location: login-index.php");
}
$id=$_SESSION['uuserid'];
$amount=$_POST['amount'];
$remarks=$_POST['remarks'];
$for=$_POST['for'];
$allpositive=0;
$table = $_SESSION['utable_found'];
//begin transaction
$conn->begin_transaction();

// Set autocommit to off
$conn->autocommit(FALSE);
//transaction
$sql=$conn->prepare("UPDATE `{$table}` SET `{$for}` = `{$for}` - '$amount' WHERE userid = '$id'");
//execute
$sql->execute();
//set flag for balance negative
$new_bal_sql = "SELECT * FROM `{$table}` where userid='$id'";
$bal_result = $conn->query($new_bal_sql);
if ($bal_result->num_rows > 0) {
	$row = mysqli_fetch_array($bal_result);
	$cexamfees=$row['examfees'];
	$clibraryfine=$row['libraryfine'];
	$cotherfees=$row['otherfees'];

	if ($cexamfees<0 OR $clibraryfine<0 OR $cotherfees<0) {
		$allpositive=0;
		# code...
	}
	else{
		$allpositive=1;
	}
}

//check negative flags
if (!($allpositive == 1) OR $amount<0) {
	$conn->rollback();
	$_SESSION['collect']=1;
	$_SESSION['showcollect']='0';
	$_SESSION['feeerrorc']="Error while collecting.. Rolled back transaction.. ";
	header("Location: office-fees.php");
	# code...
}
else{
	//close
	$sql->close();
	// Commit transaction
	$conn->commit();


	$new_bal_sql = "SELECT * FROM `{$table}` where userid='$id'";
	$bal_result = $conn->query($new_bal_sql);
	if ($bal_result->num_rows > 0) {
		$row = mysqli_fetch_array($bal_result);
		$_SESSION['uexamfees']=$row['examfees'];
		$_SESSION['ulibraryfine']=$row['libraryfine'];
		$_SESSION['uotherfees']=$row['otherfees'];
	}
	$_SESSION['collect']=1;
	$_SESSION['showcollect']='1';
	$_SESSION['feescollected']="Fees collected Succesfully";
	header("Location: office-fees.php");

}
?>