<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['aoi'])){
  header("Location: login-index.php");
}
if(isset($_SESSION['issue'])){
  unset($_SESSION['collect']);
  unset($_SESSION['issue']);
  unset($_SESSION['issuemany']);
  $_SESSION['issue']="defaultOpen";
}
else {
  if (isset($_SESSION['issuemany'])) {
    unset($_SESSION['issue']);
    unset($_SESSION['issuemany']);
    unset($_SESSION['collect']);
    $_SESSION['issuemany']="defaultOpen";
    # code...
  }
  else{
    unset($_SESSION['issue']);
    unset($_SESSION['issuemany']);
    unset($_SESSION['collect']);
    $_SESSION['collect']="defaultOpen";
# code...
  }
}
$post=$_SESSION['post'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/tab.css">
  <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
  <title>Office</title>
</head>
<body class="bg">
  <div class="topnav pullUp">
    <a href="office-index.php">Home</a>

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
      <a class="containertitle ">FEES</a>
      <button class="tablinks" onclick="opentab(event, 'Collect')" id="<?php echo $_SESSION['collect']?>">Collect</button>
      <button class="tablinks" onclick="opentab(event, 'Issue')" id="<?php echo $_SESSION['issue']?>">Issue Student</button>
      <button class="tablinks" onclick="opentab(event, 'Issuemany')" id="<?php echo $_SESSION['issuemany']?>">Issue Class</button>
      <button class="tablinks" onclick="opentab(event, 'View')" id="<?php echo $_SESSION['view']?>">View Pending</button>

    </div>
    <div id="Collect" class="tabcontent">
      <div class="result-found">
        <?php
        if(isset($_SESSION['collected'])){
          echo $_SESSION['collected'];
          unset($_SESSION['collected']);
        }
        ?>
      </div>
      <form action="fees-collect-search.php" method="post">
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
      $uexamsfees=$_SESSION['uexamsfees'];
      $uotherfees=$_SESSION['uotherfees'];
      $ulibraryfine=$_SESSION['ulibraryfine'];
      $uemail=$_SESSION['uemail'];
      $uyear=$_SESSION['uyear'];
      $udept=$_SESSION['udept'];
      $uimage=$_SESSION['uimage'];
      if ($_SESSION['showcollect'] == 1) {
        $showcollect=1;
        # code...
      }
      else{
        $showcollect=0;
      }
      ?>
      <div class="result-found">
        <?php
        if(isset($_SESSION['feescollected'])){
          echo $_SESSION['feescollected'];
          unset($_SESSION['feescollected']);
          unset($_SESSION['searched']);
        }
        ?>
        <?php  if (isset($_SESSION['feeerrorc']))
        {
          echo $_SESSION['feeerrorc'];
          unset($_SESSION['feeerrorc']);
        }
        ?>
      </div>
      <div class="collect-form" id="collect-form">
        <form action="fees-collect.php" method="post">
          <ul class="form-style">
            <li>
              <?php  
              echo 'User Id :'.$_SESSION['uuserid'];
              ?>
            </li>
            <li>
              <?php
              echo 'Name: ' . $_SESSION['ufname'] ." ". $_SESSION['umname'] ." ". $_SESSION['ulname'] . '<br/>'."\n";
              ?>
            </li>
            <li>
              <?php
              echo 'Class : ' . $_SESSION['uyear']."-". $_SESSION['udept']."\n";
              ?>
            </li>
            <li>
              <?php
              echo 'Pending Exam Fees : ' . $_SESSION['uexamfees']."\n";
              ?>
            </li>
            <li>
              <?php
              echo 'Pending Library Fine : ' . $_SESSION['ulibraryfine']."\n";
              ?>
            </li>
            <li>
              <?php
              echo 'Pending Other Fees : ' . $_SESSION['uotherfees']."\n";
              ?>
            </li>
            <li>
              <label>Amount</label>
              <input type="number" name="amount" placeholder="Amount" required="required">
            </li>
            <li><label>For</label>
              <select name="for" required="required">
                <option value=""> - for- </option>
                <option value="examfees">Exam Fees</option>
                <option value="libraryfine">Library Fine</option>
                <option value="otherfees">Other Fees</option>
              </select>
            </li>
            <li>
              <div class="submit">
                <button  type="submit">Collect</button>
              </div>
            </li>
            <li>

            </li>
          </ul>

        </form>
      </div>
    </div>
    <div id="Issue" class="tabcontent">
      <form action="fees-issue-search.php" method="post">
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
      $uexamsfees=$_SESSION['uexamsfees'];
      $uotherfees=$_SESSION['uotherfees'];
      $ulibraryfine=$_SESSION['ulibraryfine'];
      $uemail=$_SESSION['uemail'];
      $uyear=$_SESSION['uyear'];
      $udept=$_SESSION['udept'];
      $uimage=$_SESSION['uimage'];
      if ($_SESSION['showissue'] == 1) {
        $showissue=1;
        # code...
      }
      else{
        $showissue=0;
      }
      ?>
      <div class="result-found">
        <?php
        if(isset($_SESSION['feesissued'])){
          echo $_SESSION['feesissued'];
          unset($_SESSION['feesissued']);
          unset($_SESSION['searched']);
        }
        ?>
        <?php  if (isset($_SESSION['feeerror']))
        {
          echo $_SESSION['feeerror'];
          unset($_SESSION['feeerror']);
        }
        ?>
      </div>
      <div class="issue-form" id="issue-form">
        <form action="fees-issue.php" method="post">
          <ul class="form-style">

            <li>
              <?php  
              echo 'User Id :'.$_SESSION['uuserid'];
              ?>
            </li>
            <li>
              <?php
              echo 'Name: ' . $_SESSION['ufname'] ." ". $_SESSION['umname'] ." ". $_SESSION['ulname'] . '<br/>'."\n";
              ?>
            </li>
            <li>
              <?php
              echo 'Class : ' . $_SESSION['uyear']."-". $_SESSION['udept']."\n";
              ?>
            </li>
            <li>
              <?php
              echo 'Pending Exam Fees : ' . $_SESSION['uexamfees']."\n";
              ?>
            </li>
            <li>
              <?php
              echo 'Pending Library Fine : ' . $_SESSION['ulibraryfine']."\n";
              ?>
            </li>
            <li>
              <?php
              echo 'Pending Other Fees : ' . $_SESSION['uotherfees']."\n";
              ?>
            </li>

            <li>
              <label>Amount</label>
              <input type="number" name="amount" placeholder="Amount" required="required">
            </li>
            <li><label>For</label>
              <select name="for" required="required">
                <option value=""> - for- </option>
                <option value="examfees">Exam Fees</option>
                <option value="libraryfine">Library Fine</option>
                <option value="otherfees">Other Fees</option>
              </select>
            </li>
            <li>
              <div class="submit">
                <button  type="submit">Issue</button>
              </div>
            </li>
            <li>

            </li>
          </ul>
        </form>
      </div>
    </div>

    <div id="Issuemany" class="tabcontent">
      <form action="fees-issue-many.php" method="post">
        <ul class="form-style">
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
              <option value="it">IT</option>
              <option value="entc">ENTC</option>
              <option value="mechanical">Mechanical</option>
            </select>
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
          <li>
            <label>Amount</label>
            <input type="number" name="amount" placeholder="Amount" required="required">
          </li>
          <li><label>For</label>
            <select name="for" required="required">
              <option value=""> - for- </option>
              <option value="examfees">Exam Fees</option>
              <option value="libraryfine">Library Fine</option>
              <option value="otherfees">Other Fees</option>
            </select>
          </li>
          <li>
            <div class="submit">
              <button  type="submit">Issue</button>
            </div>
          </li>
        </ul>
      </form>
      <div class="result-found">
        <?php
        if(isset($_SESSION['feesissuedmany'])){
          echo $_SESSION['feesissuedmany'];
          unset($_SESSION['feesissuedmany']);
          unset($_SESSION['searched']);
        }
        ?>
        <?php  if (isset($_SESSION['feeerrormany']))
        {
          echo $_SESSION['feeerrormany'];
          unset($_SESSION['feeerrormany']);
        }
        ?>
      </div>



    </div>

    <div id="View" class="tabcontent">
      <div>
        <table>
          <thead>
            <tr>
              <th>USER ID</th>
              <th>NAME</th>
              
              <th>CLASS</th>
              <th>EXAM FEES</th>
              <th>LIBRARY FINE</th>
              <th>OTHER FEES</th>
              
              
            </tr>
          </thead>
          <tbody>
            <?php
            $allstudent = $conn->query("SHOW TABLES from erp LIKE '%db' ");
            $tables="";
            $i=0;
            while ($row = mysqli_fetch_array($allstudent)) {
              $allstudentresult = $conn->query("SELECT * FROM `{$row[$i]}` WHERE examfees > 0 OR libraryfine >0 OR otherfees >0 ");
              while($row=mysqli_fetch_array($allstudentresult,MYSQLI_ASSOC))
              {
                ?>
                <tr>
                  <td><?php echo $row['userid']; ?></td>
                  <td><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></td>

                  <td><?php echo $row['year']."-".$row['dept']; ?></td>
                  <td><?php echo $row['examfees']; ?></td>
                  <td><?php echo $row['libraryfine']; ?></td>
                  <td><?php echo $row['otherfees']; ?></td>
                </tr>
                <?php
              }
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
  unset($_SESSION['issue']);
  unset($_SESSION['issuemany']);
  unset($_SESSION['collect']);
  unset($_SESSION['delete']);
  unset($_SESSION['showissue']);
  unset($_SESSION['showcollect']);

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
    var collectform = document.getElementById('collect-form');
    collectform.style.display = 'none';
    var issueform = document.getElementById('issue-form');
    issueform.style.display = 'none';
    var searchfoundcollect = <?php echo "$showcollect"; ?> ;
    if (searchfoundcollect == 1) {
      collectform.style.display = 'block';
    } else{
      collectform.style.display = 'none';
    }
    var searchfoundissue = <?php echo "$showissue"; ?> ;
    if (searchfoundissue == 1) {
      issueform.style.display = 'block';
    } else{
      issueform.style.display = 'none';
    }
  </script>
  <?php
  $showcollect ='0';
  $showissue ='0';
  ?>
</body>
</html>