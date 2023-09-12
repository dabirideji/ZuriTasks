<?php

// Get the query parameters
$slackName = isset($_GET['slack_name']) ? $_GET['slack_name'] : null;
$track = isset($_GET['track']) ? $_GET['track'] : null;

// Get the current day of the week
$currentDayOfWeek = date('l');

// Get the current UTC time
$currentUtcTime = gmdate('H:i:s');

// GitHub repository information
$githubFileUrl = 'https://github.com/yourusername/yourrepository/blob/main/path/to/your/file.php';
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
        "current_day_of_week" => $currentDayOfWeek,
        "current_utc_time" => $currentUtcTime,
        "track" => $track,
        "github_file_url" => $githubFileUrl,
        "github_repo_url" => $githubRepoUrl,
        "status_code" => 200
    ];
    http_response_code(200);
}

// Set the Content-Type header to JSON
header('Content-Type: application/json');

// Output the JSON response
echo json_encode($response);
