<?php
date_default_timezone_set('Asia/Kolkata');
$con = mysqli_connect("localhost","viasacad_viasacademy","{bMS@cLhG&#Q","viasacad_isoftwar_schoolcrm") or die("database server not connected");

 if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

 
 date_default_timezone_get();
$createdate = date("y-m-d");
if (isset($_POST['submit'])) {

  // Google reCAPTCHA Secret Key
  $secretKey = "6Ld2x6wqAAAAALM3KMfpoHfZ4gydpESArCkZ4QC4"; // यहाँ अपनी Secret Key डालें
  $captcha = $_POST['g-recaptcha-response'];

  // 1. Verify reCAPTCHA
  if (!$captcha) {
    echo '<script>alert("Please complete the reCAPTCHA."); window.location.href = "index.php";</script>';
    exit;
  }

  // Validate reCAPTCHA response
  $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
  $result = json_decode($response);

  if (!$result->success) {
    echo '<script>alert("reCAPTCHA verification failed. Please try again."); window.location.href = "index.php";</script>';
    exit;
  }

  // 2. Sanitize and Validate Inputs
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $message = mysqli_real_escape_string($con, $_POST['message']);
  $source = 'vedantaiasacademy.com';
  $createdate = date("y-m-d");

  // Validate phone number (only digits, 10 characters)
  if (!preg_match("/^[6-9][0-9]{9}$/", $phone)) {
    echo '<script>
        alert("Invalid phone number. Enter a 10-digit number starting with 6, 7, 8, or 9.");
        window.location.href = "index.php";
    </script>';
    exit;
}


  // Validate email format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<script>alert("Invalid email address format.");
      window.location.href = "index.php";
      </script>';
    exit;
  }

  // Validate message (check if not empty)
  if (empty($message)) {
    echo '<script>alert("Message cannot be empty.");
      window.location.href = "index.php";
      </script>';
    exit;
  }
  
  // Strip out HTML tags from the message
  $message = strip_tags($message);
  $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

  // Check for message length
  if (strlen($message) > 500) {
    echo '<script>alert("Message is too long. Please keep it under 500 characters.");
      window.location.href = "index.php";
      </script>';
    exit;
  }

  // Check for unusual character repetition
  if (preg_match('/(\w)\1{4,}/', $message)) {
    echo '<script>alert("Message contains unusual characters or repetition. Please modify your message.");
      window.location.href = "index.php";
      </script>';
    exit;
  }

  // Relax the check for invalid characters and allow punctuation
  // The allowed characters now include common punctuation marks and spaces
  if (preg_match('/[^a-zA-Z0-9\s,.\-()]/', $message)) {
    echo '<script>alert("Message contains invalid characters.");
      window.location.href = "index.php";
    </script>';
    exit;
  }

  // Define invalid keywords to filter out spam or irrelevant content
  $invalid_keywords = ['investment', 'subscribe', 'shopify', 'sales', 'free', 'guaranteed', 'promo', 'SEO', 'disclaimer', 'Youtube', 'Deal', 'savings', 'earnings', 'unsubscribe'];
  
  // Define educational keywords for UPSC or examination-related queries
  $educational_keywords = ['UPSC', 'eligibility', 'Civil Services', 'examination', 'criteria', 'age limit', 'educational qualifications', 'attempts'];

  // Flag to indicate if the message is valid
  $is_valid_message = true;

  // Check for invalid keywords (this filters out non-educational spam)
  foreach ($invalid_keywords as $keyword) {
      if (stripos($message, $keyword) !== false) {
          $is_valid_message = false;
          break;
      }
  }

  // Check if the message contains valid educational keywords (for UPSC queries)
  $is_educational_message = false;
  foreach ($educational_keywords as $keyword) {
      if (stripos($message, $keyword) !== false) {
          $is_educational_message = true;
          break;
      }
  }

  // If the message is neither valid nor educational, reject it
  if (!$is_educational_message && !$is_valid_message) {
    echo '<script>alert("Message contains advertisement or irrelevant content. Only educational queries are allowed.");
      window.location.href = "index.php";
      </script>';
    exit;
  }

  // If it's a valid message (either educational or general), store it in the database
  $result = mysqli_query($con, "INSERT INTO webenquiry(name, email, phone, message, status, source, date) VALUES('$name', '$email', '$phone', '$message', '0', '$source', '$createdate')");

  if ($result) {
    echo "<script>window.location.href = 'thankyou.html';</script>";
    exit;
  } else {
    echo '<script>alert("Failed to submit your enquiry. Please try again later.");
        window.location.href = "index.php";
        </script>';
  }
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PM2QBF85');</script>
<!-- End Google Tag Manager -->



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }

        .con_tainer {
            width: 100%;
            height: 100vh;
            background: #3c5077;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bt_n {
            padding: 10px 60px;
            background: white;
            border: 0;
            outline: none;
            cursor: pointer;
            font-size: 22px;
            font-weight: 500;
            border-radius: 30px;
        }

        .pop_up {
            width: 300px;
            background: white;
            border-radius: 6px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.1);
            text-align: center;
            padding: 0 30px 30px;
            color: #333;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
        }

        .open-popup {
            visibility: visible;
            top: 50%;
            transform: translate(-50%, -50%) scale(1);
        }

        .pop_up img {
            width: 100px;
            margin-top: -10%;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .pop_up h2 {
            font-size: 38px;
            font-weight: 500;
            margin: 30px 0 10px;
        }

        .pop_up button {
            width: 100%;
            margin-top: 50px;
            padding: 10px 0;
            background: #6fd649;
            color: white;
            border: 0;
            outline: none;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }

        .input_btn {
            text-decoration: none;
            color: white;
        }

        .input_btn:hover {
            color: yellow;
        }
    </style>
</head>

<body>
    
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PM2QBF85"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



 <?php

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo "<script>alert('Name should contain only alphabets'); </script>";
        } else {
            $email = $_POST['email'];
            $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
            if (!preg_match($pattern, $email)) {
                echo "<script>alert('Invalid Email Address! Please Enter a Valid Email Address.');</script>";
            } else {
                $phone = $_POST['phone'];
                if (strlen($phone) > 11 && strlen($phone) < 0 || !is_numeric($phone)) {
                    echo "<script>alert('Invalid Phone No.! Please Enter a Valid Phone Number.');</script>";
                } else {
                    $msg = $_POST['message'];
                    $to = "vedantaiasacademy@gmail.com";
                    $subject = "Vedanta Ias Academy Enquiry";

                    $message = '
                        <h3 align="center">Vedanta Ias Academy</h3>
                        <table border="1" width="100%" cellpadding="5" cellspacing="5">
                          <tr>
                            <td width="30%"> Name</td>
                            <td width="70%">' . $_POST["name"] . '</td>
                          </tr>

                          <tr>
                            <td width="30%">Email Id</td>
                            <td width="70%">' . $_POST["email"] . '</td>
                          </tr>

                          <tr>
                            <td width="30%">Message</td>
                            <td width="70%">' . $_POST["message"] . '</td>
                          </tr>
                          <tr>
                            <td width="30%">Phone</td>
                            <td width="70%">' . $_POST["phone"] . '</td>
                          </tr>

                        </table>
                      ';

                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'From: <websiteenquiry@example.com>' . "\r\n";

                    if (mail($to, $subject, $message, $headers)) {
    ?>
                        <div class="con_tainer">
                            <div class="pop_up open-popup" id="pop_up open-popup">
                                <img src="images\download.png">
                                <h2>Thank You!</h2>
                                <p>Your details have been submitted successfully</p>
                                <button type="button">
                                    <a class="btn input_btn mb-4" href="index.php">OK</a>
                                </button>
                            </div>
                        </div>
    <?php
                    } else {
                        echo "error";
                    }
                }
            }
        }
    }

    ?>
   
</body>

</html>