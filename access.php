<?php
    $mysqli = new mysqli("den1.mysql5.gear.host", "gableon01", "Bd51!2-23t6b", "gableon01");
    $mysqli->query("INSERT INTO messages VALUES ('bulletpal', 'Hello!');
    $result = $mysqli->query("SELECT * FROM messages");
?>
