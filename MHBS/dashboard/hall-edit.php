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
    <h5>Update My Hall Detail</h5>
    <hr>
    <?php 
    
    include ("db.php");
    $uid = $_GET['id'];;;

    $main =  "SELECT * FROM `hall_main_info`WHERE hall_id= {$uid}";
    $record = mysqli_query($con, $main) or die ("Query Failed !!");
    
    while ($row = mysqli_fetch_array($record)) {
    ?>   

<form action="save-update-hall.php" method="post" class="p-2">
    <!-- ***************************Main Information*******************************-->
    <h3>Main Information</h3>
    <hr>  
    <div class="row g-3">
      <?php echo $row['hall_id']?>
      <div class="col-lg-3 col-md-12">
        <input type="hidden" name="hall_id" id="" value="<?php echo $row['hall_id'];?>">
        <label for="name" class="form-label">Name *</label>
        <input type="text" value="<?php echo $row['hall_name']; ?>" class="form-control" name="hall_name" required>
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">City *</label>
        <input type="text" value="<?php echo $row['hall_city_name']; ?>" class="form-control" name="hall_city_name" placeholder="Enter City" required>
      </div>
      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Hall Address *</label>
        <input type="text" value="<?php echo $row['hall_address']; ?>" class="form-control" name="hall_address" placeholder="1234 Main St" required>
      </div>
    </div> 
 

    <div class="row my-3">
      <div class="col-lg-4 col-md-12">
        <label for="" class="form-label">Hall Capicity *</label>
        <input type="text" value="<?php echo $row['hall_max_capicity']; ?>" class="form-control" name="hall_max_capicity" required placeholder="Maximum Limit of Guests">
      </div>
      <div class="col-lg-4 col-md-12">
        <label for="" class="form-label">Facilities</label>
        <input type="text"value="<?php echo $row['hall_facilities']; ?>"  class="form-control" name="hall_facilities" required placeholder="AC/Non-AC">
      </div>
      <div class="col-lg-4 col-md-12">
        <label for="" class="form-label">Parking Space *</label>
        <input type="text" value="<?php echo $row['hall_parking']; ?>" class="form-control" name="hall_parking" required>
      </div>
      
      <div class="col-lg-12 col-md-12 my-4">
        <label for="" class="form-label">Hall Description <span>(if any)</span></label>
        <textarea class="form-control w-100 h-100"name="hall_desc"><?php echo $row['hall_desc']; ?></textarea>
    </div>
    </div>

    <!-- ***************************Contact Detail Area*******************************-->
    <?php  }
    
    $contact= "SELECT * FROM `hall_contact`  WHERE hall_id={$uid};";
    $record = mysqli_query($con, $contact) or die ("Query Failed !!");
    
    while ($row2 = mysqli_fetch_array($record)) {
    ?>
    <h3>Contact Detail</h3>
    <div class="row my-1 ">
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Phone/Landline#</label>
        <input type="text" value="<?php echo $row2['hall_phone']; ?>" name="hall_phone" class="form-control"  required>
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Email *</label>
        <input type="email" value="<?php echo $row2['hall_email']; ?>" name="hall_email" class="form-control">
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Webiste <span>(if any)</span></label>
        <input type="text" value="<?php echo $row2['hall_website']; ?>" name="hall_web" class="form-control">
      </div>
      
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Facebook Page <span>(if any)</span></label>
        <input type="text" value="<?php echo $row2['hall_face']; ?>" name="hall_face" class="form-control">
      </div>
      
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Instagram Page <span>(if any)</span></label>
        <input type="text" value="<?php echo $row2['hall_insta']; ?>" name="hall_insta" class="form-control">
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Youtube <span>(if any)</span></label>
        <input type="text" value="<?php echo $row2['hall_you']; ?>" name="hall_you" class="form-control">
      </div>
    </div>
    
    <!-- ***************************Charges Area *******************************-->
    <?php }
    
    $charges = "SELECT * FROM `hall_charges`  WHERE hall_id={$uid};";
    $record  = mysqli_query($con, $charges) or die ("Query Failed !!");
    while ($row3 = mysqli_fetch_array($record)) {
    ?>
    <h3>Charges</h3>
    <div class="row my-1 ">
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Service Charges *</label>
        <input type="number" value="<?php echo $row3['hall_service_charges']; ?>" name="hall_service_charges" class="form-control" required>
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Lighting Charges </label>
        <input type="number" value="<?php echo $row3['hall_lighting']; ?>" name="hall_lighting" class="form-control" required>
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">DJ Charges</label>
        <input type="number" value="<?php echo $row3['hall_DJ']; ?>" name="hall_DJ" class="form-control">
      </div>
      
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Tax (%)*</label>
        <input type="number" value="<?php echo $row3['hall_tax']; ?>" name="hall_tax" class="form-control">
      </div>
      
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Advance Booking Charges *</label>
        <input type="number" value="<?php echo $row3['hall_advance_book']; ?>" name="hall_advance_book" class="form-control" required>
      </div>
    </div>
  
    
      <!--***************************Bank Details******************************* -->
      <?php }
    
    $bankD= "SELECT * FROM `hall_bank_detail`  WHERE hall_id={$uid};";
    $record  = mysqli_query($con, $bankD) or die ("Query Failed !!");
    while ($row4 = mysqli_fetch_array($record)) {
    ?>
    <h3>Bank Details</h3>
    <div class="row my-1 ">
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Bank Name</label>
        <input type="text" value="<?php echo $row4['hall_bank_name']; ?>" name="hall_bank_name" class="form-control">
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Acc Title</label>
        <input type="text" value="<?php echo $row4['hall_bank_title']; ?>" name="hall_bank_title" class="form-control">
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Acc#</label>
        <input type="number" value="<?php echo $row4['hall_acc_no']; ?>" name="hall_acc_no" class="form-control">
      </div>
      
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">IBAN#</label>
        <input type="text" value="<?php echo $row4['hall_iban']; ?>" name="hall_iban" class="form-control">
      </div>
      
    </div>
    

      </div>
      <button class="btn btn-primary mb-5" type="submit" name="submit">Update Menu</button>    
      <a href="mymenu.php"class="btn btn-primary mb-5">Goto Back</a>
    
          
        </div>    <!--  Columns 12 Cell END -->  
        <?php }?>
      </form>
      
      
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