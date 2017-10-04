<?php
include_once 'includes/db_connect.php';


session_start();
if (!isset($_SESSION['aoi'])){
	header("Location: login-index.php");
}
$year=$_POST['year'];
$dept=$_POST['dept'];
$amount=$_POST['amount'];
$for=$_POST['for'];

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
//begin transaction
$conn->begin_transaction();

// Set autocommit to off
$conn->autocommit(FALSE);
//transaction
$sql=$conn->prepare("UPDATE `{$table}` SET `{$for}` = `{$for}` + '$amount'");

if ($amount<0 || !$sql->execute()) {
	$conn->rollback();
	$_SESSION['issuemany']=1;
	$_SESSION['showissuemany']='0';
	$_SESSION['feeerrormany']="Error while issuing.. Rolled back transaction.. Retry after some time";
	header("Location: office-fees.php");
	# code...
}
else{

	$sql->close();
	// Commit transaction
	$conn->commit();


	$new_bal_sql = "SELECT * FROM `{$table}` where userid='$id'";
	$bal_result = $conn->query($new_bal_sql);
	if ($bal_result->num_rows > 0) {
		$row = mysqli_fetch_array($bal_result);
		$_SESSION['ubalance']=$row['balance'];
	}
	$_SESSION['issuemany']=1;
	$_SESSION['showissuemany']='1';
	$_SESSION['feesissuedmany']="Fees Issued Succesfully";
	header("Location: office-fees.php");

}
?>