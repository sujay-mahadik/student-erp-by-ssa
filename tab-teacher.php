<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['aai'])){
  header("Location: login-index.php");
}
if(isset($_SESSION['update'])){
  unset($_SESSION['add']);
  unset($_SESSION['update']);
  unset($_SESSION['delete']);
  $_SESSION['update']="defaultOpen";
}
else {
  if (isset($_SESSION['delete'])) {
    unset($_SESSION['add']);
    unset($_SESSION['update']);
    unset($_SESSION['delete']);
    $_SESSION['delete']="defaultOpen";
# code...
  }
  else{
    unset($_SESSION['add']);
    unset($_SESSION['update']);
    unset($_SESSION['delete']);
    $_SESSION['add']="defaultOpen";
# code...
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <a class="containertitle ">Teacher</a>
      <button class="tablinks" onclick="opentab(event, 'Add')" id="<?php echo $_SESSION['add']?>">Add</button>
      <button class="tablinks" onclick="opentab(event, 'Update')" id="<?php echo $_SESSION['update']?>">Update</button>
      <button class="tablinks" onclick="opentab(event, 'Delete')" id="<?php echo $_SESSION['delete']?>">Delete</button>
      <button class="tablinks" onclick="opentab(event, 'View')" id="<?php echo $_SESSION['viewall']?>">View All</button>
    </div>
    <div id="Add" class="tabcontent">
      <div class="result-found">
        <?php
        if(isset($_SESSION['added'])){
          echo $_SESSION['added'];
          unset($_SESSION['added']);
        }
        ?>
      </div>
      <br>
      <form action="add-teacher-php.php" method="post">
        <ul class="form-style">

          <li><label>Full Name <span class="required">*</span></label>
            <input type="text" name="firstname" class="field-divided" placeholder="First" required="required" >
            <input type="text" name="middlename" class="field-divided" placeholder="Middle"  >
            <input type="text" name="lastname" class="field-divided" placeholder="Last"  >
          </li>
          <li><label>Residential address<span class="required">*</span></label>
            <!-- <input type="text" name="uid" class="field-divided" placeholder="Roll Number" /> -->
            <input type="text" name="address" class="field-long" placeholder="Address along with pincode" required="required">
          </li>
          <li>
            <label>Email <span class="required">*</span></label>
            <input type="email" placeholder="Email Address" name="email" class="field-long" required="required">
          </li>
          <li>
            <label>Department <span class="required">*</span></label>

            <select name="dept" class="field-select-divided dropdown-button" required="required">
              <option value="">--select department--</option>
              <option value="civil">Civil</option>
              <option value="computer">Computer</option>
              <option value="it">IT</option>
              <option value="entc">ENTC</option>
              <option value="mechanical">Mechanical</option>
            </select>
          <!-- <select name="pattern" class="field-select-divided dropdown-button">
            <option value="">--select pattern--</option>
            <option value="12">FE2012 Pattern</option>
            <option value="14">FE2014 Pattern</option>
            <option value="15">FE2015 Pattern</option>
          </select> -->
        </li>
        <li><label>Date of Birth</label>
          <select name="dobday">
            <option> - day - </option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>
          <select name="dobmonth">
            <option> - month - </option>
            <option value="January">January</option>
            <option value="Febuary">Febuary</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
          </select>
          <select name="dobyear">
            <option> - year - </option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
            <option value="1979">1979</option>
          </select>
        </li>
        <li>
          <div class="submit">
            <button  type="submit">Submit</button>
          </div>
        </li>

      </ul>
    </form>
  </div>
  <div id="Update" class="tabcontent">
    <form action="update-search-teacher.php" method="post">
      <ul class="form-style">
        <li>
          <label>User ID <span class="required">*</span></label>
          <input type="text" name="uname" placeholder="User ID" required="required" />
        </li>
        <li>
          <div class="submit">
            <button  type="submit">Search</button>
          </div>

        </li>
        <li>
          <div class="result-found">
            <?php
            if(isset($_SESSION['updated'])){
              echo $_SESSION['updated'];
              unset($_SESSION['updated']);
              unset($_SESSION['searched']);
            }
            ?>
            <?php  if (isset($_SESSION['search-error']))
            {
              echo $_SESSION['search-error'];
            } ?>
          </div>
        </li>
      </ul>
    </form>
    <?php
    $uuserid=$_SESSION['uuserid'];
    $ufname=$_SESSION['ufname'];
    $umname=$_SESSION['umname'];
    $ulname=$_SESSION['ulname'];
    $uaddress=$_SESSION['uaddress'];
    $uemail=$_SESSION['uemail'];
    $uyear=$_SESSION['uyear'];
    $udept=$_SESSION['udept'];
    $uimage=$_SESSION['uimage'];
    if ($_SESSION['showupdate'] == 1) {
      $showupdate=1;
  # code...
    }
    else{
      $showupdate=0;
    }
    ?>
    <div class="update-form" id="update-form">
      <form action="update-teacher-php.php" method="post">
        <ul class="form-style">
          <li><label>Full Name <span class="required">*</span></label>
            <input type="text" name="ufirstname" class="field-divided" value="<?php echo "$ufname"; ?>" required="required"/>
            <input type="text" name="umiddlename" class="field-divided" value="<?php echo "$umname"; ?>" />
            <input type="text" name="ulastname" class="field-divided" value="<?php echo "$ulname"; ?>" />
          </li>
          <li><label>Residential address<span class="required">*</span></label>
            <!-- <input type="text" name="uid" class="field-divided" placeholder="Roll Number" /> -->
            <input type="text" name="uaddress" class="field-long" value="<?php echo "$uaddress"; ?>" required="required" >
          </li>
          <li>
            <label>Email <span class="required">*</span></label>
            <input type="email" name="uemail" class="field-long" value="<?php echo "$uemail"; ?>" required="required">
          </li>


    <!-- <li>
      <label>Academic Details <span class="required">*</span></label>
      <select name="uyear" class="field-select-divided dropdown-button">
        <option value="">--<?php echo "$uyear"; ?>--</option>
        <option value="fe">FE</option>
        <option value="se">SE</option>
        <option value="te">TE</option>
      </select>
      <select name="udept" class="field-select-divided dropdown-button">
        <option value="">--<?php echo "$udept"; ?>--</option>
        <option value="civil">Civil</option>
        <option value="computer">Computer</option>
        <option value="it">IT</option>
        <option value="entc">ENTC</option>
        <option value="mechanical">Mechanical</option>
      </select>
      <select name="pattern" class="field-select-divided dropdown-button">
        <option value="">--select pattern--</option>
        <option value="12">FE2012 Pattern</option>
        <option value="14">FE2014 Pattern</option>
        <option value="15">FE2015 Pattern</option>
      </select>
    </li>-->
    <li><label>Date of Birth</label>
      <select name="dobday">
        <option> - day - </option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
      </select>
      <select name="dobmonth">
        <option> - month - </option>
        <option value="January">January</option>
        <option value="Febuary">Febuary</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
      </select>
      <select name="dobyear">
        <option> - year - </option>
        <option value="2005">2005</option>
        <option value="2004">2004</option>
        <option value="2003">2003</option>
        <option value="2002">2002</option>
        <option value="2001">2001</option>
        <option value="2000">2000</option>
        <option value="1999">1999</option>
        <option value="1998">1998</option>
        <option value="1997">1997</option>
        <option value="1996">1996</option>
        <option value="1995">1995</option>
        <option value="1994">1994</option>
        <option value="1993">1993</option>
        <option value="1992">1992</option>
        <option value="1991">1991</option>
        <option value="1990">1990</option>
        <option value="1989">1989</option>
        <option value="1988">1988</option>
        <option value="1987">1987</option>
        <option value="1986">1986</option>
        <option value="1985">1985</option>
        <option value="1984">1984</option>
        <option value="1983">1983</option>
        <option value="1982">1982</option>
        <option value="1981">1981</option>
        <option value="1980">1980</option>
        <option value="1979">1979</option>
      </select>
    </li>
    <li>
      <div class="submit">
        <button  type="submit">Submit</button>
      </div>
    </li>
  </ul>
</form>
</div>
</div>
<div id="Delete" class="tabcontent">
  <form action="delete-search-teacher.php" method="post">
    <ul class="form-style">
      <li>
        <label>User ID <span class="required">*</span></label>
        <input type="text" name="uname" placeholder="User ID" required="required"/>
      </li>
      <li>
        <div class="submit">
          <button  type="submit">Search</button>
        </div>
      </li>
      <li>
        <div class="result-found">
          <?php
          if(isset($_SESSION['deleted'])){
            echo $_SESSION['deleted'];
            unset($_SESSION['deleted']);
            unset($_SESSION['searched']);
          }
          ?>
          <?php  if (isset($_SESSION['search-errord']))
          {
            echo $_SESSION['search-errord'];
          } ?>
        </div>
      </li>
    </ul>
  </form>
  <?php
  $duserid=$_SESSION['duserid'];
  $dfname=$_SESSION['dfname'];
  $dmname=$_SESSION['dmname'];
  $dlname=$_SESSION['dlname'];
  $daddress=$_SESSION['daddress'];
  $demail=$_SESSION['demail'];
  $dyear=$_SESSION['dyear'];
  $ddept=$_SESSION['ddept'];
  $dimage=$_SESSION['dimage'];
  if ($_SESSION['showdelete'] == 1) {
    $showdelete=1;
# code...
  }
  else{
    $showdelete=0;
  }
  ?>
  <div class="delete-form" id="delete-form">
    <form action="delete-teacher-php.php" method="post">
      <ul class="delete-details">
        <li>
          <?php
          echo 'Name: ' . $_SESSION['dfname'] ." ". $_SESSION['dmname'] ." ". $_SESSION['dlname'] . '<br/>'."\n";
          ?>
        </li>
        <li>
          <?php
          echo 'Year: ' . $_SESSION['dyear']."\n";
          ?>
        </li>
        <li>
          <?php
          echo 'Department: ' . $_SESSION['ddept']."\n";
          ?>
        </li>
        <li>
          <?php
          echo 'Address: ' . $_SESSION['daddress']."\n";
          ?>
        </li>
        <li>
          <?php
          echo 'Email: ' . $_SESSION['demail']."\n";
          ?>
        </li>
      </ul>
      <div class="delete">
        <button  type="submit">Delete</button>
      </div>
    </form>
  </div>
</div>
<div id="View" class="tabcontent">
  <div>
    <table>
      <thead>
        <tr>
          <th>USER ID</th>
          <th>NAME</th>
          <th>ADDRESS</th>

          <th>DEPT </th>
          <th>EMAIL</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $tables="teacher";


        $allstudentresult = $conn->query("SELECT * FROM `{$tables}` ");
        while($row=mysqli_fetch_array($allstudentresult,MYSQLI_ASSOC))
        {
          ?>
          <tr>
            <td><?php echo $row['userid']; ?></td>
            <td><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></td>
            <td><?php echo $row['address']; ?></td>

            <td><?php echo $row['dept']; ?></td>
            <td><?php echo $row['email']; ?></td>
          </tr>
          <?php
        }

        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<?php
unset($_SESSION['search-error']);
unset($_SESSION['search-errord']);
unset($_SESSION['add']);
unset($_SESSION['update']);
unset($_SESSION['delete']);
unset($_SESSION['showdelete']);
unset($_SESSION['showupdate']);
?>
<div class="footer">
  <p> Copyright 2017. All Rights Reserved. Developed by SSA</p>
</div>
<script type="text/javascript">
  function opentab(event, tabname) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabname).style.display = "block";
    event.currentTarget.className += " active";
  }
  document.getElementById("defaultOpen").click();
  var updateform = document.getElementById('update-form');
  updateform.style.display = 'none';
  var deleteform = document.getElementById('delete-form');
  deleteform.style.display = 'none';
  var searchfoundupdate = <?php echo "$showupdate"; ?> ;
  if (searchfoundupdate == 1) {
    updateform.style.display = 'block';
  } else{
    updateform.style.display = 'none';
  }
  var searchfounddelete = <?php echo "$showdelete"; ?> ;
  if (searchfounddelete == 1) {
    deleteform.style.display = 'block';
  } else{
    deleteform.style.display = 'none';
  }
</script>
<?php
$showupdate ='0';
$showdelete ='0';
?>
</body>
</html>