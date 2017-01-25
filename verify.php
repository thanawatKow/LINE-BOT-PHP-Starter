<?php
$access_token = 'MD2dEPMURretUcV/8Gy3euEQDd8DecNipGykcYblT0Z+zVtquny3uwsIg+kt6kEF+JmkZ8fNVdWozJZwdekkR0NBg38aal0mg35mUW1064/CWQnZuCew7HNiqw8I0tL6PNGPfucx1EIwT8Zo38DcwwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
