<?php
include("db.php");
session_start();
if (isset($_SESSION["userid"])) {
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    
            $hallid = $_POST["hall_id"];
            $packagename = $_POST['package_name'];
            $service = $_POST['service'];
            $photoserviceprice = $_POST['photo_service_price'];
            
        
            // Perform database insertion after successful file upload
            
            $sql = "INSERT INTO `photoservice`(`photo_service_id`, `hall_id`, `package_name`, `service`,`photo_service_price`) 
                   VALUES ('', '$hallid', '$packagename','$service', '$photoserviceprice')";
            
            if (mysqli_query($con, $sql)) {
                header("location:photo-service.php");
            } else {
                echo "<div class='alert alert-danger'> Query Failed </div>";
            }
        }
    

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
            font-size:12px;
        }
        .instructions{
            color :lightgray;
        }
        label{
            color:brown;
            font-weight:600;
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
  <div class="row mt-4 ">
    
  <div class="d-flex w-100 my">
    
  <div class="d-flex w-100 my">
        <h3 class="p-2 mt-2">Add Package</h3>
  </div>
  </div>

    <div class="col-lg-12 col-md-6 bg-light shadow p-3 mt-2">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form p-2 ">
    <div class="container mt-3">
        <label for="hall_select">Select Hall in which Photo Service is added
            <select name="hall_id" id="hall_select" required>
              <option value="">Select Hall</option>
              <?php 
              $selectHall = mysqli_query($con, 'SELECT hall_id, hall_name FROM hall_main_info');
              while ($row = mysqli_fetch_array($selectHall)) {
              ?>
              <option value="<?php echo $row['hall_id']; ?>"><?php echo $row['hall_name']; ?></option>
              <?php } ?>
            </select>
         </label>
     </div>

      <div class="row g-3">
      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Package Name</label>
        <input type="text" class="form-control" name="package_name" placeholder ="Enter Package (eg, Basic,Adance)">
      </div>

      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Service <span>(Photo/Video or Both)</span></label>
        <input type="text" class="form-control" name="service" required placeholder="Type Service">
      </div>

      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Package Price</label>
        <input type="text" class="form-control" name="photo_service_price" required placeholder="Enter Price">
      </div>

    </div> 
    <button class="btn btn-primary mt-4" type="submit" name="submit">Add Package</button>    
    
     </form>
      </div>  <!--  Row END -->
      </div>  <!--  Container END -->
      
    


</body>
</html>

<?php } 
else {
    header("location:../loginform.php");
}?>