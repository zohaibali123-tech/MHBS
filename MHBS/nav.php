<?php 
session_start();
include("dashboard/db.php");
include("functions.php");
// include("session.php");
include("links.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<title>Dashboard</title>
   
     <!-- Navigation Bar -->
     <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg " data-bs-theme="dark">
        <div class="container-fluid  ">
    <a class="navbar-brand" href="index.php">MHEMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-4  w-100 justify-content-center">
        <li class="nav-item mx-2">
          <a class="nav-link active " aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="weddingvenue.php">Wedding Venus</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="contact.php">Contact us</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="aboutus.php">About us</a>
        </li>
        </ul>
        <form class="container justify-content-end mx-lg-5 px-5">
     <h4 class="nav-item dropdown  btn btn-outline-success">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="images/profile.png" alt="Profile Image" width="30" height="30" class="rounded-circle">
                <?php 
                if(isset($_SESSION['userid'])) {
                  echo getUsernameByID($_SESSION['userid']);
                  
                  echo '
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="dashboard/dashboard.php">Dashboard</a></li>
                      <li><a class="dropdown-item" href="dashboard/logout.php">Logout</a></li>
                  </ul>';
                } else 
                echo 'Login/SignUp';
                echo '
                </a>
                <ul class="dropdown-menu ">
                <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
                <li><a class="dropdown-item" href="loginform.php">Login</a></li>
                </ul>
                '?>
            
              </h4>
  </form>
 </div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
