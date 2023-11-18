<?php

// API endpoint
$url = 'https://api.hostedscan.com/v1/scans';

// API key
$apiKey = 'key_f527ce9f3e9976964717067cced31f89c050f6e96cd6ca3b';

// Request data
$data = [
    'targets' => ['https://bhrnetwrk.com/'],
    'type' => 'NMAP',
];

// Set up cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
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
    $responseData = json_decode($response, true);
    // Process the data as needed
    echo json_encode(json_decode($responseData), JSON_PRETTY_PRINT);
} else {
    // Handle the error
    echo 'API request failed';
}