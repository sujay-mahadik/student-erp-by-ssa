



 <!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/tab.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Welcome Admin</title>
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

    <form >
      <ul class="form-style">

        <?php
include_once 'includes/db_connect.php';
session_start();
    $year=substr($_SESSION['foundtable'],0,2);
    //echo $year;
    $dept=substr($_SESSION['foundtable'],2);
    //echo $dept;

    $query="SELECT * FROM docs where year='$year' and dept='$dept'";
    $result=$conn->query($query);

while ($row =mysqli_fetch_array($result,MYSQLI_ASSOC)) {

    $id   = $row['id'];
    $name = $row['name'];
    $loc  = $row['loc'];

    echo "   " . $name ."      <a href='download.php?dow=$loc'>Download</a><br><br>";

}

 ?>

      </ul>
    </form>

  </div>


  <div class="footer">
    <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
  </div>

</body>
</html>