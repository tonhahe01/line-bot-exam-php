<?php



require "vendor/autoload.php";

$access_token = 'AAbp8VHPX8Nj3IAXk9qgMihub95O4mAfpHVvDYBbH4YJ1DDJADiIvxjaA/K0Ugr8Xq/zFQwLGzGGl4464dTZ91gxkHZYD7Og9slH1QnoTHLmLH9Am9WcNlXKs3Tu3RFVV/vyP3Ws5xUhIR12vHHgRwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '75c03f392f6e53d662d6f5a8db9e421f';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







