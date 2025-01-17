<?php 
// session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/owl.carousel.min.css">
    <link rel="stylesheet" href="path/to/owl.theme.default.min.css">
    
    
    <style> /* Card container */
    
    .city-card {
      position: relative;
      display: flex;
      flex-direction: column;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 20px;
      padding: 20px;
      max-width: 300px;
    }

    /* Images style */
    .city-image {
      max-width: 100%;
      height: 180px;
      border-radius: 8px;
    }

    /* Style for city description */
    .city-description {
      margin-top: 20px;
      text-align: justify;
    }

    /* Icon container */
    .icon-container {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #fff;
      padding: 5px;
      border-radius: 50%;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Icon image */
    .icon-image {
      width: 50px;
      height: 50px;
      object-fit: contain;
    }
.bgimage{
    /*background-image: url('images/bgimage4.jpg'); /* Replace with your image URL */
      background-size: cover;
      background-position: center;

      min-height:100vh; /* 660px;Adjust height as needed 
      background: linear-gradient(to bottom, rgba(255,255,255,0.15) 0%, rgba(0,0,0,0.15) 100%), radial-gradient(at top center, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.40) 120%) #989898;
      background-blend-mode: multiply,multiply; */   
      /* background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%); /* */
      background-image: url('images/bg.jpg');
      font-weight: 900;
      color: #FFFFFF; /* White text color */
    text-shadow: 2px 2px 4px rgba(255, 0, 0, 0.7); 
}
.custom-container {
      /* Replace 'path/to/your/image.jpg' with your image path */
      background-size: cover; /* Cover the entire container */
      background-position: center; /* Center the background image */
      height: 450px; /* Adjust height as needed */
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
      font-size: 24px;
      border-radius: 10px;
    }    
.listhall {
    background: #485563;  
    background: -webkit-linear-gradient(to right, #29323c, #485563);
    background: linear-gradient(to right, #29323c, #485563); 
    border-radius:10px;
}    
.wrapper-card {
  width: 20rem;
  height: 15rem;
}
.wrapper-card img {
  width: 100%;
  height: 100%;
}
    </style>
</head>
<body class="">
    <?php  
    include("dashboard/db.php");
    include('nav.php'); 
    if(isset($_SESSION['userid'])){

      $user = $_SESSION['userid'];
    }
    else{
      $user = '';
    }
    ?>

<div class="bgimage">
  <div class="container" style="">
    <div class="row justify-content-center   p-5">
      <div class="col-xl-10 col-lg-12 col-md-10 text-center mt-5">
        <h1 class="mt-5  h1" style="">Discover & book marriage halls smartly</h1>
        <p class="h2 mb-5">Best marriage halls at the best prices</p>
      </div>
      <div class="col-xl-8 col-lg-10 col-md-10">
        <form action="" class="">
          <div class="form-row align-items-center">
            <div class="col-lg-5 col-md-6 mb-2">
              <input type="text" name="" id="" placeholder="Marriage Hall name..." class="form-control">
            </div>
            <div class="col-lg-3 col-md-6 mb-2">
              <input type="text" name="" id="" placeholder="Number of guests..." class="form-control">
            </div>
            <div class="col-lg-2 col-md-6 mb-2">
              <select class="form-select">
                <option selected>All Cities</option>
                <option value="1">Mirpurkhas</option>
                <option value="2">Hyderabad</option>
                <option value="3">Karachi</option>
              </select>
            </div>
            <div class="col-lg-2 col-md-6 mb-2">
              <button class="btn btn-primary btn-block">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- **************************HALL CARD*********************************************** 
        *********************************************************************************** -->
    <!-- *************************Wrapper Container****************************************  -->
    

    <div class="container">
        <div class="row align-content-center  justify-content-center ">
            <div class="col-md-6 col-lg-12 my-4 text-center " >
            <h3 class="">    Featured Marriage Halls </h3>
            <h4 class="">Explore the newly added marriage halls.</h4>
        </div>
        </div>
    </div>

    <div class="container mx-auto">  <!-- Container Start -->
        <!-- ******************************Row Start************************************** -->
        <div class="row align-content-center  justify-content-center ">        <!-- Row Start -->
        
        <?php 
        $imgquery = "SELECT hmi.hall_id,hmi.hall_name,hmi.hall_max_capicity, hci.image_path
        FROM hall_main_info hmi
        JOIN hall_card_image hci
        WHERE hmi.hall_id = hci.hall_id
        ORDER BY hmi.hall_id DESC LIMIT 4;";
        

        $cardimg = mysqli_query($con, $imgquery);
        // $record  = mysqli_num_rows($cardimg);
        while ($row = mysqli_fetch_array($cardimg)) {
        ?>
        <!-- ******************************Column Start************************************** -->
        <div class="col-md-6 col-lg-3"> <!-- Column Start -->
        <!-- ******************************CARD Starting************************************** -->
        <div class="card" style="width: 20rem;">   <!-- Card Starting -->
        <div class="wrapper-card">
            <img class="card-img-top" src="dashboard/<?php echo $row['image_path'];?>">
        </div>
        <div class="card-body text-center ">
        <div class="row justify-content-center ">
                <div class="col-12">
                    <h5 class="card-title"><?php echo $row['hall_name']; ?></h5>
                </div>
            </div>
        </div>
        <div class="row align-items-center g-0 text-center ">
            <div class="col-8">
                <p class="card-text text-bg-danger p-1 ">Capacity: <?php echo $row['hall_max_capicity'];?> Person</p>
            </div>
             <div class="col-4">  
             <a href="showhall.php?hall_id=<?php echo $row['hall_id'];?>" class="btn btn-primary w-100 rounded-0 p-1"> <i class="bi bi-info-circle"></i> Details</a>
            </div>
        </div>
        </div>      <!-- Card End -->

        
        
        <!-- ******************************CARD END************************************** -->
        </div>      <!-- Column End -->

        <?php }?>
        <!-- ******************************Column END************************************** -->
  </div>            <!-- Row END -->
    <!-- **********************************Row END**************************************** -->
</div>              <!-- Container End-->   






<div class="container custom-container my-4 " style="background-image: url('images/menu.jpg');">
<div>
  </div>
</div>


<div class="container custom-container my-5 "style=" background-image: url('images/shadibg2.jpg');">
<div>
    <h1>Make your Shadi ... #yaadgar forever</h1>
    <h4>Get the best marriage hall at best price</h4>
    <a href="weddingvenue.php"><button type="submit" class="btn btn-primary"> View All</button></a>
  </div>
</div>



<div class="container">
    <!-- Section for city introduction using cards -->
    <section class="cities-introduction">
      <h1 class="text-center">Famous City Marriage Halls</h1>
      <!--**************** ROW Start **********-->
        <div class="row">
          <!--**************** Column Start **********-->
        <div class="col-md-6 col-lg-3">
        <!-- ************** City Card **************  -->
        <div class="city-card">
        <div class="icon-container">
          <img src="images/islamabad.png" alt="Marriage Hall Icon" class="icon-image">
        </div>
        <h2>Islamabad</h2>
        <img src="images/islamabad.jpg" alt="Islamabad" class="city-image">
        <p class="city-description">
          Marriage Hall  <?php echo '(10)'; ?>
        </p>
      </div>
    
    
        </div> 
        <!--**************** Column END **********-->

        <!--**************** Column Start **********-->
        <div class="col-md-6 col-lg-3">
          <!-- ************** City Card **************  -->
          <div class="city-card">
          <div class="icon-container">
            <img src="images/Karachi.png" alt="Marriage Hall Icon" class="icon-image">
          </div>
          <h2>Karachi</h2>
          <img src="images/Karachi.jpg" alt="Islamabad" class="city-image">
          <p class="city-description">
            Marriage Hall  <?php echo '(10)'; ?>
          </p>
        </div>
      
      
          </div> 
          <!--**************** Column END **********-->

          <!--**************** Column Start **********-->
        <div class="col-md-6 col-lg-3">
          <!-- ************** City Card **************  -->
          <div class="city-card">
          <div class="icon-container">
            <img src="images/hyd.png" alt="Marriage Hall Icon" class="icon-image">
          </div>
          <h2>Hyderabad</h2>
          <img src="images/hyd.jpg" alt="Islamabad" class="city-image">
          <p class="city-description">
            Marriage Hall  <?php echo '(10)'; ?>
          </p>
        </div>
      
      
          </div> 
          <!--**************** Column END **********-->

          <!--**************** Column Start **********-->
        <div class="col-md-6 col-lg-3">
          <!-- ************** City Card **************  -->
          <div class="city-card">
          <div class="icon-container">
            <img src="images/mpk.png" alt="Marriage Hall Icon" class="icon-image">
          </div>
          <h2>Mirpurkhas</h2>
          <img src="images/mpk.jpg" alt="Islamabad" class="city-image">
          <p class="city-description">
            Marriage Hall  <?php echo '(10)'; ?>
          </p>
        </div>
      
      
          </div> 
          <!--**************** Column END **********-->
                  <!--**************** ROW END **********-->
      
      <!-- Repeat the structure for other cities -->
    
    </section>
    </div>
    <div class="fluid-container  text-light mb-0 " style=" background-image: url('images/shadibg2.jpg'); height:550px;">
    <div class="container">
    <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 col-lg-5 p-5 my-5 listhall">
                <h3>Are you marriage hall owner?</h3>
                <p>Join us and list your marriage hall details and services with prices and availability completely FREE. Get listed and get booked your marriage hall immediately.</p>
                <button class="btn btn-primary ">Get Start</button>
            </div>
        </div>
        </div>    
    </div>
    
<?php 
include("footer.php");
?>
</body>
</html>