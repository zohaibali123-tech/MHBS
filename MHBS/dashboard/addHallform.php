<?php 
session_start();
if (isset($_SESSION["userid"])){
include("../links.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>this is title</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
    label{
      color: brown;
      font-weight:700;
    }
    h3{
      padding: 5px ;
      margin: 10px;
    }
    span{
      color: red;
      font-size: 14px;
    }
    body {
      
      background-color:lightgray;
    }
  </style>
</head>
<body >

    <?php include("sidebar.php"); ?>
  <!-- ****************Form for My Hall************************************ -->          
  <div class="fluid-container">
  <h4 class="mx-5 p-2 mt-2" >My Hall</h4>
  <p class="alert alert-warning mx-5">Please make sure you have properly set Menu, Miscellaneous Items, Guest Limit and Stage Decoration charges before adding your hall.  </p>
  <div class="container shadow" style="background-color: #ffff;"> 
  <!-- Form for My Hall -->
<form action="submit_addhall.php" method="post" class="p-2" enctype="multipart/form-data">
    <!-- ***************************Main Information*******************************-->
    <h3>Main Information</h3>
    <hr>  
    <div class="row g-3">
      <div class="col-lg-3 col-md-12">
        <label for="name" class="form-label">Name *</label>
        <input type="text" class="form-control" name="hall_name" required>
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">City *</label>
        <input type="text" class="form-control" name="hall_city_name" placeholder="Enter City" required>
      </div>
      <div class="col-lg-6 col-md-12">
        <label for="" class="form-label">Hall Address *</label>
        <input type="text" class="form-control" name="hall_address" placeholder="1234 Main St" required>
      </div>
    </div> 
 

    <div class="row my-3">
      <div class="col-lg-4 col-md-12">
        <label for="" class="form-label">Hall Capicity *</label>
        <input type="text" class="form-control" name="hall_max_capicity" required placeholder="Maximum Limit of Guests">
      </div>
      <div class="col-lg-4 col-md-12">
        <label for="" class="form-label">Facilities</label>
        <input type="text" class="form-control" name="hall_facilities" required placeholder="AC/Non-AC">
      </div>
      <div class="col-lg-4 col-md-12">
        <label for="" class="form-label">Parking Space *</label>
        <input type="text" class="form-control" name="hall_parking" required>
      </div>
      
      <div class="col-lg-12 col-md-12 my-4">
        <label for="" class="form-label">Hall Description <span>(if any)</span></label>
        <textarea class="form-control w-100 h-100" name="hall_desc"></textarea>
    </div>
    </div>

    <!-- ***************************Contact Detail Area*******************************-->
    <h3>Contact Detail</h3>
    <div class="row my-1 ">
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Phone/Landline#</label>
        <input type="text" name="hall_phone" class="form-control"  required>
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Email *</label>
        <input type="email" name="hall_email" class="form-control">
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Webiste <span>(if any)</span></label>
        <input type="text" name="hall_web" class="form-control">
      </div>
      
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Facebook Page <span>(if any)</span></label>
        <input type="text" name="hall_face" class="form-control">
      </div>
      
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Instagram Page <span>(if any)</span></label>
        <input type="text" name="hall_insta" class="form-control">
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Youtube <span>(if any)</span></label>
        <input type="text" name="hall_you" class="form-control">
      </div>
    </div>
    
    <!-- ***************************Charges Area *******************************-->
    <h3>Charges</h3>
    <div class="row my-1 ">
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Service Charges *</label>
        <input type="number" name="hall_service_charges" class="form-control" required>
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Lighting Charges </label>
        <input type="number" name="hall_lighting" class="form-control" required>
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">DJ Charges</label>
        <input type="number" name="hall_DJ" class="form-control">
      </div>
      
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Tax (%)*</label>
        <input type="number" name="hall_tax" class="form-control">
      </div>
      
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Advance Booking Charges *</label>
        <input type="number" name="hall_advance_book" class="form-control" required>
      </div>
    </div>
  
    
      <!--***************************Charges Area ******************************* -->
    <h3>Bank Details</h3>
    <div class="row my-1 ">
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Bank Name</label>
        <input type="text" name="hall_bank_name" class="form-control">
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Acc Title</label>
        <input type="text" name="hall_bank_title" class="form-control">
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">Acc#</label>
        <input type="number" name="hall_acc_no" class="form-control">
      </div>
      
      <div class="col-lg-3 col-md-12">
        <label for="" class="form-label">IBAN#</label>
        <input type="text" name="hall_iban" class="form-control">
      </div>
      
    </div>

      <div class="row"> 
      <div class="col-lg-12 col-md-12 my-4">
      <label for="">Upload Hall Images For Gallery<span>this will show on Web </span></label>  
      <input type="file" name="image[]" multiple accept="image/*" required>
      </div>
      </div>
      
      <div class="row"> 
      <div class="col-lg-12 col-md-12 my-4">
      <label for="">Hall card Image</label>
      <input type="file" name="cardimage" multiple accept="image/*" required>
      </div>
      </div>
        <!-- Hall images Section  -->


        <div class="col-12">
        <button type="submit" class="btn btn-primary mt-4">Add Hall</button>  
        </div>
      </div>
  
    
</div>
</div>
<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php } else {
    header("location:../loginform.php");
    }?>