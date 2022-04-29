<?php
require("security.php")
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
  <div>
    <form action="results.php" method="POST">
      <fieldset>
        <legend>My Book Database: Home</legend>
        <p>Fill the information of a book to view.</p>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <label for="author">Author:</label>
        <input type="text" id="author" name="author">
        <input type="submit">
      </fieldset>
    </form>
    <div>
      <a href="add.php">Add a book</a>
      <a href="delete.php">Delete a book</a>
    </div>
  </div>
  <div>
    <?php
    security_readTable() ?>
  </div>
</body>

</html>