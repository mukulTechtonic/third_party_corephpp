<?php

// API endpoint
$url = 'https://api.hostedscan.com/v1/risks/655894350c761bdca0e3e992';


// API key
$apiKey = 'key_f527ce9f3e9976964717067cced31f89c050f6e96cd6ca3b';

// Set up cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "X-HOSTEDSCAN-API-KEY: $apiKey",
]);

// Execute cURL session and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Process the response
if ($response !== false) {
    echo $response ;

    // Process the data as needed

} else {
    // Handle the error
    echo 'API request failed';
}