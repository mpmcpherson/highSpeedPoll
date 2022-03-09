<?php
require 'defaultConnector.php';

//server information here
//need mysqli module installed
$gets = json_decode(file_get_contents('php://input'), true);

$userId = $gets["userId"];
$sessionId = $gets["sessionId"];
$roomId = $gets["roomId"];

/* Prepared statement, stage 1: prepare */
$stmt = $mysqli->prepare("SELECT FLAG FROM updateFlagTable TBL WHERE USERID = ? and ROOMID = ? and SESSIONID = ?");

/* Prepared statement, stage 2: bind and execute */
$id = ["your post data"];
$stmt->bind_param("i", $userId); 
$stmt->bind_param("i", $roomId); 
$stmt->bind_param("i", $sessionId); 

$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>
