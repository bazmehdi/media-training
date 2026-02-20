<?php
// 1. Ensure this is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 2. Sanitize incoming data
    // htmlspecialchars converts special characters to HTML entities to prevent XSS
    $firstName = htmlspecialchars(trim($_POST['firstName'] ?? ''));
    $surname   = htmlspecialchars(trim($_POST['surname'] ?? ''));
    $email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $comments  = htmlspecialchars(trim($_POST['comments'] ?? ''));

    // 3. Structure as an associative array
    $newSubmission = [
        'firstName' => $firstName,
        'surname'   => $surname,
        'email'     => $email,
        'comments'  => $comments,
        'timestamp' => date('Y-m-d H:i:s') // Added a timestamp for better record keeping
    ];

    $jsonFile = 'data.json';
    $currentData = [];

    // 4. Read existing JSON data (if the file exists)
    if (file_exists($jsonFile)) {
        $fileContents = file_get_contents($jsonFile);
        $decodedData = json_decode($fileContents, true);
        
        // Ensure the decoded data is an array before appending
        if (is_array($decodedData)) {
            $currentData = $decodedData;
        }
    }

    // 5. Append new submission
    $currentData[] = $newSubmission;

    // 6. Encode back to JSON (JSON_PRETTY_PRINT makes the file human-readable)
    $jsonToSave = json_encode($currentData, JSON_PRETTY_PRINT);

    // 7. Save back to data.json
    file_put_contents($jsonFile, $jsonToSave);

    // 8. Redirect to the display page
    header("Location: baz_display.php");
    exit;
} else {
    // If someone tries to access this file directly without posting, send them to the form
    header("Location: baz_index.html");
    exit;
}
?>