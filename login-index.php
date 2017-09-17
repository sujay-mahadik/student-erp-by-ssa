<?php session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/login-index.css">
    <link rel="shortcut icon" href="images/sis-favicon.ico" type="image/x-icon">
    <title>Login - Student Information System</title>
</head>
<body class="bg">
    <div class="topnav pullUp">
        <a class="active" href="login-index.php">Login</a>
        <a href="#">About</a>
        <a href="#">Help</a>
        <a class="developedby" href="#">Developed By</a>
    </div>
    <div class="logincard-bck">
        <!--Only For Login card Background-->
    </div>
    <div class="logincard">
        <form action="login.php" method="post" autocomplete="off">
            <div class="container-login-title">Login
            </div>
            <div class="container-input-fields">
                <input type="text" placeholder="User ID" onfocus="this.placeholder = 'User ID'" onblur="this.placeholder = 'User ID'" name="uname" required="required">
                <input type="password" placeholder="Password" onfocus="this.placeholder = 'Password'" onblur="this.placeholder = 'Password'" name="upass" required="required">
                <button type="submit">Login</button>
                <a class="login-error">
                    <?php 
                    if (isset($_SESSION['login-error']))
                    {
                        echo $_SESSION['login-error'];
                        unset($_SESSION['login-error']);
                    } 
                    if (isset($_SESSION['logedout'])) {
                        echo $_SESSION['logedout'];
                        unset($_SESSION['logedout']);
                        # code...
                    }
                    ?>
                </a>
            </div>
        </form>
    </div>
    <div class="footer">
        <p> Copyright <?=date('Y');?>. All Rights Reserved. Developed by SSA</p>
    </div>
</body>
</html>
<?php
session_unset();
?>
