<?php
// Include your database connection file
include("db.php");
session_start();

if (isset($_SESSION["userid"])) {
    $userId = $_SESSION["userid"];
    
    // Fetch images for the logged-in user from the database
    $query = mysqli_query($con, "SELECT * FROM `hall_images` WHERE hall_id IN (SELECT hall_id FROM hall_main_info WHERE user_id = $userId)");   


    // Check if images exist
    if (mysqli_num_rows($query) > 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Gallery</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .new5{
            border: 1px solid black;
            border-radius: 5px;
        }
        .wrapper{
            width: 100%;
            height: 20rem;
        }
        .card img{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <?php include("sidebar.php"); ?>
    <div class="d-flex w-100 my">
        <h3 class="p-2 mt-2">Image Gallery</h3>
    </div>
    <div class="container mt-4 bg-light shadow  p-3 mt-2">
        
      <div class="d-flex w-100 my">
                <h3 class="p-2 mt-2">My Hall Images</h3>
                <a href="addImages.php" class="btn btn-primary mt-3 ms-auto p-2 mb-2">Add Images</a>      

      </div>
        <div class="row">
            
            <?php
                // Display images
                while ($row = mysqli_fetch_assoc($query)) {
                    $imagePath = $row['image_path'];
            ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                <p class=" card-header text-center"> <?php echo $row['image_path'];?> </p>
                    <div class="wrapper">
                    <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="Image">
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <h2>Hall Card Image</h2>
        <div class="row">
            <?php
                    // $sql2 ="SELECT image_path From hall_card_image Where user_id = {$userId};";
                    $query2 = mysqli_query($con, "SELECT image_path FROM `hall_card_image` WHERE hall_id IN (SELECT hall_id FROM hall_main_info WHERE user_id = '$userId')");
                    
                    while ($row2 = mysqli_fetch_assoc($query2)) {
                    $imagePath2 = $row2['image_path'];

            ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                <p class=" card-header text-center"> <?php echo $row2['image_path'];?> </p>
                    <div class="wrapper">
                    <img src="<?php echo $imagePath2; ?>" class="card-img-top" alt="Image">
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        
        <hr class="new5">
        <h2>My Hall Menu</h2>
        
        <div class="row">
        <?php
                // $sql ="SELECT menu_image, menu_name From menu Where user_id = {$userId};";
                $query3= mysqli_query($con, "SELECT menu_image, menu_name FROM `menu` WHERE hall_id IN (SELECT hall_id FROM hall_main_info WHERE user_id = '$userId')");
                
                while ($row = mysqli_fetch_assoc($query3)) {
                    $imagePath = $row['menu_image'];
            ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                <p class=" card-header text-center"> <?php echo $row['menu_name'];?> </p>
                    <div class="wrapper">
                    <img src="uploads/<?php echo $imagePath; ?>" class="card-img-top" alt="Image">
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
<?php
    } else {
        include("sidebar.php"); 
        echo '
        <div class="container mt-4">
            <h2>Image Gallery</h2>
            <div class="row">
            <div class="col-md-4 mb-3">
            Sorry images not Found!
            <a class="btn btn-primary" href="addImages.php"> Add Images</a>
            </div>
            
            </div>
        ';  
    }
} else {
    header("location: ../loginform.php");
}
?>
