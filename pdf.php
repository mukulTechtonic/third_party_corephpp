<?php

// API endpoint
$url = 'https://api.hostedscan.com/v1/reports';

// API key
$apiKey = 'your-api-key-here';

// Request data
$data = [
    'report_format' => 'PDF',
    'targets_filter' => [
        'target_ids' => ['655894350c761bdca0e3e992'],
    ],
];

// Set up cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "X-HOSTEDSCAN-API-KEY: $apiKey",
    "Content-Type: application/json",
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
    print_r($responseData);
} else {
    echo 'API request failed';
}