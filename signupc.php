<?php
require 'credentials.php';

$link = new mysqli($server, $username, $password, $db);
if ($link->connect_error) {
    die("Connection Unsuccessful");
} else {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if($username=='' || $password==''){
      echo "Username and Password cannot be empty.";
    }else{
    $sql = "INSERT INTO client (username, password)
        VALUES('$username', '$password')";
    $link->query($sql);
    echo "Registered Successfully!";
    echo "<a href='signup.php'><button type='button'>Login</button></a>";}
}
?>
