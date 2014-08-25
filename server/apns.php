<?php

$message = 'Facebook...';
$badge = 1;
$sound = 'default';
$development = true;
//If you want to send json.
$json = 'Any JSON String';

//$json = '{"count": "2", "notification": {"type" : "1", "message" : "Facebook...", "lp" : "update_1", "resource": "http://www.itnext.in/sap2013/SAP_Mobile_Top10.pdf"}}';

$payload = array();
$payload['aps'] = array("json" => $json, 'alert' => $message, 'badge' => intval($badge), 'sound' => $sound);
$payload = json_encode($payload);

$apns_url = NULL;
$apns_cert = NULL;
$apns_port = 2195;

if($development)
{
	$apns_url = 'gateway.sandbox.push.apple.com';
	$apns_cert = '/path/to/cert/cert-dev.pem';
}
else
{
	$apns_url = 'gateway.push.apple.com';
	$apns_cert = '/path/to/cert/cert-prod.pem';
}
//echo $apns_url;
$stream_context = stream_context_create();
stream_context_set_option($stream_context, 'ssl', 'local_cert', $apns_cert);

$apns = stream_socket_client('ssl://' . $apns_url . ':' . $apns_port, $error, $error_string, 2, STREAM_CLIENT_CONNECT, $stream_context);

//	You will need to put your device tokens into the $device_tokens array yourself
$device_tokens = array('Register devices.');

foreach($device_tokens as $device_token)
{
	$apns_message = chr(0) . chr(0) . chr(32) . pack('H*', str_replace(' ', '', $device_token)) . chr(0) . chr(strlen($payload)) . $payload;
	fwrite($apns, $apns_message);
}

@socket_close($apns);
@fclose($apns);


?>
