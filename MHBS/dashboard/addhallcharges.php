<?php
include("db.php");
session_start();
if (isset($_SESSION["userid"])) {
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $user = $_SESSION["userid"];

            $hallid = $_POST['hall_id'];
            $guestslot = $_POST['guest_slot'];
            $price = $_POST['price'];
            
        
            // Perform database insertion after successful file upload
            if($guestslot>=100){
            $sql = "INSERT INTO `hallcharges`(`hall_charges_id`, `hall_id`, `guest_slot`, `price`) 
                   VALUES ('', '$hallid', '$guestslot', '$price')";            }
            else{
                echo "Guest Slot Size Must be Greater Then 100";
            }   
            if (mysqli_query($con, $sql)) {
                header("location:hallcharges.php");
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
                <h3 class="p-2 mt-2">Guest limit</h3>
                <!-- <a href="addmenu.php" class="btn btn-primary mt-3 ms-auto p-2 mb-2">Add Guest Slot</a>     -->
            </div>
            <div class="col-lg-12 col-md-6 bg-light shadow p-3 mt-2">

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form p-2 ">
      <div class="row g-3">
      <div class="container mt-3">
        <label for="hall_select">Select Hall in which Guest Slot is added
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

      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Guest Slot <span>(Format Sample: 100 - 150. Note: First slod should start from 100.)</span></label>
        <input type="text" class="form-control" name="guest_slot">
      </div>

      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Enter Price</label>
        <input type="number" class="form-control" name="price" required placeholder="Enter Price">
      </div>

    </div> 
    <button class="btn btn-primary mt-4" type="submit" name="submit">Add Slot</button>    
    
     </form>
      </div>  <!--  Row END -->
      </div>  <!--  Container END -->
      
    


</body>
</html>

<?php } else {
    header("location:../loginform.php");
    }?>