<?php

session_start();

require_once "../vendor/autoload.php";
include("../includes/db.php");
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load environment variables from a .env file
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();



function verify_email($username, $email, $token)
{
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Port       = 465;
        $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;
        $mail->Username   = $_ENV['GMAIL_USERNAME']; //get the username from the .env file for safety
        $mail->Password   = $_ENV['GMAIL_PASSWORD']; //get the password from the .env file for safety

        // Recipients
        $mail->setFrom($_ENV['GMAIL_USERNAME'], '2.0 products');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'email verifacation from 2.0 products';
        $mail->Body    = "<p>Hello $username,</p>
        <p>Thank you for registering with our website. To complete your registration, please click the following link:</p>
        <p><a href='http://localhost:8000/register-login/verify-email.php?token=$token'>Verify Email</a></p>
        <p>If you didn't register on our website, please ignore this email.</p>
        <p>Best regards,<br>2.0 products Team ;)</p>
    ";

        $mail->send();
        $_SESSION['status'] = 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


if (isset($_POST['submit'])) {
    $errors = [];
    //naming veriables
    $email = $_POST['email'];
    $username = $_POST['username'];
    $token = md5(rand());
    $_SESSION['coupon'] = $coupon = md5(rand());
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;

}
//validating email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   
    $_SESSION['errors'] = $email . ' is NOT a valid email address.';
    header("location: register.php");
}

    // Check if email already exists
    $sql = $pdo->prepare("SELECT * FROM `users` WHERE `email` = ?");
    $sql->execute([$email]);
    $email_check = $sql->rowCount();
    if ($email_check > 0) {
        $errors['email'] = 'email already exists';
    }

    //check if there are errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            $_SESSION['errors'] = $error;
        }
        header("location: register.php");
        exit();
    }
    verify_email($username, $email, $token);
    //insert into the database
    $sql = $pdo->prepare("INSERT INTO `users` (`email`, `username`,`token`) VALUES (?,?,?)");
    if ($sql->execute([$email, $username, $token])) {
        $_SESSION['status'] = 'registration successful! Please verify your email';
        $sql = $pdo->prepare("INSERT INTO `coupon` (`code`, `discount`) values(?,?)");
        $sql->execute([$coupon, 5]);
        header("location: register.php");
    } else {
        $_SESSION['errors'] = 'registration error';
        header("location: register.php");
    }

