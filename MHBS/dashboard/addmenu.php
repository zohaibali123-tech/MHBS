<?php
include("db.php");
session_start();
if (isset($_SESSION["userid"])) {
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    // File upload logic (uncomment and fix the code)
    if(isset($_FILES['fileToUpload'])){
        $error = array();
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        // $file_ext = strtolower(end(explode('.',$file_name)));
        $extensions = array("jpeg", "png", "jpg");

        // if (in_array($file_ext, $extensions) === false) {
        //     $error[] = "This Extension file not Allowed, Please Choose a JPG, JPEG, or PNG File.";
        // }
        if ($file_size > 2097152) {
            $error[] = "File Size must be 2MB or Lower.";
        }
        if (empty($error)==true) {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
        } else {
          print_r($error);
          die();
      }
    }


            $hallid = $_POST["hall_id"];
            $menuname = $_POST['menu_name'];
            $menuprice = $_POST['menu_price'];
            $menuitems = $_POST['menu_items'];
        
            // Perform database insertion after successful file upload
            $sql = "INSERT INTO `menu`(`menu_id`, `hall_id`, `menu_name`, `menu_price`, `menu_items`, `menu_image`) 
                    VALUES ('', '$hallid', '$menuname', '$menuprice', '$menuitems', '$file_name')";

            if (mysqli_query($con, $sql)) {
                header("location:mymenu.php");
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
    <h5>My Menu</h5>

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
        <label for="name" class="form-label">Menu Name</label>
        <input type="text" class="form-control" name="menu_name" required placeholder="Enter Menu Name (eg, menu 1, menu 2)">
      </div>

      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Menu Price</label>
        <input type="number" class="form-control" name="menu_price" required placeholder="Enter Menu Price (Per Head)">
      </div>

    </div> 
    
    <div class="row mt-3 ">
    <div class="col-lg-12 col-md-12 ">
        <label for="" class="form-label">Menu Items</label>
        <input type="number" class="form-control" name="menu_items" required placeholder="Enter Number of Items">
      </div>
    </div>

    <div class="row p-2 mt-4">

    <div class="col-lg-10 col-md-6">
          <label for="" class="form-label">Add Menu Image</label>
          <span>Size: Max 500KB</span>
          <div class="input-group mb-3">
            <input type="file" class="form-control p-1" required name="fileToUpload">
          </div>
        </div>
    
    <div class="col-lg-2 col-md-6 ">
    <label for="simple">Upload Img like This</label>
        <img src="../images/simple.jpg" alt="" class="h-75">
      </div>
    </div>
  
      
        
    <button class="btn btn-primary" type="submit" name="submit">Add Menu</button>    
    <a href="mymenu.php"class="btn btn-primary">Canncel</a>
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