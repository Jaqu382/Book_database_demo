<?php
require("security.php");
if (security_validate())
    security_addBook();
?>
<!DOCTYPE html>
<html lang="en">
<!--Head section contains metadata-->

<head>
    <!--Boilerplate HTML-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>Book database demo</title>
    <link rel="stylesheet" href="styles.css">
    <!--End of boilerplate-->
</head>

<body>
    <form action="delete.php" method="POST">
        <fieldset>
            <legend>My Book Database: Add book</legend>
            <p>Fill the information of a book you want to add.</p>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="author">Author:</label><br>
            <input type="text" id="author" name="author"><br>
            <label for="genre">Genre:</label><br>
            <input type="text" id="genre" name="genre"><br>
            <label for="owned">Owned/Not owned/Rented:</label><br>
            <input type="text" id="owned" name="owned"><br>
            <label for="purchase">Purchase url:</label><br>
            <input type="text" id="purchase" name="purchase"><br>
            <label for="reviewed">Read/Not read</label><br>
            <input type="text" id="reviewed" name="reviewed"><br>
            <label for="note">Note</label><br>
            <input type="text" id="note" name="note"><br>
            <input type="submit">
        </fieldset>
    </form>
</body>

</html>