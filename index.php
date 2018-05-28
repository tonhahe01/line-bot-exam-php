<?php
$access_token = 'FWAnBvc7hl9c/l96z7jXEtWqAm1JVGl+AWZz51ubTNwSiHsqWqSfZtjazFpBGo5MXq/zFQwLGzGGl4464dTZ91gxkHZYD7Og9slH1QnoTHI97ZgmEQpUWKwiVk9w5kdt76K+jcdddKyTzjF+YCaYHQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data


$spreadsheet_url="https://docs.google.com/spreadsheets/d/e/2PACX-1vSPeOnhVSU6D396bjBcc_92Cm0vwS_pbeVB_-Ix_a_FXIkeCkeXr7SW-JcZHksKFHQ8YGQp2KlfgBnJ/pub?gid=1511270185&single=true&output=csv";
$box=array("$events");
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
  echo $tt;
 
 ?>

 
