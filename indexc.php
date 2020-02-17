<?php
require 'credentials.php';


$link = new mysqli($server, $username, $password, $db);
if ($link->connect_error) {
    die("Connection Unsuccessful");
} else {
    echo "Connection successful!";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM client WHERE username='$username' AND password='$password' LIMIT 1 ";
    $results = mysqli_query($link, $query);
    if (mysqli_num_rows($results) == 1) {
        echo "Logged in Successfully";
        echo "
      <!DOCTYPE html>
      <html>
      <head>
          <title>Main</title>
      </head>
      <body>
       <h1>Welcome</h1>
        <form method='post' action='showbooks.php'>
          <label>Show MyBooks List:</label><br>
          <input type='hidden' name='username' value='".$username."'></input>
          <button>Show</button>
        </form>
        <form method='post' action='issue.php'>
          <input type='hidden' name='username' value='".$username."'></input>
          <label>Show Books List:</label><br>
          <button>Show</button>
        </form>
      </body>
      </html>";
    }
}
