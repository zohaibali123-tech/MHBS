<?php
session_start();
include("dashboard/db.php");

$email = $_POST['email'];
$password  = $_POST['password'];


$query = mysqli_query($con,"SELECT * FROM users WHERE email='$email' ") or die(mysqli_error($con));
$records = mysqli_num_rows($query);
if($records>0 ){
    $row = mysqli_fetch_array($query);
    $_SESSION['userid'] = $row['id']; 
    $_SESSION['username']=$row['fullname'];
    header("location:index.php");
    exit;}
   

else
 {//   header("location:index.php");
    echo "Invalid User id Password.";
}

?>