<?php
require 'credentials.php';

$link = new mysqli($server, $username, $password, $db);
if ($link->connect_error) {
    die("Connection Unsuccessful");
} else {
    echo "Connection successful!";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO client (username, password)
        VALUES('$username', '$password')";
    $link->query($sql);
    echo "Registered Successfully!";
    echo "<a href='signup.php'><button type='button'>Login</button></a>";
}
?>
