<?php
require 'credentials.php';


$link = new mysqli($server, $username, $password, $db);
if ($link->connect_error) {
    die("Connection Unsuccessful");
} else {
    $requestedby = $_POST['username'];
    $bookname = $_POST['bookname'];
    $sql = "UPDATE bookslist SET issuername = 'Not issued' , checkedout = false WHERE bookname = '".$bookname."'";
    $link->query($sql);
    echo "Returned!";
}
header("Location: issue.php");
?>
