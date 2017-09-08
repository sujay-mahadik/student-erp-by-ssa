<?php
if (isset($_SESSION['admin'])){
	header("Location: admin-index.php");
}

if (isset($_SESSION['student'])){
	header("Location: student-index.php");
}
?>