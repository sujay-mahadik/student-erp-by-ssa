<?php
include_once 'includes/db_connect.php';
session_start();
//if (!isset($_SESSION['aai']))
//  header("Location: login-index.php");

function drop_empty_tables(){
  $tables = mysql_query('SHOW TABLES');
  while($table = mysql_fetch_array($tables)){
    $table = $table[0];
    $records = mysql_query("SELECT * FROM $table");
    if(mysql_num_rows($records) == 0){
            // mysql_query("DROP TABLE $table");
      echo "DROP TABLE $table;\n";
    }
  }
}

drop_empty_tables();

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/admin-index.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Welcome Admin</title>

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

    <table>
      <thead>
        <tr>
          <th>USER ID</th>
          <th>NAME</th>
          <th>YEAR </th>
          <th>DEPT </th>      
        </tr>
      </thead>
      <tbody>
        <?php
        $allstudent = $conn->query("SHOW TABLES from erp LIKE '%db' ");
        $tables="";
        $i=0;
        while ($row = mysqli_fetch_array($allstudent)) {
          $allstudentresult = $conn->query("SELECT * FROM `{$row[$i]}` ");
          while($row=mysqli_fetch_array($allstudentresult,MYSQLI_ASSOC))
          {
            ?>
            <tr>
              <td><?php echo $row['userid']; ?></td>
              <td><?php echo $row['fname']; ?></td>
              <td><?php echo $row['year']; ?></td>
              <td><?php echo $row['dept']; ?></td>
            </tr>
            <?php
          }
        }

        
        ?>
      </tbody>
    </table>


  </div>
  <div class="footer">
    <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
  </div>
</body>
</html>




























<!--
<table>
  <thead>
    <tr>
      <th>USER ID.</th>
      <th>NAME.</th>
      <th>YEAR </th>        
    </tr>
  </thead>
  <tbody>
    <?php
    $result = $conn->query("SHOW TABLES from erp LIKE '%db'");
    $tables="";
    $i=0;
    while ($row = mysqli_fetch_array($result)) {
      $tables = $row[$i];
    }
    $query="SELECT * FROM `{$tables}` ";
    $result = mysqli_query($conn, $query)or die(mysqli_error($conn));
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
      ?>
      <tr>
        <td><?php echo $row['userid']; ?></td>
        <td><?php echo $row['fname']; ?></td>
        <td><?php echo $row['year']; ?></td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
-->




