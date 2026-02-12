<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Registration – Vedanta IAS Academy</title>
<meta name="description" content="Register online for UPSC coaching at Vedanta IAS Academy. Secure your seat in Foundation, Target, or Optional courses today.">
<meta name="keywords" content="UPSC Online Registration, IAS Course Admission, Vedanta IAS Apply Online, Enroll Civil Services Coaching, Register Now IAS">
   <link rel="canonical" href="https://www.vedantaiasacademy.com/onlineregistration.php" />

    <?php
    include 'include/header.php';
    ?>

    <div class="container-fluid bg-info py-3">
        <div class="container">
            <h1 class="fw-bolder"><i class="fa fa-file-alt"></i> Online Registration Form</h1>
            <p>New batches start every month on <strong>2nd</strong> and <strong>16th</strong></p>
        </div>
    </div>
    <div class="container py-3">
        <a href="index.php" class="text-dark"><i class="fa fa-home"></i></a> &nbsp;
        <i class="fa fa-angle-right"></i>
        <a href="about.php" class="text-decoration-none text-dark">About Us</a> &nbsp;
        <i class="fa fa-angle-right"></i> &nbsp; <span class="text-muted"> Online Registration Form</span>
    </div>

    <div class="container">
        <div class="row py-3">
        <div class="col-sm-7">
            <div class="form-section">
                <form action="server.php" method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}">
                    </div>

                    <!-- <div class="mb-3">
                        <label for="course" class="form-label">Select Course <span class="text-danger">*</span></label>
                        <select class="form-select" id="course" name="course" required>
                            <option value="">-- Choose Course --</option>
                            <option value="foundation">Foundation Batch</option>
                            <option value="target">Target Batch</option>
                            <option value="crash">Crash Course</option>
                            <option value="unique">Unique Batch</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mode" class="form-label">Preferred Mode <span class="text-danger">*</span></label>
                        <select class="form-select" id="mode" name="mode" required>
                            <option value="">-- Choose Mode --</option>
                            <option value="offline">Offline (Delhi Campus)</option>
                            <option value="online">Online Live Classes</option>
                        </select>
                    </div> -->

                    <div class="mb-3">
                        <label for="message" class="form-label">Additional Message (Optional)</label>
                        <textarea class="form-control" id="message" name="message" rows="3"
                            placeholder="Any questions or preferences..."></textarea>
                    </div>

              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6Ld2x6wqAAAAAG0jZ-be7zmjGntAj0HgHWtWapd5"
                  data-callback="enableSubmitBtn"></div>
              </div>

                    <div class="d-grid pt-3">
                        <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit Registration</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-5 px-4">
            <b>Important Instructions:</b>
            <ul class="mb-4">
                <li>To take admission in our Institute Rs.5000/- will be chargeable as registration fee.</li>
                <li>Registration Fee is non refundable and will be adjust in your total course fee.</li>
                <li>After registered successfully, you will receive a Token No. Kindly bring this at the time of
                    admission.</li>
                <li>As batch will start for selected course and according to availability, You will receive a
                    confirmation call.</li>
                <li>By registering you are giving us consent to send e mail / WhatsApp message / SMS regarding your
                    course update and student material.</li>
            </ul>
            <div class="text-center">
            <iframe src="https://www.youtube.com/embed/1C3n5LJ2Oec?si=rCrD_vqdSDYilfWp" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen class="img-fluid "></iframe>
            </div>
        </div>
        </div>
    </div>

<?php
include 'include/footer.php';
?>


  </body>

</html>