<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles for the contact page */

.contact-section {
  padding: 80px 0;
}

.contact-info h2,
.contact-form h2 {
  margin-bottom: 30px;
}

.contact-info ul {
  list-style: none;
  padding-left: 0;
  font-size: 16px;
}

.contact-info ul i {
  margin-right: 10px;
}

.social-icons a {
  color: #fff;
  font-size: 24px;
  margin-right: 15px;
}

.social-icons a:last-child {
  margin-right: 0;
}

.contact-form .form-group {
  margin-bottom: 20px;
}

.contact-form button {
  font-size: 18px;
}

  </style>
</head>
<body>

<!-- Navbar -->
<?php include("nav.php"); ?>
<!-- Contact Section -->
<section class="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="contact-info">
          <h2>Contact Us</h2>
          <p>Feel free to get in touch with us.</p>
          <ul class="list-unstyled">
            <li><i class="fas fa-map-marker-alt"></i> Sindh University Campus Mirpurkhas</li>
            <li><i class="fas fa-phone"></i> +923137829513</li>
            <li><i class="fas fa-envelope"></i> info@example.com</li>
          </ul>
          <div class="social-icons mx-1 ">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="contact-form">
          <h2>Send a Message</h2>
          <form>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Your Email">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<?php include("footer.php"); ?>
<!-- Bootstrap JS, Font Awesome, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
