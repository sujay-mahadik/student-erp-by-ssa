<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['ati'])){
  header("Location: login-index.php");
}
$year=$_POST["year"];
$dept=$_POST["dept"];
if($dept == "civil"){
  $deptid = "1";
}
elseif($dept == "computer"){
  $deptid = "2";
}
elseif($dept == "it"){
  $deptid = "3";
}
elseif ($dept == "entc") {
  $deptid = "4";
}
elseif ($dept == "mechanical") {
  $deptid = "5";
}
else{
  echo "Dept not available";
}


if($year == "fe"){
  $cyear = date('y');
}
elseif($year == "se"){
  $cyear = date('y')-"1";
}
elseif($year == "te"){
  $cyear = date('y')-"2";
}
else{
  echo "year not available";
}
$_SESSION['tabledsp']=$cyear.$dept."db";
$_SESSION['tablemrk']=$cyear.$dept."am";

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/tab.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>View Overall Attendance</title>
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
    <div class="tab">
      <a class="containertitle ">View Attendance</a>
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
        <a href="teacher-index.php">Home</a>
      </div>

    </div>
    <div class="att-list">

      <table>
        <thead>
          <tr>
            <th class="attendance">USER ID</th>
            <th class="attendance">NAME</th>
            <th class="attendance">Total Attendance</th>
            <th class="attendance">View Subjectwise</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $tablecalctotal=$_SESSION['tablemrk'];
          $totalquery = $conn->query("SELECT * FROM `{$tablecalctotal}` where userid=99 ");
          $rowtotal=mysqli_fetch_array($totalquery,MYSQLI_ASSOC);
          $totallecs=$rowtotal['subj1']+$rowtotal['subj2']+$rowtotal['subj3']+$rowtotal['subj4']+$rowtotal['subj5'];
          $tabledisplay=$_SESSION['tabledsp'];
          $allstudentresult = $conn->query("SELECT * FROM `{$tabledisplay}` ");
          while($row=mysqli_fetch_array($allstudentresult,MYSQLI_ASSOC))
          {
            $idv=$row['userid'];
            $totalquerycalc = $conn->query("SELECT * FROM `{$tablecalctotal}` where userid='$idv' ");
            $rowtotalcalc=mysqli_fetch_array($totalquerycalc,MYSQLI_ASSOC);
            $totalattended=$rowtotalcalc['subj1']+$rowtotalcalc['subj2']+$rowtotalcalc['subj3']+$rowtotalcalc['subj4']+$rowtotalcalc['subj5'];
            $totalpercentage=($totalattended/$totallecs)*100;

            ?>
            <tr>
              <td class="row-userid"><?php echo $row['userid']; ?></td>
              <td class="row-name"><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></td>

              <td><?php echo number_format((float)$totalpercentage, 2, '.', '');?></td>
              <td><a href="view-subjwise.php?table=<?php echo $tablecalctotal?>&id=<?php echo $idv?>&name=<?php echo $row['fname']?>" target="_blank" >Click here</a></td>
            </tr>
            <?php
          }

          ?>
        </tbody>
      </table>





    </div>

  </div>


  <div class="footer">
    <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
  </div>

</body>
</html>

