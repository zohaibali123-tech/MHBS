    <title>Sign Up Form</title>
    <?php  include("nav.php"); 
            include("dashboard/db.php");
            
    ?>

    <!-- <div class="fluid-container border-4 "> -->
    <div class="container shadow text-center border-2 p-5 rounded-5 my-5">
        <div class="row align-items-center justify-content-between my-0 ">
                <div class="col-12 col-md-6">
                    <img src="images/wellcome.png" alt="" class="img-fluid rounded w-75">
                </div>    
                <div class="col-12 col-md-6 align-self-center ">
                
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="form border rounded border-primary  col-8 p-3">
                <h1 class="text-primary ">Sign Up Form</h1>

                    <input type="text" name="fullname" id="" placeholder="Full Name" class="form-control mb-2">
                    <input type="email" name="email" id="" placeholder="Email" class="form-control mb-2">
                    <input type="password" name="password" id="" placeholder="Password" class="form-control mb-2">
                    <input type="text" name="mobile" id="" placeholder="Contact#" class="form-control mb-2">
                    
                    <button type="submit" class="btn w-25 btn-outline-primary mb-2 " name="signup">Sign Up</button>
                    <p class="mt-2"> Already have an Account <a href="loginform.php " class="text-primary nav-link d-inline" >Login </a></p>
                </form>

                <?php 
                if(isset($_POST['signup'])){
                                        
                    
                    $fullname  = mysqli_real_escape_string($con,$_POST['fullname']);
                    $email     = mysqli_real_escape_string($con,$_POST['email']);
                    $mobile    = mysqli_real_escape_string($con,$_POST['mobile']);
                    $password  = $_POST['password'];
                    
                    


                    $check = "SELECT `email` FROM `users` WHERE email='$email'";
                    $insert = "INSERT INTO `users`(`id`, `fullname`, `email`,`mobile`, `password`)
                    VALUES ('','$fullname','$email','$mobile','$password')";

                    $query = mysqli_query($con,$check)or die(mysqli_error($con));

                    $record = mysqli_num_rows($query);

                    if($record > 0 ) {
                        echo "<div class='alert alert-danger'>Already Email Registered!</div>";
                        
                    }
                    else {
                        mysqli_query($con,$insert);
                        echo "<div class='alert alert-success'>Account Created Successfully</div>";
                    }
                                    }
                
                ?>
                </div>
            
        </div>
    </div>
     <!-- </div> -->
    <?Php include("footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
