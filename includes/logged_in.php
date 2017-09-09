<?php
if ($_SESSION['admin'] == 1){
	header("Location: admin-index.php");
}

if (isset($_SESSION['student'])){
	header("Location: student-index.php");
}
?>