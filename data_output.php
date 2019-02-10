<?php
$root          = "root";
$root_password = "";
$host          = "localhost";

$user = 'root';
$pass = '';
$db   = "testaltarix";
$sql = "";

$dbh = new PDO("mysql:dbname=$db;host=$host", $root, $root_password);
$result = $mysqli->query("SELECT `time_request` FROM `list`")->fetchAll(PDO::FETCH_COLUMN);

/*
$answer = "";
while($mysqli = $answer->fetch(PDO::FETCH_BOTH)) {
    $answer=$column['time_request'];
}
*/
print_r($result);
