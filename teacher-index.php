<?php
include_once 'includes/db_connect.php';

session_start();

if (!isset($_SESSION['ati'])){
    header("Location: login-index.php");
}
$_SESSION['logedout']="*You have been logged out";
$userid = $_SESSION['id'];
$admininfo="SELECT * FROM teacher WHERE userid = '$userid'";
$admininfoquery =  $conn->query($admininfo);
$row = mysqli_fetch_array($admininfoquery);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/teacher-index.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"> 

    <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
    <title>Teacher</title>
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
                <div id="tab-click" class="tabss blue tt-icon">
                    <h1>View TimeTable</h1>
                    <a href="#"><span></span></a>
                </div>
                <div id="tab-click" class="tabss red attend-icon">
                    <h1>Mark Attendance</h1>
                    <a href="attendance.php"><span></span></a>
                </div>
            </div>
        </div>
        <div class="container-tabs">
            <div class="tabs">
            </div>
            <div class="tabs">
                <div id="tab-click" class="tabss orange marks-icon">
                    <h1>Update Marks</h1>
                    <a href="#"><span></span></a>
                </div>
                <div id="tab-click" class="tabss green notes-icon">
                    <h1>Upload Notes</h1>
                    <a href="upload.php"><span></span></a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php unset($_SESSION['loggedin']); ?>
<div class="footer">
    <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
</div>
</body>
</html>