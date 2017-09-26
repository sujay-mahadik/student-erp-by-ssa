<?php
include_once 'includes/db_connect.php';
session_start();

if (!isset($_SESSION['asi'])){
    header("Location: login-index.php");
}
$userid = $_SESSION['id'];
$stf = $_SESSION['stf'];
$sinfo="SELECT * FROM `{$stf}` WHERE userid = '$userid'";
$sinfo_q =  $conn->query($sinfo);
$row = mysqli_fetch_array($sinfo_q);
$_SESSION['fname']=$row['fname'];
$_SESSION['mname']=$row['mname'];
$_SESSION['lname']=$row['lname'];
$_SESSION['email']=$row['email'];
$_SESSION['address']=$row['address'];
$_SESSION['class']=$row['year']."-".$row['dept'];
$_SESSION['examfees']=$row['examfees'];
$_SESSION['libraryfine']=$row['libraryfine'];
$_SESSION['otherfees']=$row['otherfees'];
$_SESSION['totalfees']=$row['examfees']+$row['libraryfine']+$row['otherfees'];
$_SESSION['image']=$row['image'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/student-index.css">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"> 

  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Student</title>
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
            <div class="containertitle"><div class="profile-image" style="background-image: url(<?php echo $_SESSION['image'];?>); background-repeat: no-repeat;background-position: center;">
            </div>WELCOME <?php echo $row['fname']; ?>
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
                    <!--<div class="pic" style="background-image: url(<?php echo $_SESSION['profile_img'];?>); background-repeat: no-repeat;background-position: center; ">
                    </div>-->
                    <div class="tabinfo">
                     <li>
                        Name: <?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?>
                    </li>
                    <li>
                        Email: <?php echo $row['email']; ?>
                    </li>
                    <li>
                        Address: <?php echo $row['address']; ?>
                    </li>

                </div>
            </div>
            <div class="tabs">
                <div id="tab-click" class="tabss blue tt-icon">
                    <h1>My TimeTable</h1>
                    <a href="#"><span></span></a>
                </div>
                <div id="tab-click" class="tabss red attend-icon">
                    <h1>My Attendance</h1>
                    <a href="view-attendance.php"><span></span></a>
                </div>
            </div>
        </div>
        <div class="container-tabs">
            <div class="tabs">
            </div>
            <div class="tabs">
                <div id="tab-click" class="tabss orange fees-icon">
                    <h1>Fees: Rs.<?php echo $_SESSION['totalfees']; ?></h1>
                    <a href="student-view-fees.php"><span></span></a>
                </div>
                <div id="tab-click" class="tabss green notes-icon">
                    <h1>My Notes</h1>
                    <a href="update-profile-student.php"><span></span></a>
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