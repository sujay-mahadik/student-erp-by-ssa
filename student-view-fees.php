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
        <a href="student-index.php">Home</a>
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
            </div>FEES</div>
            <div class="view-fee">
                <ul>
                    <li>
                        Exam Fees : Rs. <?php echo $_SESSION['examfees']; ?>
                    </li>
                    <li>
                        Library Fine : Rs. <?php echo $_SESSION['libraryfine']; ?>
                    </li>
                    <li>
                        Other Fees : Rs. <?php echo $_SESSION['otherfees']; ?>
                    </li>
                </ul>
            </div>
        </form>
    </div>
    <div class="footer">
        <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
    </div>
</body>
</html>