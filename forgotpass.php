<?php
require("dbconnect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_POST) {
    $u_email = $_POST['email'];

    $q = mysqli_query($con, "select * from register where u_email='{$u_email}'");
    $count = mysqli_num_rows($q);

    if ($count == 1) {
        $row = mysqli_fetch_array($q);
        $msg = "Your Password is::" . $row['u_password'];


        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'sohilvora2000@gmail.com';                     //SMTP username
            $mail->Password   = 'pxyydfhfkevqvffp';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('sohilvora2000@gmail.com', 'Sohil Vora');
            $mail->addAddress($u_email, 'Sohil Vora');     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = $msg;
            $mail->AltBody = $msg;

            $mail->send();
            echo "<script>alert('Password has been sent in your Email'); window.location='index.php';</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('Email not found');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body>
    <div class="container justify-content-md-center pt-4 ">
        <form action="" method="POST" class="col-lg-4">
            <h1>Forgot Passsword</h1>
            <br><br>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <br>
            <a href="index.php" class="btn btn-info">Home</a>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</body>

</html>