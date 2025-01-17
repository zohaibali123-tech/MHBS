<?php
include("db.php");
session_start();
if (isset($_SESSION["userid"])) {
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $lastHallId = $_POST['hall_id'];
    $targetDir = "uploads/"; // Directory to store uploaded images
    $targetDir2 = "uploads/"; // Directory to store uploaded images
    $allowTypes = array('jpg','png','jpeg','gif'); // Allowed file types
    // Insert images related to the hall_id
    foreach ($_FILES['image']['name'] as $key => $val) {
        $fileName = basename($_FILES['image']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetFilePath)) {
                // Insert file details into database with hall_id
                $insert = "INSERT INTO hall_images (hall_id, image_path) VALUES ('$lastHallId', '$targetFilePath')";
                mysqli_query($con, $insert);
            }
        }
    }

    // Insert card image related to the hall_id
    $cardImageName = $_FILES['cardimage']['name'];
    $targetCardPath = $targetDir2 . basename($cardImageName);

    if (move_uploaded_file($_FILES["cardimage"]["tmp_name"], $targetCardPath)) {
        $insertQuery = "INSERT INTO hall_card_image (hall_id, image_path) VALUES ('$lastHallId', '$targetCardPath')";
        $result = mysqli_query($con, $insertQuery);
        header("location:myhallimages.php");
        exit;
    } else {
        echo "Error uploading image.";
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
    <!-- <div class=" d-flex justify-content-end w-100">
    <a href="addmenu.php" class="btn btn-primary mb-1">Add Menu </a>    
    </div> -->
    <h5>Add Hall Images</h5>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"enctype="multipart/form-data">
      <div class="col-lg-12 col-md-6 bg-light shadow  p-3 mt-2">
        <div class="row g-3">
      <div class="container mt-3">
        <label for="hall_select">Select Hall in which menu is added
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
      <div class="row"> 
      <div class="col-lg-12 col-md-12 my-4">
      <label for="">Upload Hall Images For Gallery <span> this will show on Web </span></label>  
      <input type="file" name="image[]" multiple accept="image/*" >
      </div>
      </div>
      
      <div class="row"> 
      <div class="col-lg-12 col-md-12 my-4">
      <label for="">Hall card Image</label>
      <input type="file" name="cardimage" multiple accept="image/*" >
      </div>
      </div>
       </div>
  
      
        
    <button class="btn btn-primary" type="submit" name="submit">Add Images</button>    
    <a href="myhallimages.php"class="btn btn-primary">Canncel</a>
        </div>    <!--  Columns 12 Cell END -->   

    

        </form>
      </div>  <!--  Row END -->
      </div>  <!--  Container END -->
      
    


</body>
</html>

<?php } 
else {
    header("location:../loginform.php");
}?>