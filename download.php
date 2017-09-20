<?php
include_once 'includes/db_connect.php';
session_start();

if(isset($_GET['dow']))
{
	$loc = $_GET['dow'];

	$res = mysqli_query("SELECT * FROM docs WHERE loc='$loc'");

	/*header('Content-Type:application/octet-stream');
	header('Content-Disposition: attachment; filename:"'.basename($loc).'"');
	header('Content-Length:' .filesize($loc));
	readfile($loc);*/

	if (file_exists($loc)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($loc).'"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($loc));
    ob_clean();
    flush();
    readfile($loc);
    exit;
}

}

?>