<?php
    include_once 'connectDB.php';
    include_once 'functions.php';
    
    $url = $_POST['url'];
    $url = addhttp($url);

    if (!isValidURL($url)) {
        header('location: index.php?error=invalid_url');
        exit();
    }

    do {
        $short = generateRandomString();
    } while (shortUrlExists($conn, $short));

    $stmt = $conn->prepare('INSERT INTO url (original_url, short_url) VALUES (?, ?)');
    $stmt->bindParam(1, $url);
    $stmt->bindParam(2, $short);

    $stmt->execute();

    echo "<br>http://localhost/mini-url/?url={$short}";
?>
