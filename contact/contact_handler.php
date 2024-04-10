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



function verify_email($username, $message, $email)
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
        $mail->addAddress($_ENV['GMAIL_USERNAME']);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'contact message';
        $mail->Body    = "<p>message from $username,</p>
        <p>$message</p>
    ";
        if ($mail->send()) {
            header("location: contact.php");
        }
        echo 'Message has been sent';
        $_SESSION['status'] = 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
$username = $_POST['name'];
$message = $_POST['message'];
$email = $_POST['email'];
verify_email($username, $message, $email);