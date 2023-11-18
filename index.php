<?php

// API endpoint
$url = 'https://api.hostedscan.com/v1/results/655864600c761bdca0dcc6ef'; // Replace 12345 with the actual result ID

// API key
$apiKey = 'key_f527ce9f3e9976964717067cced31f89c050f6e96cd6ca3b
';

// Output file
$outputFile = 'result.pdf';

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
    // Save the response as a PDF file
    file_put_contents($outputFile, $response);
    echo 'Result saved as ' . $outputFile;
} else {
    // Handle the error
    echo 'API request failed';
}
