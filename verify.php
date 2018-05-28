<?php
curl -X GET \
-H 'Authorization: Bearer {ENTER_ACCESS_TOKEN}' \
https://api.line.me/v1/oauth/verify

$access_token = 'FWAnBvc7hl9c/l96z7jXEtWqAm1JVGl+AWZz51ubTNwSiHsqWqSfZtjazFpBGo5MXq/zFQwLGzGGl4464dTZ91gxkHZYD7Og9slH1QnoTHI97ZgmEQpUWKwiVk9w5kdt76K+jcdddKyTzjF+YCaYHQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
