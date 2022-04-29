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
//Read
function security_readRow()
{
    $result = security_sanitize();
    $data = NULL;
    database_connect();
    if (database_verifyBook($result["title"], $result["author"])) {
        $data = database_showRow($result["title"], $result["author"]);
        echo ("<table>");
        echo ("<th>Title</th><th>Author</th><th>Genre</th>");
        $row = mysqli_fetch_assoc($data);
        echo ("<tr>");
        echo ("<td>" . $row["TITLE"] . "</td>" . "<td>" . $row["AUTHOR"] . "</td>" . "<td>" . $row["GENRE"] . "</td>");
        echo ("</tr>");
        echo ("</table>");
    } else echo ("<p>Data not found</p>");
    database_close();
}
function security_readTable()
{
    // Get the results of a query using the connection
    database_connect();
    $results = database_showTable();
    // Start the HTML table.
    echo ("<table><tbody>");
    echo ("<th>Title</th><th>Author</th><th>Genre</th>");
    while ($row = mysqli_fetch_assoc($results)) {
        // Start the row.
        echo ("<tr>");
        //Formats result data as first name, last name, city, state
        echo ("<td>" . $row["TITLE"] . "</td>" . "<td>" . $row["AUTHOR"] . "</td>" . "<td>" . $row["GENRE"] . "</td>");
        // End the row.
        echo ("</tr>");
    }
    // End the HTML table.
    echo ("</tbody></table>");
    database_close();
}


//update
function security_update()
{
    $result = security_sanitize();
    database_connect();
    if (!database_verifyBook($result["title"], $result["author"])) {
        database_updateBook($result["title"], $result["author"], $result["genre"], $result["owned"], $result["purchase"], $result["reviewed"], $result["note"]);
    }
    database_close();
}
//Delete
function security_deleteBook()
{
    $result = security_sanitize();
    database_connect();
    if (isset($_POST["title"]) and isset($_POST["confirm"])) {
        database_deleteBook($result["title"], $result["confirm"]);
    }
    database_close();
};
