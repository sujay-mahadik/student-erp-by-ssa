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


?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/login-index.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">

  <title>Forgot Password</title>
</head>
<body class="bg">
  <div class="topnav pullUp">
    <a href="#">About</a>
    <a href="#">Help</a>
    <a href="developed.php">Developed By</a>
</div>
<div class="logincard-bck">
    <!--Only For Login card Background-->
</div>
<div class="logincard">
    <form action="forgotpassword-php.php" method="post" autocomplete="off">
        <div class="container-login-title">Login
            <div class="home-button">
                <a href="login-index.php"></a>
            </div>
        </div>
        <div class="container-input-fields">
            <input type="text" placeholder="User ID" onfocus="this.placeholder = 'User ID'" onblur="this.placeholder = 'User ID'" name="uname" required="required">

            <br>

            <?php echo $_SESSION['msg']?>

            <div class="submit">
                <button type="submit">Submit</button>
            </div>

        </div>


    </body>
    </html>