<?php
if(isset($_GET['debug'])){
    if($_GET['debug'] == 'true'){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
}

$servername = "den1.mysql5.gear.host";
$username = "gableon01";
$password = $_GET['pw'];
$database = "gableon01";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function writeDatabase($username, $message, $conn){
    $conn->query("INSERT INTO messages (screenname, message) VALUES ('".$username."', '"."$message')");
}

if(isset($_GET['writing'])){
    if($_GET['writing'] == 'true'){
        writeDatabase($_GET['username'], $_GET['message'], $conn);
    }
}

function collectData($limit, $conn){
    $result = $conn->query("SELECT screenname, message FROM messages ORDER BY id DESC LIMIT "."$limit");
    if ($result->num_rows > 0) {
        $jarray = array();
        while($row = mysqli_fetch_assoc($result)) {
            //echo $row["screenname"]. "," . $row["message"]. "|";
            $jarray[] = $row;
        }
        echo json_encode($jarray);
    }
}

if(isset($_GET['getting'])){
    if($_GET['getting'] == 'true'){
        collectData($_GET['limit'], $conn);
    }
}

$conn->close();
?>
