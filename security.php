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
        $result["title"] = htmlspecialchars($_POST["title"]);
        $result["author"] = htmlspecialchars($_POST["author"]);
        $result["genre"] = htmlspecialchars($_POST["genre"]);
        $result["owned"] = htmlspecialchars($_POST["owned"]);
        $result["purchase"] = htmlspecialchars($_POST["purchase"]);
        $result["reviewed"] = htmlspecialchars($_POST["reviewed"]);
        $result["note"] = htmlspecialchars($_POST["note"]);
    }

    // Return array
    return $result;
}
//Create
function security_addBook()
{
    $result = security_sanitize();
    database_connect();
    if (!database_verifyBook($result["title"], $result["author"])) {
        database_addBook($result["title"], $result["author"], $result["genre"], $result["owned"], $result["purchase"], $result["reviewed"], $result["note"]);
    }
    database_close();
}
function security_update()
{
}

//Delete
function security_deleteBook()
{
    $result = security_sanitize();
    database_connect();
    if (isset($_POST["title"]) and isset($_POST["confirm"])) {
        database_deleteUser($result["title"], $result["confirm"]);
    }
    database_close();
};
