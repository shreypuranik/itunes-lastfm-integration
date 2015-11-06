<?php
include_once("traits/trait.Sanitizer.php");
include_once("classes/class.iTunesData.php");

$dataObj = new iTunesData();
$dataObj->readInData();
$results = $dataObj->topEntries;
header('Content-Type: application/json');
echo json_encode($results);
?>