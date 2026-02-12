<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Vedanta IAS Academy | Reach Out for UPSC Coaching</title>
  <meta name="description"
    content="Get in touch with Vedanta IAS Academy for inquiries about UPSC coaching programs, admissions, and more. We're here to assist you.">
  <meta name="keywords"
    content="Contact Vedanta IAS, UPSC Coaching Contact, IAS Academy Delhi Address, Phone Vedanta IAS, UPSC Email Help">
  <link rel="canonical" href="https://www.vedantaiasacademy.com/contact.php" />


  <?php
  include 'include/header.php';
  ?>



  <div class="container-fluid p-0">
    <img src="img/contact.jpeg" alt="Contact" class="w-100" />
  </div>


  <div class="container-fluid text-center text-primary py-4">
    <div class="container">
      <h1 class="fw-bolder"> Contact Us – <span class="text-danger">Vedanta IAS Academy</span></h1>
      <p>India’s Premier Institute for UPSC Preparation</p>
    </div>
  </div>

  <!-- Breadcrumb -->
  <div class="container mt-3">
    <a href="index.php" class="text-dark text-decoration-none"><i class="fa fa-home"></i></a>
    &nbsp; <i class="fa fa-angle-right"></i>
    &nbsp; <span class="text-muted">Contact Us</span>
  </div>

  <!-- Contact Info and Form -->
  <div class="container my-5">
    <div class="row g-4">

      <!-- Contact Info -->
      <div class="col-md-5">
        <div class="contact-info">
          <h4 class="mb-3"><i class="fa fa-university text-danger"></i> Our Office</h4>
          <p><strong>Vedanta IAS Academy</strong></p>
          <p>D-11/156 Sector 8 Rohini Landmark - Opp-pillar No-389 Rohini East Metro Station Delhi-85</p>

          <h5 class="mt-4"><i class="fa fa-phone text-danger"></i> Call Us</h5>
          <p><a href="tel:+919911753333" class="text-decoration-none">+91 9911753333</a></p>

          <h5 class="mt-3"><i class="fa fa-envelope text-danger"></i> Email</h5>
          <p><a href="mailto:vedantaiasacademy@gmail.com" class="text-decoration-none">vedantaiasacademy@gmail.com</a>
          </p>

          <h5 class="mt-3"><i class="fa fa-clock text-danger"></i> Office Hours</h5>
          <p>Mon – Sat: 9:00 AM to 6:00 PM</p>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-md-7">
        <div class="contact-form">
          <h4 class="mb-3"><i class="fa fa-paper-plane text-danger"></i> Send Us a Message</h4>
          <form action="server.php" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Full Name *</label>
              <input type="text" class="form-control" id="name" name="name" required />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email *</label>
              <input type="email" class="form-control" id="email" name="email" required />
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone *</label>
              <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}" />
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Your Message *</label>
              <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <div class="mb-3">
              <div class="g-recaptcha" data-sitekey="6Ld2x6wqAAAAAG0jZ-be7zmjGntAj0HgHWtWapd5"
                data-callback="enableSubmitBtn"></div>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg" name="submit"><i
                  class="fa fa-paper-plane text-warning"></i>&nbsp; Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Google Map -->
  <div class="container mb-5">
    <div class="map-responsive">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224345.83908836447!2d77.06889925520304!3d28.527582000000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce2de5a14c4a9%3A0x4d92f0484c6d6b84!2sOld%20Rajinder%20Nagar%2C%20New%20Delhi%2C%20Delhi!5e0!3m2!1sen!2sin!4v1700000000000"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
      </iframe>
    </div>
  </div>


  <?php
  include 'include/footer.php';
  ?>


  </body>

</html>