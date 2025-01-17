<?php 
// session_start();

include("../links.php");
include("db.php");
include("../functions.php");
// include("session.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>MHBS</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* Add your custom styles here */
    
    
      body {
      padding-top: 56px;
      padding-left:280px;
      background-color:#ffff;
      height:auto;
    } 
    @media (min-width: 992px) {
  .sidebar {
    position: fixed;
  }
}
@media (max-width: 991px) {
  .sidebar {
    position: static;
  }
}
    .sidebar {
      /* position: fixed; */
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 1000;
      padding-top: 3.5rem;
      box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
      margin-top:20px;
      
    } 
    
    .nav-link {
      padding: 0.8rem 1rem;
      height: 40px;
      color: white;
      margin-top:5px;
      padding:10px;
    }
    .nav-link.active {
      background-color: red;
    }
    .nav-link:hover{
        background-color: red;
        color: white;
    }
  </style>
</head>
<body><!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <a class="navbar-brand" href="dashboard.php">Project Name</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="../images/profile.png" alt="Profile Image" width="30" height="30" class="rounded-circle">
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">
            <?php echo getUsernameByID($_SESSION['userid']); ?> 
            <a  class="dropdown-item" href="../index.php">Main Web</a>
            </a>
            <div class="dropdown-divider"></div>
            
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-3 col-lg-2 sidebar bg-dark d-md-block d-lg-block">
    <div class="position-sticky">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="bi bi-speedometer2"></i> Dashboard
            </a>
          </li>  
        <li class="nav-item">
            <a class="nav-link" href="myhall.php">
            <i class="bi bi-building"></i> My Hall
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="mybooking.php">
              <i class="bi bi-calendar"></i> My Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="mymenu.php">
              <i class="bi bi-card-list"></i> My Menu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="hallcharges.php">
              <i class="bi bi-cash"></i> Hall Charges
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="photo-service.php">
              <i class="bi bi-camera-video"></i> Photo/Video Service
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="myhallimages.php">
            <i class="bi bi-file-image"></i> My Hall Images
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="myprofile.php">
              <i class="bi bi-person-circle"></i> My Profile
            </a>
          </li>
        </ul>
      </div>
    </div>
    </nav>


<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>

