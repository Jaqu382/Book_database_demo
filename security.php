<?php
include("database.php");

function security_validate()
{
    // Set a default value
    $status = false;

    // Validate
    if (isset($_POST["title"])) {
        $status = true;
    }

    return $status;
}
//Sanitize input
function security_sanitize()
{
    // Create an array of keys username and password
    $result = [
        "title" => null,
        "author" => null,
        "genre" => null,
        "owned" => null,
        "purchase" => null,
        "reviewed" => null,
        "note" => null,
    ];

    if (security_validate()) {
        // After validation, sanitize text input.
        $result["username"] = htmlspecialchars($_POST["username"]);
        $result["password"] = htmlspecialchars($_POST["password"]);
    }

    // Return array
    return $result;
}
