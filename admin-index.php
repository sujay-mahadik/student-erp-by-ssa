<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['aai']))
  {header("Location: login-index.php");
}
$_SESSION['logedout']="*You have been logged out";
$result = $conn->query("SHOW TABLES from erp LIKE '%db'");
$scount=0;
while ($row = mysqli_fetch_array($result)) {
  $tables = $row[0];
  $search_result = $conn->query("SELECT * FROM `{$tables}`");
  $search_count = $search_result->num_rows;
  $scount=$scount+$search_count;
}
$_SESSION['scount']=$scount;
$tcount_q= $conn->query("SELECT * FROM teacher");
$tcount=$tcount_q->num_rows;
$ocount_q= $conn->query("SELECT * FROM office");
$ocount=$ocount_q->num_rows;
$acount_q= $conn->query("SELECT * FROM admin");
$acount=$acount_q->num_rows;
$userid = $_SESSION['id'];
$admininfo="SELECT * FROM admin WHERE userid = '$userid'";
$admininfoquery =  $conn->query($admininfo);
$row = mysqli_fetch_array($admininfoquery);
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/admin-index.css">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Welcome Admin</title>
</head>
<body class="bg">
  <div class="topnav pullUp">
    <a href="#">About</a>
    <a href="#">Help</a>
    <a href="#">Developed By</a>
  </div>
  <div class="admincard-bck">
    <!--Only For Login card Background-->
  </div>
  <div class="admincard">
    <form action="">
      <div class="containertitle ">
        <div class="profile-image" style="background-image: url(<?php echo $_SESSION['image'];?>); background-repeat: no-repeat;background-position: center;">
        </div>Welcome <?php echo $row['fname']; ?>
        <div class="logout-button">
          <a href="?logout">Logout</a>
          <?php
          if(isset($_GET['logout'])) {
            session_unset();
            header("Location: login-index.php");
          }
          ?>
        </div>

      </div>
      <div class="container-tabs">
        <div class="tabs">
          <div class="tabinfo">

            <li>
              <b><u>Personal Details</u></b>
            </li>
            <li>
              <b>Name:</b> <?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?>
            </li>
            <li>
              <b>Email:</b> <?php echo $row['email']; ?>
            </li>
            <li>
              <b>Address:</b> <?php echo $row['address']; ?>
            </li>
          </div>
        </div>
        <div class="tabs">
          <div class="tabs">
            <div id="tab-click" class="tabss blue student-icon">
              <h1><?php echo $_SESSION['scount'] ?></h1>
              <h1 class="small">Students</h1>
              <h3>Add New/ Update</h3>
              <a href="?newstudent"><span></span></a>
              <?php
              if(isset($_GET['newstudent'])) {
                $_SESSION['newstudent'] = 1;
                header("Location: tab-student.php ");
                unset($_GET['newstudent']);
              }
              ?>
            </div>
            <div id="tab-click" class="tabss red teacher-icon">
              <h1><?php echo $tcount; ?></h1>
              <h1 class="small">Teachers</h1>
              <h3>Add New/ Update</h3>
              <a href="?newteacher"><span></span></a>
              <?php
              if(isset($_GET['newteacher'])) {
                $_SESSION['newteacher'] = 1;
                header("Location: tab-teacher.php ");
                unset($_GET['newteacher']);
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="container-tabs">
        <div class="tabs">
        </div>
        <div class="tabs">
          <div id="tab-click" class="tabss orange librarian-icon">
            <h1><?php echo $acount; ?></h1>
            <h1 class="small">Admin</h1>
            <h3>Add New/ Update</h3>
            <a href="?newadmin"><span></span></a>
            <?php
            if(isset($_GET['newadmin'])) {
              $_SESSION['newadmin'] = 1;
              header("Location: tab-admin.php ");
              unset($_GET['newadmin']);
            }
            ?>
          </div>
          <div id="tab-click" class="tabss green office-icon">
            <h1><?php echo $ocount; ?></h1>
            <h1 class="small">Office</h1>
            <h3>Add New/ Update</h3>
            <a href="?newoffice"><span></span></a>
            <?php
            if(isset($_GET['newoffice'])) {
              $_SESSION['newoffice'] = 1;
              header("Location: tab-office.php ");
              unset($_GET['newoffice']);
            }
            ?>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="footer">
    <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
  </div>
</body>
</html>
