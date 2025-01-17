<?php 
session_start();
if (isset($_SESSION["userid"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container">
  <div class="row mt-4 ">
    <!-- <div class=" d-flex justify-content-end w-100">
    <a href="addmenu.php" class="btn btn-primary mb-1">Add Menu </a>    
    </div> -->
    <h5>Update Menu</h5>
    <?php 
    
    include ("db.php");
    $uid = $_GET['id'];

    $query = "SELECT * FROM menu WHERE menu_id= {$uid}";
    $record = mysqli_query($con, $query) or die ("Query Failed !!");

    if(mysqli_num_rows($record) > 0 )
    {
        while($row = mysqli_fetch_assoc($record))
        {
    ?>   


    <form method="POST" action="save-update-menu.php" enctype="multipart/form-data">
      <div class="col-lg-12 col-md-6 bg-light shadow  p-3 mt-2">
      <div class="row g-3">
      <div class="col-lg-6 col-md-12">
        <input type="hidden" name="id" id="" value="<?php echo $row["menu_id"]; ?>">
        <label for="name" class="form-label">Menu Name</label>
        <input type="text" value="<?php echo $row['menu_name'] ?>" class="form-control" name="menu_name" required placeholder="Enter Menu Name (eg, menu 1, menu 2)">
      </div>

      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Menu Price</label>
        <input type="number" value="<?php echo $row['menu_price'] ?>" class="form-control" name="menu_price" required placeholder="Enter Menu Price (Per Head)">
      </div>

    </div> 
    
    <div class="row mt-3 ">
    <div class="col-lg-12 col-md-12 ">
        <label for="" class="form-label">Menu Items</label>
        <input type="number" value="<?php echo $row['menu_items'] ?>" class="form-control" name="menu_items" required placeholder="Enter Number of Items">
      </div>
    </div>

    <div class="row p-2 mt-4">

    <div class="col-lg-10 col-md-6">
          <label for="" class="form-label">Add Menu Image</label>
          <span>Size: Max 500KB</span>
          <div class="input-group mb-3">
            <input type="file" class="form-control p-1" name="new-image">
          </div>
        </div>
    
    <div class="col-lg-2 col-md-6 ">
    <label for="simple">Last Updated Image</label>
        <img src="upload/<?php echo $row['menu_image']?>" class="h-50">
        
        <input type="hidden" name="old_image" id="" value="<?php echo $row['menu_image'];?>">
      </div>
    </div>
  
      
        
    <button class="btn btn-primary" type="submit" name="submit">Update Menu</button>    
    <a href="mymenu.php"class="btn btn-primary">Goto Back</a>
        </div>    <!--  Columns 12 Cell END -->  
      </form>
      <?php }}else 
      {
        echo "Record Not Found!!";
      }?>
      </div>  <!--  Row END -->
      </div>  <!--  Container END -->
      
      <!-- Bootstrap and DataTables JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

</body>
</html>

<?php } 
else {
    header("location:../loginform.php");
}?>