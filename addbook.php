<?php
require 'credentials.php';

$link = new mysqli($server, $username, $password, $db);
if ($link->connect_error) {
    die("Connection Unsuccessful");
} else {
    echo "Connection successful";
    $bookname = $_POST['bookname'];
    $author = $_POST['author'];
    $sql = "INSERT INTO bookslist (bookname,author)
        VALUES('$bookname', '$author')";
    $link->query($sql);
    echo "Book added";
}
?>
