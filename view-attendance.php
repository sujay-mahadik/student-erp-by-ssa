<?php
include_once"includes/db_connect.php";
session_start();

if (!isset($_SESSION['asi']))
  header("Location: login-index.php");


?>




<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/tab.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Welcome Admin</title>
  <style type="text/css">
    .box{
      padding:20px;
      margin: 10px;
    }
  </style>
</head>
<body class="bg">
  <div class="topnav pullUp">
    <a href="?adminhome">Home</a>
    <?php
    if(isset($_GET['adminhome'])) {
      header("Location: admin-index.php");
    }
    ?>
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
    <div class="tab">
      <a class="containertitle ">Student</a>


    </div>
    <div class="box">

        <?php

        $tabledisplay=$_SESSION['foundtable']."am";
        $id=$_SESSION['id'];
        $allstudentresult = $conn->query("SELECT * FROM `{$tabledisplay}` where userid='$id'");
        $row=mysqli_fetch_array($allstudentresult,MYSQLI_ASSOC);
        $idd=99;
        $allstudentresult1 = $conn->query("SELECT * FROM `{$tabledisplay}` where userid='$idd'");
        $row1=mysqli_fetch_array($allstudentresult1,MYSQLI_ASSOC);
        $subj1=(($row['subj1']/$row1['subj1'])*450);
        $subj2=(($row['subj2']/$row1['subj2'])*450);
        echo $subj1;
        echo $subj2;
        ?>


        <canvas id="myCanvas" width="600" height="450"
        style="border-left:1px solid #000000 ;border-bottom: 1px solid #000000; ">
        Your browser does not support the canvas element.
        </canvas>

        <script>
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        ctx.fillStyle = "rgba(255, 0, 0, 0.5)";
        var sub='<?php echo $subj1?>'
        ctx.fillRect(59,450-sub,50,450);
        ctx.fillStyle = "rgba(255, 255, 0, 0.5)";
        var subj='<?php echo $subj2?>'
        ctx.fillRect(159,450-subj,50,450);
        ctx.fillStyle = "rgba(255, 255, 18, 0.5)";
        ctx.fillRect(277,200,50,450);
        ctx.fillStyle = "rgba(255, 255, 45, 0.5)";
        ctx.fillRect(386,200,50,450);
        ctx.fillRect(495,200,50,450);



        </script>





</div>
  </div>


  <div class="footer">
    <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
  </div>

</body>
</html>







