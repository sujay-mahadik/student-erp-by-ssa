<?php
include_once 'includes/db_connect.php';
session_start();

?>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/tab.css">
    <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
    <title>Welcome Admin</title>
</head>
<body class="bg">
    <div class="topnav pullUp">
        <a href="#">About</a>
        <a href="#">Help</a>
        <a  href="#">Developed By</a>
    </div>
    <div class="admincard-bck">
        <!--Only For Login card Background-->
    </div>
    <div class="admincard">
        <div class="tab">
            <a class="containertitle ">Teacher</a>
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
        <form action="update-profile-teacher-php.php" method="post" enctype="multipart/form-data">
            <ul class="form-style">

                <li><label>Full Name <span class="required">*</span></label>
                    <input type="text" name="firstname" class="field-divided" placeholder="First" required="required" value=<?php echo $_SESSION['fname']?> pattern="[A-Za-z]{2,}" title="Alphabet Only">
                    <input type="text" name="middlename" class="field-divided" placeholder="Middle" pattern="[A-Za-z]{2,}" title="Alphabet Only" value=<?php echo $_SESSION['mname']?>  >
                    <input type="text" name="lastname" class="field-divided" placeholder="Last"  pattern="[A-Za-z]{2,}" title="Alphabet Only" value=<?php echo $_SESSION['lname']?> >
                </li>
                <li><label>Residential address<span class="required">*</span></label>
                    <!-- <input type="text" name="uid" class="field-divided" placeholder="Roll Number" /> -->
                    <input type="text" name="address" class="field-long" placeholder="Address along with pincode" required="required" value='<?php echo $_SESSION['address']; ?>'>
                </li>
                <li>
                    <label>Email <span class="required">*</span></label>
                    <input type="email" placeholder="Email Address" name="email" class="field-long" required="required" value=<?php echo $_SESSION['email']?>>
                </li>


                <label>Photo Link </label>
                <li>
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