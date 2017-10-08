<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['asi'])){
  header("Location: login-index.php");

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/tab.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Welcome Student</title>
</head>
<body class="bg">
  <div class="topnav pullUp">
    <a href="#">About</a>
    <a href="#">Help</a>
    <a  href="#">Developed By</a>
  </div>
  <div class="admincard-bck">
    <!--Only For Login card Background-->
  </div>
  <div class="admincard">
    <div class="tab">
      <a class="containertitle ">Select class and subject</a>
      <div class="logout-button">
        <a href="?logout">Logout</a>
        <?php
        if(isset($_GET['logout'])) {
          session_unset();
          header("Location: login-index.php");
        }
        ?>
      </div>
      <div class="home-button">
        <a href="student-index.php">Home</a>
      </div>

    </div>
    <form action="update-password.php" method="post">
        <ul class="form-style">
<li>
          <?php echo $_SESSION['passmsg']; ?>
        </li>
          <li><label>Enter Current Password <span class="required">*</span></label>
            <input type="password" name="cpass" class="field-divided" placeholder="Current Password" required="required" title="Current Password" >

          </li>
          <li><label>Enter New Password <span class="required">*</span></label>
            <input type="password" name="npass" class="field-divided" placeholder="New Password" required="required" title="New Password" >

          </li>
          <li><label>Re-enter New Password <span class="required">*</span></label>
            <input type="password" name="cnpass" class="field-divided" placeholder="New Password" required="required" title="New Password" >

          </li>


        <li>
          <div class="submit">
            <button  type="submit">Submit</button>
          </div>
        </li>


      </ul>
    </form>
    </div>
    <div class="footer">
      <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
    </div>
  </body>
  </html>