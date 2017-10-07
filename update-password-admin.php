<?php
include_once 'includes/db_connect.php';
session_start();

if (!isset($_SESSION['aai'])){
    header("Location: login-index.php");
}
$cpass=sha1($_POST['cpass']);
$newpass=sha1($_POST['npass']);
$newpassc=sha1($_POST['cnpass']);
$pass=$_SESSION['password'];
$table="users";
$userid=$_SESSION['id'];
if($pass == $cpass)
{
    //echo "herr";
    if($newpass==$newpassc)
    {
        $sql = "UPDATE `{$table}` SET password= '$newpass' WHERE userid='$userid'"  ;
            if ($conn->query($sql) === TRUE) {
                //echo "successfully ";
                $_SESSION['passmsg']="Password Updated Successfully";
               header("Location: change-password-admin.php");
            }
    }
    else
    {
        $_SESSION['passmsg']="New Passwords don't match";
header("Location: change-password-admin.php");    }
}

 else {
    $_SESSION['passmsg']="Invalid Current Password";
    header("Location: change-password-admin.php");
}


?>