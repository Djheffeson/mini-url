<?php

function generateRandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $length = 6;
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[rand(0, $charactersLength - 1)];
    }
    return $string;
}

function shortUrlExists($conn, $short_url)
{
    $sql = "SELECT * FROM url WHERE short_url = '{$short_url}';";
    foreach ($conn->query($sql) as $row) {
        return $row;
    }
    return false;
}
