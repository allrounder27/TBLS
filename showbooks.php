<!DOCTYPE html>
<html>
<body>

<?php
require 'credentials.php';


$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$sql = "SELECT username, Book1, Book2 FROM client WHERE username = '".$username."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<br>" . " Username: ". $row["username"].
        "<br>" . " Book1: " . $row["Book1"] .
       "<br>" . " Book2: " . $row["Book2"] . "<br>";

    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
