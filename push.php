<?php


// you can send xml, json or simple text
$json = '{"type" : "1", "message" : "text..."}';


$registrationIDs = array("Your Registeration ids");

function sendToGCM($json, $registrationIDs){
// Replace with real BROWSER API key from Google APIs
$apiKey = "Your API Key";



// Set POST variables
$url = 'https://android.googleapis.com/gcm/send';

$fields = array(
                'registration_ids'  => $registrationIDs,
                'data'              => array( "json" => $json, "title" => "Statusbar testing." ),
                );

$headers = array(
                    'Authorization: key=' . $apiKey,
                    'Content-Type: application/json'
                );

// Open connection
$ch = curl_init();

// Set the url, number of POST vars, POST data
curl_setopt( $ch, CURLOPT_URL, $url );

curl_setopt( $ch, CURLOPT_POST, true );
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

// Execute post
$result = curl_exec($ch);

// Close connection
curl_close($ch);

echo $result;
}

sendToGCM($json, $registrationIDs);
?>
