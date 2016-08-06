<?php

header('Content-type: application/json');

$name       = @trim(stripslashes($_POST['name'])); 
$from       = @trim(stripslashes($_POST['email'])); 
$subject    = @trim(stripslashes($_POST['subject'])); 
$message    = @trim(stripslashes($_POST['message'])); 


$api_key = "JvtNt5hseo5umMyt1ys2";
$password = "nopasswordneeded";
$yourdomain = "solusti";

$ticket_data = json_encode(array(
  "description"      => nl2br($message),
  "subject"          => $subject,
  "name"             => $name,
  "email"            => $from,
  "priority"         => 2,
  "status"           => 2
));

$url = "https://$yourdomain.freshdesk.com/api/v2/tickets";

$ch = curl_init($url);

$header[] = "Content-type: application/json; charset=utf-8";
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$api_key:$password");
curl_setopt($ch, CURLOPT_POSTFIELDS, $ticket_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);
$info = curl_getinfo($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$headers = substr($server_output, 0, $header_size);
$response = substr($server_output, $header_size);

curl_close($ch);


if($info['http_code'] == 201) {
  $result = json_encode(array(
        'status'=>'OK',
        'server_output'=>json_decode($response)
  ));
} else {
  if($info['http_code'] == 404) {
    $result = json_encode(array(
      'status'=>'KO',
      'server_output'=>'404 not found.'
    ));
  } else {
    $result = json_encode(array(
        'status'=>'KO',
        'server_output'=>json_decode($response)
    ));
  }
}

echo $result;
// echo "\n\n\n\n";
// echo print_r($info);
// echo "\n\n\n\n";
// echo $server_output;
?>