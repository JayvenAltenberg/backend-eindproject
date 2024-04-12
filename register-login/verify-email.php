<?php
require_once "../vendor/autoload.php";
include('../includes/db.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load environment variables from a .env file
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

function verify_email($username, $email, $coupon)
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
        $mail->Subject = 'Coupon code 2.0 product';
        $mail->Body    = "<p>Hello $username,</p>
        <p>Thank you for registering with our website. Here is your coupon code: $coupon</p>";

        $mail->send();
        $_SESSION['status'] = 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_GET['token'])) {
        $coupon = $_SESSION['coupon'];
        $token = $_GET['token'];
        $email = $_SESSION['email'];
        $username = $_SESSION['username'];
        $sql = $pdo->prepare("SELECT `token`,`verify_status` FROM `users` WHERE `token`='$token' LIMIT 1");
        $sql->execute();
        if ($sql->rowCount() > 0) {
                $verify_token = $sql->fetch(PDO::FETCH_ASSOC);
                if ($verify_token['verify_status'] == "0") {
                        $sql = $pdo->prepare("UPDATE `users` SET `verify_status` = '1' WHERE `token`='$token' LIMIT 1");
                        if ($sql->execute()) {
                                verify_email($username, $email, $coupon);
                                $_SESSION['status'] = "Email verified";
                                header("location: register.php");
                        } else {
                                $_SESSION['error'] = 'could not verify email try again later';
                                header("location: register.php");
                        }
                } else {
                        $_SESSION['error'] = 'email already verified';
                        header("location: register.php");
                        exit();
                }
        } else {
                $_SESSION['error'] = 'could not verify email try again later';
                header("location: register.php");
        }
}
