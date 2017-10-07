<?php
include_once 'includes/db_connect.php';
$id=$_POST["uname"];

$password=SHA1($_POST["upass"]);
//$conn->query("delete * from table_name where column is NULL ");
$sql = "SELECT * FROM users where userid='$id' and password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    session_start();

    $_SESSION['id']=$id;
    $row = mysqli_fetch_array($result);
    $_SESSION['type']=$row['type'];
    //echo $_SESSION['type'];
    header("Location: login.php");
}
else{
                session_start();
                $_SESSION['login-error'] = '*invalid details';
                header("Location: login-index.php");
            }


$conn->close();
?>


