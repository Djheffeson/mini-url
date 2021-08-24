<?php

include_once 'connectDB.php';
include_once 'functions.php';

if(!(isset($_GET['url']) && $_GET['url']!="")) { 
    header("location: http://localhost/mini-url/?error=invalidUrl");
    exit();
}

$url=urldecode($_GET['url']);

if ($result = shortUrlExists($conn, $url)) {
    header("location: " . $result['original_url']);
    exit();
}
header("location: http://localhost/mini-url/?error=invalidUrl");

?>
