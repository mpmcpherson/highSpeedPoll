<?php
//server information here
//need mysqli module installed


$mysqli = new mysqli("example.com", "user", "password", "database");

/* Prepared statement, stage 1: prepare */
$stmt = $mysqli->prepare("SELECT READFLAG FROM [YOURDBTABLE] TBL WHERE USERID = ?");

/* Prepared statement, stage 2: bind and execute */
$id = ["your post data"];
$stmt->bind_param("i", $id); // "is" means that $id is bound as an integer and $label as a string

$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>
