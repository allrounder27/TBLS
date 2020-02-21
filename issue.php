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
$sql = "SELECT bookname, author, issuername, checkedout FROM bookslist";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<br>" . " Book Name: ". $row["bookname"].
        "<br>" . " Author: " . $row["author"] .
       "<br>" . " Issuer Name: " . $row["issuername"] .
       "<br>" . " Checked out: " . $row["checkedout"] ."<br>";

       if($row["checkedout"]==0){
        echo "<form method='post' action='request.php'>
             <input type='hidden' name='bookname' value='".$row["bookname"]."'></input>
             <input type='hidden' name='username' value='".$username."'></input>
             <button type ='submit'>Request</button>
         </form>";
       }
       if($row["checkedout"]==1 && $row["issuername"]==$username){
        echo "<form method='post' action='return.php'>
             <input type='hidden' name='bookname' value='".$row["bookname"]."'></input>
             <input type='hidden' name='username' value='".$username."'></input>
             <button type ='submit'>Return</button>
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
