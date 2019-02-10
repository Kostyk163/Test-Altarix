<?php
$root          = "root";
$root_password = "";
$host          = "localhost";

$user = 'root';
$pass = '';
$db   = "testaltarix";
$sql = "";

$dbh = new PDO("mysql:dbname=$db;host=$host", $root, $root_password);
$result = $dbh->query("SELECT `time_wait` FROM `list`")->fetchAll(PDO::FETCH_COLUMN);

$result = implode(",", $result);
echo $result;
