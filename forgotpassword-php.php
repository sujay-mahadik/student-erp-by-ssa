<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "erp";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

session_start();

$id= $_POST['uname'];
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

$password=generateRandomString();
$newpass=sha1($password);
$sql = "call updatepassword('$newpass','$id')";
$conn->query($sql);


$sql = "SELECT * FROM admin where userid='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


	$row = mysqli_fetch_array($result);
	$email=$row['email'];
}




$sql = "SELECT * FROM teacher where userid='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


	$row = mysqli_fetch_array($result);


	$email=$row['email'];
}



$sql = "SELECT * FROM office where userid='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


	$row = mysqli_fetch_array($result);
	$email=$row['email'];
}


$result = $conn->query("SHOW TABLES from erp LIKE '%db'");
$tables="";
$i=0;
while ($row = mysqli_fetch_array($result)) {
	$tables = $row[$i];
	$search_sql = "SELECT * FROM `{$tables}` where userid='$id' ";
	$search_result = $conn->query($search_sql);
	if ($search_result->num_rows > 0) {
		$table_found = $tables;
		echo $table_found;
	}
}
$table_found_sql = "SELECT * FROM `{$table_found}` where userid='$id' ";
$table_found_result = $conn->query($table_found_sql);
if ($table_found_result->num_rows > 0) {




	$row = mysqli_fetch_array($table_found_result);
	$email=$row['email'];


}


require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;


				$mail->isSMTP();                                   // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                            // Enable SMTP authentication
				$mail->Username = 'erpbyssa@gmail.com';          // SMTP username
				$mail->Password = '123erp@ssa'; // SMTP password add ur mailing id password
				$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                 // TCP port to connect to

				$mail->setFrom('erpbyssa@gmail.com');
				$mail->addReplyTo('erpbyssa@gmail.com');
				$mail->addAddress($email);   // Add a recipient
				//$mail->addCC('cc@example.com');
				//$mail->addBCC('bcc@example.com');

				$mail->isHTML(true);  // Set email format to HTML

				$bodyContent = "New password for ".$id."is :".$password." dont share this password with anyone ";

				$mail->Subject = 'New password for your erp';
				$mail->Body    = $bodyContent;

				if(!$mail->send()) {


					echo "Message could not be sent.";


				} else {

					$_SESSION['msg']="A mail is sent to ".$email." containing a new password ";
					header("Location: forgotpassword.php");


				}


				?>