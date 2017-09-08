<?php
session_start();
if (!isset($_SESSION['aai'])){
  header("Location: login-index.php");
}

$duserid=$_SESSION['duserid'];
$dfname=$_SESSION['dfname'];
$dmname=$_SESSION['dmname'];
$dlname=$_SESSION['dlname'];
$demail=$_SESSION['demail'];
$dyear=$_SESSION['dyear'];
$ddept=$_SESSION['ddept'];
$dimage=$_SESSION['dimage'];

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/tab.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Welcome Admin</title>
</head>
<body class="bg">
  <div class="topnav pullUp">
    <a href="?logout">Logout</a>
    <?php
    if(isset($_GET['logout'])) {
      session_unset();
      header("Location: login-index.php");
    }
    ?>
    <a href="#">About</a>
    <a href="#">Help</a>
    <a class="developedby" href="#">Developed By</a>
  </div>
  <div class="admincard-bck">
    <!--Only For Login card Background-->
  </div>
  <div class="admincard">
    <div class="ctitle ">Details:<?php echo "$duserid"; ?> </div>
    <div class="tab-content"> 
      <form action="delete-student-php.php" method="post">
        <?php  

        echo 'Name: ' . $_SESSION['dfname'] ." ". $_SESSION['dmname'] ." ". $_SESSION['dlname'] . '<br/>'."\n";

        ?>

      </div>
      <div class="submit">
        <button  type="submit">Delete</button>
      </div>
    </form>


    <div class="footer">
      <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
    </div>
  </body>
  </html>