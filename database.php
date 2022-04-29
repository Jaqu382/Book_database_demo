<?php
$connection = null;
//*Connection boilerplate *
function database_connect()
{
    //connection boilerplate
    global $connection;
    if ($connection == null) {
        $connection = mysqli_connect("localhost", "root", "", "my_books");
    }
}
function database_close()
{
    //close connection boilerplate
    global $connection;

    if ($connection != null) {
        mysqli_close($connection);
    }
}
//*Connection boilerplate end *
//*Create */
function database_addBook($title, $author, $genre, $owned, $purchase, $reviewed, $note)
{
    global $connection;
    if ($connection != null) {
        mysqli_query($connection, "INSERT INTO my_books(TITLE, AUTHOR, GENRE, OWNED,PURCHASE,REVIEWED,NOTE)
        VALUES ('{$title}', '{$author}', '{$genre}','{$owned},'{$purchase}',{$reviewed},{$note})");
    };
}
//*Delete */
function database_deleteBook($title, $confirm)
{
    global $connection;
    if ($connection != null) {
        if ($confirm == $title)
            mysqli_query($connection, "DELETE FROM my_books WHERE username = '{$title}';");
    };
}
