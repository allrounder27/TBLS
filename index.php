<?php
require 'credentials.php';


$link = new mysqli($server, $username, $password, $db);
if ($link->connect_error) {
    die("Connection Unsuccessful");
} else {
    echo "Connection successful!";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admins WHERE username='$username' AND password='$password' LIMIT 1 ";
    $results = mysqli_query($link, $query);
    if (mysqli_num_rows($results) == 1) {
        echo "Logged in Successfully";
        echo
    "<!DOCTYPE html>
    <html>
    <head>
        <title>Main</title>
    </head>
    <body>
     <h1>Welcome</h1>
     <h3>Add Book:</h3>
     <form method='post' action='addbook.php'>
          <label for='bookname'>Book Name:</label><br>
          <input type='text' name='bookname'><br>
          <label for='Author'>Author:</label><br>
          <input type='author' name ='author'><br>
          <button type ='submit'>submit</button>
      </form>
      <form action='bookslist.php'>
        <label>Show Books List:</label><br>
        <button>Show</button>
      </form>
    </body>
    </html>";
    }
}
?>
