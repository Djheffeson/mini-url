<?php

function addhttp($url)
{
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

function isValidURL($url)
{
    $url = filter_var($url, FILTER_VALIDATE_URL);
    $curl = curl_init($url);

    curl_setopt_array($curl, array(
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_NOBODY => TRUE,
        CURLOPT_HEADER => FALSE,
        CURLOPT_RETURNTRANSFER => FALSE,
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_SSL_VERIFYPEER => FALSE
    ));

    $response = curl_exec($curl);

    $httpCode = curl_getinfo($curl, CURLINFO_EFFECTIVE_URL);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    return (200 === $httpCode);
}

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
