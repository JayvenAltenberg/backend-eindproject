<?php
include('../includes/db.php');
session_start();

if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $sql = $pdo->prepare("SELECT `token`,`verify_status` FROM `users` WHERE `token`='$token' LIMIT 1");
        $sql->execute();
        if ($sql->rowCount() > 0) {
                $verify_token = $sql->fetch(PDO::FETCH_ASSOC);
                if ($verify_token['verify_status'] == "0") {
                        $sql = $pdo->prepare("UPDATE `users` SET `verify_status` = '1' WHERE `token`='$token' LIMIT 1");
                        if ($sql->execute()) {
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
