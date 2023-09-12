<?php

// Set the response content type to JSON
header('Content-Type: application/json');

// Define an associative array to store the API response
$response = [];

// Handle GET requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the query parameters
    $slackName = isset($_GET['slack_name']) ? $_GET['slack_name'] : null;
    $track = isset($_GET['track']) ? $_GET['track'] : null;

    // Get the current day of the week
    $currentDayOfWeek = date('l');

    
    date_default_timezone_set('UTC');

// Get the current UTC time in the desired format
// $utcTimestamp = date('Y-m-d\TH:i:s\Z');
    
    // Get the current UTC time

    $currentUtcTime = date('Y-m-d\TH:i:s\Z');

    // GitHub repository information
    $githubFileUrl = 'https://github.com/dabirideji/ZuriTasks/blob/fcce9952cfa31d97ae2280c35d0be22b7d1061cb/Index.php';
    $githubRepoUrl = 'https://github.com/dabirideji/ZuriTasks';

    // Check if slack_name and track parameters are provided
    if ($slackName === null || $track === null) {
        $response = [
            "error" => "Both 'slack_name' and 'track' parameters are required."
        ];
        http_response_code(400); // Set HTTP status code to 400 (Bad Request)
    } else {
        // Generate the JSON response
        $response = [
            "slack_name" => $slackName,
            "current_day" => $currentDayOfWeek,
            "utc_time" => $currentUtcTime,
            "track" => $track,
            "github_file_url" => $githubFileUrl,
            "github_repo_url" => $githubRepoUrl,
            "status_code" => 200
        ];
        http_response_code(200);
    }
} else {
    // Handle other HTTP methods (e.g., POST, PUT, DELETE)
    // Return an error response indicating that the method is not allowed
    $response = [
        "error" => "HTTP method not allowed."
    ];
    // Set the HTTP response code to 405 (Method Not Allowed)
    http_response_code(405);
}

// Output the JSON response
echo json_encode($response, JSON_PRETTY_PRINT);

?>
