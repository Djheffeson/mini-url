<?php

include_once 'connectDB.php';
include_once 'functions.php';

$url = urldecode($_REQUEST["url"]);

if (!filter_var($url, FILTER_VALIDATE_URL)) {
    echo "Invalid url.";
    exit();
}

do {
    $short = generateRandomString();
} while (shortUrlExists($conn, $short));

$stmt = $conn->prepare('INSERT INTO url (original_url, short_url) VALUES (?, ?)');
$stmt->bindParam(1, $url);
$stmt->bindParam(2, $short);

$stmt->execute();

echo "http://localhost/mini-url/?url={$short}";

?>
