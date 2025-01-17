<?php 
session_start();
if (isset($_SESSION["userid"])) {
include("../links.php");
include("db.php");
// include("functions.php");
// // include("session.php");

// $user = $_SESSION['userid'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .tab-content {
            padding-left:100px;
            padding-top:10px;
            
        }
        span {
            color:red;
        }
        .instructions{
            color :lightgray;
        }
    </style>
    <!-- Bootstrap CSS -->
  <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!-- Bootstrap Icons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <?php  include("sidebar.php"); ?>
    
  <div class="container">
  <div class="row">
    
    <h5 class="mt-4 p-2">Profile Information</h5>
      <div class="col-lg-8 col-md-6 bg-light shadow  p-3 mt-2 ">
        <div class="col-lg-6">
      
    
    <?php
    
    $query = mysqli_query($con,"SELECT * FROM `users`WHERE id={$_SESSION['userid']}");
    while($row = mysqli_fetch_array($query))
    {  
        ?>

        <h5>Full Name </h5> 
        <p><?php echo $row['fullname']?>  </p>

        <h5>Mobile#</h5> 
        <p><?php echo $row['mobile']?>  </p>


        <h5>Email </h5> 
        <p><?php echo $row['email']?>  </p>



        <?php }  ?>
</div>
      
      </div>
      </div>
      </div>


</body>
</html>

<?php } 
else {
    header("location:../loginform.php");
}?>