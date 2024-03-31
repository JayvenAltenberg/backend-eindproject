<?php
$host = 'localhost';
$dbname = '2.0_products';
$username = 'bit_academy';
$password = 'bit_academy';
$host = '127.0.0.1'; // Use localhost or IP address
$port = '3306'; // Default MySQL port


try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
} catch (PDOException $th) {
    echo "database error: " . $th->getMessage();
    exit();
}
