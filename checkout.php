<?php
require 'credentials.php';


$link = new mysqli($server, $username, $password, $db);
if ($link->connect_error) {
    die("Connection Unsuccessful");
} else {
    $issuername = $_POST['issuername'];
    $bookname = $_POST['bookname'];
    $sql = "UPDATE bookslist SET issuername = '".$issuername."' , checkedout = true WHERE bookname = '".$bookname."'";
    $link->query($sql);

}
header("Location: bookslist.php");
?>
