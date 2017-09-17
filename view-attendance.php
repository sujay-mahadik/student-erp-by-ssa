<?php
include_once"includes/db_connect.php";
session_start();

if (!isset($_SESSION['asi']))
  header("Location: login-index.php");


?>




<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="css/tab.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Welcome Admin</title>
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
    <div class="tab">
      <a class="containertitle "><?php echo $_SESSION['username']; ?> : Attendance graph</a>
      

    </div>
    <?php

    $tabledisplay=$_SESSION['foundtable']."am";
    $id=$_SESSION['id'];
    $allstudentresult = $conn->query("SELECT * FROM `{$tabledisplay}` where userid='$id'");
    $row=mysqli_fetch_array($allstudentresult,MYSQLI_ASSOC);
    $idd=99;
    $allstudentresult1 = $conn->query("SELECT * FROM `{$tabledisplay}` where userid='$idd'");
    $row1=mysqli_fetch_array($allstudentresult1,MYSQLI_ASSOC);

    ?>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      var psubj1 = <?php echo $row['subj1']; ?> ;
      var psubj2 = <?php echo $row['subj2']; ?> ;
      var tsubj1 = <?php echo $row1['subj1']; ?> ;
      var tsubj2 = <?php echo $row1['subj2']; ?> ;

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['','Present', 'Absent', 'Total Lecture'],
          ['Subject 1', psubj1, tsubj1-psubj1, tsubj1],
          ['Subject 2', psubj2, tsubj2-psubj2, tsubj2],
          ['Subject 3', psubj1, tsubj1-psubj1, tsubj1],
          ['Subject 4', psubj2, tsubj2-psubj2, tsubj2],

          ['Subject 5', psubj1, tsubj1-psubj1, tsubj1],
          ['Subject 6', 30, 20, 50],


          ]);

        var options = {
          chartArea:{
            fontSize:20,

          },

          bars: 'vertical',
          backgroundColor: 'none',
          fontSize: 20,

          legend:{textStyle:{fontSize:20, color: 'black'}},
          vAxis: { format: '0', textStyle:{fontSize:20, color: 'black'}, gridlines:{count: tsubj1}},
          hAxis: {textStyle:{fontSize:20, color: 'black'}},
          
          colors: ['#6fbe44', '#c5283d', '#02608e']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
    </script>
    <div id="chart_div" style="height: inherit; width: inherit; padding: 30px;" ></div>
    <!--
    <table>
      <thead>
        <tr>
          <th>USER ID</th>
          <th>subj1</th>
          <th>subj2</th>

          
        </tr>
      </thead>
      <tbody>

        <tr>
          <td><?php echo $row['userid']; ?></td>
          <td><?php echo $row['subj1']; ?>/<?php echo $row1['subj1']; ?></td>
          <td><?php echo $row['subj2']; ?>/<?php echo $row1['subj2']; ?></td>

        </tr>
        <?php


        ?>
      </tbody>
    </table>
  -->

</div>


<div class="footer">
  <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
</div>

</body>
</html>

