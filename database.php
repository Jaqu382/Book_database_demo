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
    database_connect();
    if ($connection != null) {
        mysqli_query($connection, "INSERT INTO my_books(TITLE, AUTHOR, GENRE, OWNED,PURCHASE,REVIEWED,NOTE)
        VALUES ('{$title}', '{$author}', '{$genre}','{$owned},'{$purchase}','{$reviewed}','{$note}')");
    };
    database_close();
}
//Read
function database_verifyBook($title, $author)
{
    global $connection;
    $status = false;
    if ($connection != null) {
        $results = mysqli_query($connection, "SELECT TITLE FROM my_books WHERE TITLE = '{$title}' AND AUTHOR = '{$author}");
        $row = mysqli_fetch_assoc($results);
        if ($row != null) $status = true;
    }
    return $status;
}
function database_showRow($title, $author,)
{
    global $connection;
    if ($connection != null)
        $results = mysqli_query($connection, "SELECT TITLE, AUTHOR, GENRE, OWNED, PURCHASE, REVIEWED, NOTE FROM my_books WHERE TITLE = '{$title}' AND AUTHOR = '{$author}';");
    return $results;
}
function database_showTable()
{
    $results = mysqli_query($connection, "SELECT first_name, last_name, city, `state` FROM sales.customers;");
    return $results;
}
//*Update*/
function database_updateBook(
    $title,
    $owned,
    $purchase,
    $reviewed,
    $note
) {
    global $connection;
    database_connect();
    if ($connection != null) {
        if ($owned != "" || NULL)
            mysqli_query($connection, "UPDATE my_books SET OWNED = '{$owned}' WHERE TITLE ='{$title}';");
        if ($purchase != "" || NULL)
            mysqli_query($connection, "UPDATE my_books SET PURCHASE= '{$purchase}' WHERE TITLE ='{$title}';");
        if ($purchase != "" || NULL)
            mysqli_query($connection, "UPDATE my_books SET REVIEWED= '{$reviewed}' WHERE TITLE ='{$title}';");
        if ($purchase != "" || NULL)
            mysqli_query($connection, "UPDATE my_books SET NOTE= '{$note}' WHERE TITLE ='{$title}';");
    }
    database_close();
}
//*Delete */
function database_deleteBook($title, $confirm)
{
    global $connection;
    database_connect();
    if ($connection != null) {
        if ($confirm == $title)
            mysqli_query($connection, "DELETE FROM my_books WHERE username = '{$title}';");
    };
    database_close();
}
