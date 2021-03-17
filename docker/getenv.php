<?php

$token = '9d7f3c4e-133e-4fb1-8750-926f27f30e85';
if(!$token){
    exit('err: no token');
}

$appId = 'aec460cd-c84b-4e75-9b54-ab0830758648';
$ch = curl_init();

$headers = array(
    "authorization: Bearer $token",
    "accept: application/vnd.heroku+json; version=3",
);

curl_setopt($ch, CURLOPT_URL,"https://api.heroku.com/apps/$appId/config-vars");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec($ch);
$list = json_decode($server_output, true);

foreach ($list as $key => $value){
    file_put_contents('.env', "$key=$value \n",FILE_APPEND);
}
echo "ok";
