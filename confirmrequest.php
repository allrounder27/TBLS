<?php
require 'credentials.php';


$link = new mysqli($server, $username, $password, $db);
if ($link->connect_error) {
    die("Connection Unsuccessful");
} else {
    $requestedby = $_POST['requestedby'];
    $bookname = $_POST['bookname'];
    $sql = "UPDATE bookslist SET issuername = '".$requestedby."' , checkedout = true WHERE bookname = '".$bookname."'";
    $sqll = "UPDATE client SET Book1 = '".$bookname."' WHERE username = '".$requestedby."'";
    $link->query($sql);
    $link->query($sqll);

}
header("Location: bookslist.php");
?>
