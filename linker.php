<?php

include_once 'connectDB.php';
include_once 'functions.php';

if(!(isset($_GET['url']) && $_GET['url']!=""))
{ 
    echo "<p>Invalid URL</p>";
    exit();
}

$url=urldecode($_GET['url']);

if ($result = shortUrlExists($conn, $url)) {
    header("location: {$result['original_url']}");
}
