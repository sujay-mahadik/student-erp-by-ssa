<?php
include_once 'includes/db_connect.php';
session_start();
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
$_SESSION['subj']=$_POST['subj'];
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

    <a href="#">About</a>
    <a href="#">Help</a>
    <a href="#">Developed By</a>
  </div>
  <div class="admincard-bck">
    <!--Only For Login card Background-->
  </div>
  <div class="admincard">
    <div class="tab">
      <a class="containertitle ">Mark Attendance</a>
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
      <form action="trial.php" method="post">
        <table>
          <thead>
            <tr>
              <th class="attendance">USER ID</th>
              <th class="attendance">NAME</th>
              <th class="attendance">Mark Present</th>

            </tr>
          </thead>
          <tbody>
            <?php

            $tabledisplay=$_SESSION['tabledsp'];
            $allstudentresult = $conn->query("SELECT * FROM `{$tabledisplay}` ");
            while($row=mysqli_fetch_array($allstudentresult,MYSQLI_ASSOC))
            {
              ?>
              <tr>
                <td class="row-userid"><?php echo $row['userid']; ?></td>
                <td class="row-name"><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></td>
                
                <td><input type="checkbox" name="<?php echo $row['userid']; ?>" id="<?php echo $row['userid']; ?>" class="css-checkbox" /><label for="<?php echo $row['userid']; ?>" class="css-label"></label></td>
              </tr>
              <?php
            }

            ?>
          </tbody>
        </table>
        
        <div class="submit attendance-submit">
          <button type="submit" >SUBMIT</button>
        </div>
        
        
      </form>
    </div>

  </div>


  <div class="footer">
    <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
  </div>

</body>
</html>





















