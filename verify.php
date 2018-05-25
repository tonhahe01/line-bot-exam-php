<?php
$access_token = 'AAbp8VHPX8Nj3IAXk9qgMihub95O4mAfpHVvDYBbH4YJ1DDJADiIvxjaA/K0Ugr8Xq/zFQwLGzGGl4464dTZ91gxkHZYD7Og9slH1QnoTHLmLH9Am9WcNlXKs3Tu3RFVV/vyP3Ws5xUhIR12vHHgRwdB04t89/1O/w1cDnyilFU=
';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
