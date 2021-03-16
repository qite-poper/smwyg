<?php

$token = getenv("STAGING_HEROKU_TOKEN");
if(!$token){
    exit('err: no token');
}

$appId = getenv('STAGING_HEROKU_APP_ID');
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
