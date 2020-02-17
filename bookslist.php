<!DOCTYPE html>
<html>
<body>

<?php
require 'credentials.php';


$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT bookname, author, issuername, checkedout, requestedby FROM bookslist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<br>" . " Book Name: ". $row["bookname"].
        "<br>" . " Author: " . $row["author"] .
       "<br>" . " Issuer Name: " . $row["issuername"] .
       "<br>" . " Requested By: " . $row["requestedby"] .
       "<br>" . " Checked out: " . $row["checkedout"] ."<br>";

        echo "<form method='post' action='checkout.php'>
             <label>Client Username:</label><br>
             <input type='text' name='issuername'><br>
             <input type='hidden' name='bookname' value='".$row["bookname"]."'></input>
             <button type ='submit'>Check out</button>
         </form>";
         if($row["checkedout"]==0){
         echo "<form method='post' action='confirmrequest.php'>
              <input type='hidden' name='bookname' value='".$row["bookname"]."'></input>
              <input type='hidden' name='requestedby' value='".$row["requestedby"]."'></input>
              <button type ='submit'>Confirm Request</button>
          </form>";
        }
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
