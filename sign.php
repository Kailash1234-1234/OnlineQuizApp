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
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$mob = $_POST['mob'];
$password = $_POST['password'];
$q3=mysqli_query($con, "INSERT INTO user VALUES  ('$name' , '$gender' , '$college','$email' ,'$mob', '$password')");
if ($q3) {
    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;
    header("location:home.php?q=1");
} else {
    header("location:index.php?q7=Email Already Registered!!!");
}
ob_end_flush();
?>