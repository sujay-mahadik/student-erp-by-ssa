<?php
session_start();
if (!isset($_SESSION['aai']))
  header("Location: login-index.php");

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/admin-index.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Welcome Admin</title>
  <script type="text/javascript">
    function toggle(obj1,obj2){
      var ele1 = document.getElementById(obj1);
      var ele2 = document.getElementById(obj2);
      if (ele1.style.display == 'block') {
        ele1.style.display = 'none';
        ele2.style.display = 'block';
      }
      else{
        ele2.style.display = 'none';
        ele1.style.display = 'block';
      }

    }
  </script>

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
      <div class="containertitle "><div class="profile-image" style="background-image: url(<?php echo $_SESSION['image'];?>); background-repeat: no-repeat;background-position: center;">
      </div>Welcome <?php echo $_SESSION['username']; ?>
    </div>
    <div class="container-tabs">
      <div class="tabs">
      </div>
      <div class="tabs">
        <div class="tabs">
          <div id="tab-click" class="tabss blue student-icon">
            <h1><?php echo $_SESSION['count'] ?></h1>
            <h1 class="small">Students</h1>
            <h3>Add New/ Update</h3>
            <a href="?newstudent"><span></span></a>
            <?php
            if(isset($_GET['newstudent'])) {
              $_SESSION['newstudent'] = 1;
              header("Location: add-new-student.php ");
              unset($_GET['newstudent']);
            }
            ?>
          </div>
          <div id="tab-click" class="tabss red teacher-icon">
            <h1>69</h1>
            <h1 class="small">Teachers</h1>
            <h3>Add New/ Update</h3>
            <a href="?newteacher"><span></span></a>
            <?php
            if(isset($_GET['newteacher'])) {
              $_SESSION['newteacher'] = 1;
              header("Location: add-new-teacher.php ");
              unset($_GET['teacher']);
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container-tabs">
      <div class="tabs">
      </div>
      <div class="tabs">

        <div id="tab-click" class="tabss orange librarian-icon">
          <div id="librarian-data" style="display: block;">
            <h1>5</h1>
            <h1 class="small">Librarians</h1>
            <h3>Add New/ Update</h3>
            <a href="#" onclick="toggle('librarian-data','librarian-buttons')"><span></span></a>
          </div>
          <div id="librarian-buttons"  style="display: none;">
            <div id="tab-click-button" >
              <a href="#">link1</a>
              <a href="#">link2</a>
              <a href="#">link3</a>
              <a href="#" onclick="toggle('librarian-data','librarian-buttons')">back</a>
            </div>
          </div>
        </div>

        <div id="tab-click" class="tabss green office-icon">
          <h1>33</h1>
          <h1 class="small">Office staff</h1>
          <h3>Add New/ Update</h3>
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