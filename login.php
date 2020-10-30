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
session_start();
if (isset($_SESSION["email"])) {
    session_destroy();
}
require_once 'config.php';
$ref=@$_GET['q'];
$email = $_POST['email'];
$password = $_POST['password'];
$result = mysqli_query($con, "SELECT name FROM user WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if ($count==1) {
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
    }
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    header("location:home.php?q=1");
} else {
    header("location:$ref?w=Wrong Username or Password");
}