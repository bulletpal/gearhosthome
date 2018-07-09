<?php
if(isset($_POST['debug'])){
    if($_POST['debug'] == 'true'){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
}

$servername = "den1.mysql5.gear.host";
$username = "gableon01";
$password = $_POST['pw'];
$database = "gableon01";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function writeDatabase($username, $message, $conn){
    $conn->query("INSERT INTO messages (screenname, message) VALUES ('".$username."', '"."$message')");
}

if(isset($_POST['writing'])){
    if($_POST['writing'] == 'true'){
        writeDatabase($_POST['username'], $_POST['message'], $conn);
    }
}

function collectData($limit, $conn){
    $result = $conn->query("SELECT screenname, message FROM messages ORDER BY id DESC LIMIT "."$limit");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $row["screenname"]. "," . $row["message"]. "|";
        }
    }
}

if(isset($_POST['getting'])){
    if($_POST['getting'] == 'true'){
        collectData($_POST['limit'], $conn);
    }
}

$conn->close();
?>
