<?php
$root          = "root";
$root_password = "";
$host          = "localhost";

$user = 'root';
$pass = '';
$db   = "testaltarix";
$sql = "";

$dbh = new PDO("mysql:dbname=$db;host=$host", $root, $root_password);
$result = $dbh->query("SELECT `time_request` FROM `list`")->fetchAll(PDO::FETCH_COLUMN);
$result = implode(",", strtotime($result));
//$result = strtotime($result);
echo date('d:m:Y H:i:s', strtotime($result));
