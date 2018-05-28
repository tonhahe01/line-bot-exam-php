<?php
$access_token = 'FWAnBvc7hl9c/l96z7jXEtWqAm1JVGl+AWZz51ubTNwSiHsqWqSfZtjazFpBGo5MXq/zFQwLGzGGl4464dTZ91gxkHZYD7Og9slH1QnoTHI97ZgmEQpUWKwiVk9w5kdt76K+jcdddKyTzjF+YCaYHQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data


<?php
stream_context_set_default([
		'ssl' => [
			'verify_peer' => false,
			'verify_peer_name' => false,
		]
]);


$spreadsheet_url="https://docs.google.com/spreadsheets/d/e/2PACX-1vSPeOnhVSU6D396bjBcc_92Cm0vwS_pbeVB_-Ix_a_FXIkeCkeXr7SW-JcZHksKFHQ8YGQp2KlfgBnJ/pub?gid=1511270185&single=true&output=csv";
$box=array("$content");
 if(!ini_set('default_socket_timeout', 15)) $tt = "<!-- unable to change socket timeout -->";
 if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
  $tt="";
  $n="\r\rASTON INVENTORY <br> \r";
     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      if(in_array($data[1],$box)){
       $tt.=$n.$data[1]." คงเหลือ  ".$data[11];
       $n="\r <br>";	
      }
     }
     fclose($handle);    
 }
 else{
     $tt=("Problem reading csv"); 
 }
 
 

if (!is_null($events['events'])) {
 // Loop through each event
 foreach ($events['events'] as $event) {
  // Reply only when message sent is in 'text' format
  if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
   // Get text sent
   $text = $event['message']['text'];
   // Get replyToken
   $replyToken = $event['replyToken'];

   // Build message to reply back
   $messages = [
    'type' => 'text',
    'text' => $text
   ];

   // Make a POST Request to Messaging API to reply to sender
   $url = 'https://api.line.me/v2/bot/message/reply';
   $data = [
    'replyToken' => $replyToken,
    'messages' => [$messages],
   ];
   $post = json_encode($data);
   $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   $result = curl_exec($ch);
   curl_close($ch);

   echo $tt . "\r\n";
  }
 }
}
echo "OK";

 ?>
