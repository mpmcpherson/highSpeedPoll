<?php
require 'defaultConnector.php';
//server information here
//need mysqli module installed
$gets = json_decode(file_get_contents('php://input'), true);

$userId = $gets["userId"];
$sessionId = $gets["sessionId"];
$roomId = $gets["roomId"];

/* Prepared statement, stage 1: prepare */
$stmt = $mysqli->prepare("UPDATE updateFlagTable SET FLAG = 1 WHERE USERID = ? and ROOMID = ? and SESSIONID = ?");

/* Prepared statement, stage 2: bind and execute */

$stmt->bind_param("iiii", 1, $userId,$roomId,$sessionId);
$stmt->execute();

?>