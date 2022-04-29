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
    <?php
    security_readRow() ?>
</body>

</html>