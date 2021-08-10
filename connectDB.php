<?php

$serverName = "localhost";
$userName = "root";
$password = "wearMask24@";
$dbName = "miniURL";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected". PHP_EOL;
} catch (PDOException $e) {
    header('location: index.php?error=databaseError');
}
