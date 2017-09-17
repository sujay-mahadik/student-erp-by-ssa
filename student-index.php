<?php
session_start();

if (!isset($_SESSION['asi'])){
    header("Location: login-index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/student-index.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Student</title>
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
        <form action="">
            <div class="containertitle"><div class="profile-image" style="background-image: url(<?php echo $_SESSION['image'];?>); background-repeat: no-repeat;background-position: center;">
            </div>WELCOME <?php echo $_SESSION['username'] ?>
        </div>
        <div class="container-tabs">
            <div class="tabs">
                    <!--<div class="pic" style="background-image: url(<?php echo $_SESSION['profile_img'];?>); background-repeat: no-repeat;background-position: center; ">
                </div>-->
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
                    <a href="#"><span></span></a>
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