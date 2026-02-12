<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 require 'phpmailer/src/Exception.php'; 
 require 'phpmailer/src/PHPMailer.php'; 
 require 'phpmailer/src/SMTP.php'; 
 
// $con = mysqli_connect("localhost", "afteinst_crm", "hXJc2E!w6Ae~", "aftecrm") or die("database server not connected");
$con = mysqli_connect("localhost","viasacad_viasacademy","{bMS@cLhG&#Q","viasacad_isoftwar_schoolcrm") or die("database server not connected");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

if(isset($_POST['submit']))
 {
    if(empty($_POST['name']))
    {
        $nameErr="Name is Required";
    }
    else 
    {
         $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

      if(empty($_POST['phone']))
    {
        $mobileErr="Mobile is Required";
    }
    else 
    {
         $phone = test_input($_POST["phone"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]{10}+$/",$phone)) {
      $mobileErr = "Only numbers allowed";
    }
    }
$message = "";
$createdate = date("Y-m-d H:i:s");
$source = "vedanta ias academy/ias";

    // =================================================================
    
    $result = mysqli_query($con, "INSERT INTO webenquiry(name, email, phone, message, status, source, date) VALUES('$name', '$email', '$phone','$message', '0','$source', '$createdate')");

    // =================================================================
 
//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.vedantaiasacademy.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                  //SMTP password
     $mail->Username   = 'ias@vedantaiasacademy.com';                     //SMTP username
    $mail->Password   = '123456#@!@!1234';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('ias@vedantaiasacademy.com', 'Mailer');
    $mail->addAddress('ias@vedantaiasacademy.com', 'Vedanta Ias Enquiry');     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Website Enquiry - Vedanta Ias Academy';
    $mail->Body    = '<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"font-family: sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <!-- Logo -->
                    <tr>
                        <td style="text-align:center;">
                          <a href="https://vedantaiasacademy.com/ias/" title="logo" target="_blank">
                            <img width="200" src="https://vedantaiasacademy.com/ias/img/logo.jpg" title="logo" alt="logo">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <!-- Title -->
                                <tr>
                                    <td style="padding:0 15px; text-align:center;">
                                        <h1 style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:sans-serif;">IAS</h1>
                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; 
                                        width:100px;"></span>
                                    </td>
                                </tr>
                                <!-- Details Table -->
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0"
                                            style="width: 100%; border: 1px solid #ededed">
                                            <tbody>
                                            <tr>
                                            <td
                                                style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                Name:</td>
                                            <td
                                                style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                '.$_POST['name'].'</td>
                                               </tr>
                                                
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        Email:</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        '.$_POST["email"].'</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        Mobile No:</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        '.$_POST["phone"].'</td>
                                                </tr>
                                                
                                                 <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        Course:</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        '.$_POST['course'].'</td>
                                                </tr>
                                               
                                                                                               
                                               
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                                <p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;">&copy; <strong>https://vedantaiasacademy.com/ias/index.html</strong></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
 ';

    $mail->send();
        echo "<script>window.location.href = 'thankyou.html';</script>";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


 }


 function test_input($data) 
    {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
   }

?>