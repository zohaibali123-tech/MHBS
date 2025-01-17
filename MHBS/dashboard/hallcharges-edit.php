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
    <h5>Update Hall Charges</h5>
    <?php 
    
    include ("db.php");
    $uid = $_GET['id'];

    $query = "SELECT * FROM hallcharges WHERE hall_charges_id= {$uid}";
    $record = mysqli_query($con, $query) or die ("Query Failed !!");

    if(mysqli_num_rows($record) > 0 )
    {
        while($row = mysqli_fetch_assoc($record))
        {
    ?>   


<form method="POST" action="save-update-hallcharges.php" class="form p-2 ">
<input type="hidden" name="id" id="" value="<?php echo $row["hall_charges_id"]; ?>">
      <div class="row g-3">
      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Guest Slot <span>(Format Sample: 100 - 150. Note: First slod should start from 100.)</span></label>
        <input type="text" value="<?php echo $row["guest_slot"]; ?>" class="form-control" name="guest_slot">
      </div>

      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Enter Price</label>
        <input type="number" value="<?php echo $row["price"]; ?>" class="form-control" name="price" required placeholder="Enter Price">
      </div>

    </div> 
    <button class="btn btn-primary mt-4" type="submit" name="submit">Update Guest Slot</button>    
    
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