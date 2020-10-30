<?php
/**
 * Templet File Doc Comment
 * 
 * PHP version /
 * 
 * @category Tenplete_Class
 * @package  Templete_Class
 * @author   Author <author@domain.com>
 * @license  http://opensource.org/MIT MIT License
 * @link     http://localhost/
 */

require_once 'config.php';
$ref=@$_GET['q'];
$email = $_POST['uname'];
$password = $_POST['password'];
$result = mysqli_query($con, "SELECT email FROM admin WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if ($count==1) {
    session_start();
    if (isset($_SESSION['email'])) {
        session_unset();
    }
    $_SESSION["name"] = 'Admin';
    $_SESSION["key"] ='sunny7785068889';
    $_SESSION["email"] = $email;
    header("location:dashboard.php?q=0");
} else {
    header("location:$ref?w=Warning : Access denied");
}