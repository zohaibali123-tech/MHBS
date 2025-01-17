<?php 
// session_start();
include("dashboard/db.php"); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="path/to/owl.carousel.min.css">
<link rel="stylesheet" href="path/to/owl.theme.default.min.css">
    
<title>User Login</title>

<?php include("nav.php");?>



<div class="container shadow text-center border-2 p-5 rounded-5 my-5">
    <div class="row align-items-center justify-content-between my-0 ">
    <div class="col-12 col-md-6">
                <img src="images/login.png" alt="" class="img-fluid rounded w-75">
            </div>   
    
            
    <div class="col-12 col-md-6 align-self-center ">
        
            <form action="loginProcess.php" method="POST" class="form border rounded border-primary shadow col-8 p-3">
            <h1 class="text-primary ">User LOGIN</h1>
                
                <input type="text" name="email" id="" placeholder="Email" class="form-control mb-2">
                <input type="password" name="password" id="" placeholder="Password" class="form-control mb-2">
                <button type="submit" class="btn w-25 btn-outline-primary mb-2" name="login">Login</button>
                <p class="mt-2"> Create a new Account <a href="signup.php" class="text-primary nav-link d-inline" >Sign Up</a></p>
            </form>

    </div>
        
    </div>
</div>

<?php include("footer.php");  ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
