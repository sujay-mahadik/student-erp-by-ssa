<?php
include_once 'includes/db_connect.php';
session_start();

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

    <form action="upload-php.php" method="post" enctype="multipart/form-data">
      <ul class="form-style">

        <?php echo $_SESSION['fuploadedmsg']?>
        <li>
          <label>Academic Details <span class="required">*</span></label>
          <select name="year" class="field-select-divided dropdown-button" required="required">
            <option value="">--select year--</option>
            <option value="fe">FE</option>
            <option value="se">SE</option>
            <option value="te">TE</option>
          </select>
          <select name="dept" class="field-select-divided dropdown-button" required="required">
            <option value="">--select department--</option>
            <option value="civil">Civil</option>
            <option value="computer">Computer</option>
            <option value="it">IT</option>
            <option value="entc">ENTC</option>
            <option value="mechanical">Mechanical</option>
          </select>
          <select name="subj" class="field-select-divided dropdown-button" required="required">
            <option value="">--select subj--</option>
            <option value="subj1">SUBJECT1</option>
            <option value="subj2">SUBJECT2</option>

          </select>
          <!-- <select name="pattern" class="field-select-divided dropdown-button">
            <option value="">--select pattern--</option>
            <option value="12">FE2012 Pattern</option>
            <option value="14">FE2014 Pattern</option>
            <option value="15">FE2015 Pattern</option>
          </select> -->
          <input type="text" name="doc_name">
          <input type="file" name="myfile">
        </li>

        <li>
          <div class="submit">
            <button  type="submit">Submit</button>
          </div>
        </li>

      </ul>
    </form>

  </div>


  <div class="footer">
    <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
  </div>

</body>
</html>





