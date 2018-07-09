<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "den1.mysql5.gear.host";
$username = "gableon01";
$password = "Bd51!2-23t6b";
$database = "gableon01";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$conn->query("INSERT INTO messages VALUES ('singerboy41', 'hi!')");
$result = $conn->query("SELECT * FROM messages");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["id"]. ", ". $row["screenname"]. ", " . $row["Message"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
