<!DOCTYPE html>
<html lang="en">

<head>
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
            top: 0;
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

    <?php

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $msg = $_POST['msg'];


        $to = "vedanta5233@gmail.com";
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
            <td width="70%">' . $_POST["msg"] . '</td>
          </tr>
          <tr>
            <td width="30%">Phone</td>
            <td width="70%">' . $_POST["mobile"] . '</td>
          </tr>
          
        </table>
      ';

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <websiteenquiry>' . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            ?>
            <div class="con_tainer">
                <div class="pop_up open-popup" id="pop_up open-popup">
                    <img src="image\download.png">
                    <h2>Thank You!</h2>
                    <p>Your details has been submited successfully</p>
                    <button type="button">
                        <a class="btn input_btn mb-4" href="index.html">OK</a>

                    </button>
                </div>
            </div>


            <?php


        } else {
            echo "error";
        }

    }
    ?>



</body>


</html>