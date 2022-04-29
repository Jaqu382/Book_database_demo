<?php
require("security.php");
if (security_validate())
    security_deleteBook();
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
            <legend>My Book Database: Delete book</legend>
            <p>Input the title of the book you want to delete.</p>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">
            <label for="confirm">Are you sure you want to delete this title?</label>
            <input type="text" id="confirm" name="confirm" placeholder="Yes">
            <input type="submit">
        </fieldset>
    </form>
</body>

</html>