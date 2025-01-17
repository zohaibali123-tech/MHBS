<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
 
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:18px;
  display:inline-block;
  line-height:50px;
  width:50px;
  height:50px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  
}
.social-icons a.facebook:hover
{
  background-color:#3b5998
}
.social-icons a.twitter:hover
{
  background-color:#00aced
}
.social-icons a.linkedin:hover
{
  background-color:#0077B5;
}
  </style>
</head>
<body>

<!-- Navbar -->
<?php include("nav.php"); ?>

<!-- About Section -->
<!-- About Section -->
<section class="about-section py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Welcome to Our Online Hall Booking System</h2>
        <p>
          We are dedicated to simplifying the process of booking halls and venues for various events and occasions. Our platform offers a user-friendly interface that allows users to explore, select, and book halls effortlessly.
        </p>
        <p>
          Whether it's a wedding, corporate event, birthday celebration, or any special occasion, our platform provides a diverse range of halls and venues to suit your needs.
        </p>
        <p>
          With secure registration and easy booking procedures, we aim to provide a seamless experience for both hall owners and users.
        </p>
        <a href="#" class="btn btn-primary">Get Started</a>
      </div>
      <div class="col-md-6">
        <!-- Location Map Embed (Google Maps) -->

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d316.50497528683185!2dYOUR-LONGITUDE!3dYOUR-LATITUDE!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3AYOUR-BUSINESS-NAME!2sYour%20Business!5e0!3m2!1sen!2sus!4v1637662802898!5m2!1sen!2sus" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <!-- Replace YOUR-LONGITUDE, YOUR-LATITUDE, and YOUR-BUSINESS-NAME with your location's details -->
        

      </div>
        <!-- Replace YOUR-LONGITUDE, YOUR-LATITUDE, and YOUR-BUSINESS-NAME with your location's details -->
      </div>
    </div>
  </div>
</section>

<section class="about-section py-5">
  <div class="container">
    <h2 class="text-center mb-4">Our Team</h2>
    <div class="row">
      <!-- Team Member 1 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/profile.jpg" class="card-img-top" alt="Team Member 1">
          <div class="card-body text-center">
            <h5 class="card-title">Abdul Jabbar</h5>
            <p class="card-text">Back-End Developer</p>
            <p class="card-text">Programmed Whole Back-End of Project</p>
            <!-- Add social icons if needed -->
            <div class="social-icons ">
              <a href="#" class="facebook"><i class=" fab fa-facebook-f "></i></a>
              <a href="#" class="twitter"><i class="fab fa-twitter "></i></a>
              <a href="#" class="linkedin"><i class="fab fa-linkedin "></i></a>
              <!-- Add more social icons -->
            </div>
          </div>
        </div>
      </div>
      <!-- Team Member 2 -->
      <div class="col-md-6  mb-4 ">
        <div class="card w-50">
          <img src="images/profile1.jpg" class="card-img-top " alt="Team Member 1">
          <div class="card-body text-center">
            <h5 class="card-title">Zohaib Ali</h5>
            <p class="card-text">Front-End Developer</p>
            <p class="card-text">Develop Front-End of Project</p>
            <!-- Add social icons if needed -->
            <div class="social-icons ">
              <a href="#" class="facebook"><i class=" fab fa-facebook-f "></i></a>
              <a href="#" class="twitter"><i class="fab fa-twitter "></i></a>
              <a href="#" class="linkedin"><i class="fab fa-linkedin "></i></a>
              <!-- Add more social icons -->
            </div>
          </div>
        </div>
      </div>
     
       <!-- Team Member 3 -->
       <div class="col-md-6  mb-4">
        <div class="card">
          <img src="images/profile2.jpg" class="card-img-top" alt="Team Member 1">
          <div class="card-body text-center">
            <h5 class="card-title">Barkat Ali</h5>
            <p class="card-text">Database Designer</p>
            <p class="card-text">Design Data Flow in Project</p>
            <!-- Add social icons if needed -->
            <div class="social-icons ">
              <a href="#" class="facebook"><i class=" fab fa-facebook-f "></i></a>
              <a href="#" class="twitter"><i class="fab fa-twitter "></i></a>
              <a href="#" class="linkedin"><i class="fab fa-linkedin "></i></a>
              <!-- Add more social icons -->
            </div>
          </div>
        </div>
      </div>
      <!-- Team Member 4 -->
      <div class="col-md-6  mb-4">
        <div class="card">
          <img src="images/profile3.jpg" class="card-img-top" alt="Team Member 1">
          <div class="card-body text-center">
            <h5 class="card-title">Muhammad Waseem</h5>
            <p class="card-text">UI/UX Designer </p>
            <p class="card-text">Design Complete Project in Figma </p>
            <!-- Add social icons if needed -->
            <div class="social-icons ">
              <a href="#" class="facebook"><i class=" fab fa-facebook-f "></i></a>
              <a href="#" class="twitter"><i class="fab fa-twitter "></i></a>
              <a href="#" class="linkedin"><i class="fab fa-linkedin "></i></a>
              <!-- Add more social icons -->
            </div>
          </div>
        </div>
      </div>
     
      <!-- Add more team members -->
      <!-- ... -->
    </div>
  </div>
</section>

<!-- Footer -->
<?php include("footer.php"); ?>
<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
