<?php
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

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["screenname"]. ", " . $row["Message"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
