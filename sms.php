<?php

function sms($to,$message){

$url = 'http://techsultsms.co.ke/sms/api?';

$action = 'send-sms';

$apikey = 'QnJpYW46QnJpYW5QQHNz';

$from = 'Techsult';

$myvars = 'action=' . $action . '&api_key=' . $apikey . '&to=' . $to . '&from=' . $from . '&sms=' .$message ;

$ch = curl_init( $url );

curl_setopt( $ch, CURLOPT_POST, 1);

curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);

curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);

curl_setopt( $ch, CURLOPT_HEADER, 0);

curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );


} //return $message;

?>

