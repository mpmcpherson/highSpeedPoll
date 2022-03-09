<?php

require 'defaultConnector.php';

//server information here
//need mysqli module installed
$gets = json_decode(file_get_contents('php://input'), true);

$userId = $gets["userId"];
$sessionId = $gets["sessionId"];
$roomId = $gets["roomId"];

$line = $gets["rollString"];

$numDicePattern = "<[0-9]+[a-zA-z]+>";
$typeDicePattern = "<[a-zA-z]+[0-9]+>";

preg_match($numDicePattern, $line, $numMatches);

preg_match($typeDicePattern, $line, $typeMatches);

$numDice = str_replace("d", "", $numMatches[0]);
$typeDice = str_replace("d", "", $typeMatches[0]);

$rollBreakDown = "";
$sum = 0;
for($i=0;$i<$numDice;$i++){
    $roll = rand(1,$typeDice);
    $rollBreakDown.=$roll." ";
    $sum+=$roll;
    $roll=0;
}

$writeLine = "total: " .$sum."\n breakdown: ".$rollBreakDown."\n";


$stmt = $mysqli->prepare("INSERT INTO DIEROLLHISTORY(sum,breakdown,userId,roomId) VALUES(".$sum.", ".$rollBreakDown.",?,?)");
$stmt->bind_param("ii", $userId, $roomId); 
$stmt->execute();

$stmt = $mysqli->prepare("UPDATE updateFlagTable SET FLAG = 1 WHERE USERID = ? and ROOMID = ? and SESSIONID = ?");
$stmt->bind_param("iiii", 1, $userId, $roomId, $sessionId);
$stmt->execute();

echo json_encode([$sum,$rollBreakDown])



?>