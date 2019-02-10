<?php
$root          = "root";
$root_password = "";
$host          = "localhost";

$user = 'root';
$pass = '';
$db   = "testaltarix";
$sql = "";

$dbh = new PDO("mysql:dbname=$db;host=$host", $root, $root_password);
$dbh->exec($result = "SELECT `time_request` FROM `list`");

while($result = $answer->mysqli_fetch_array(MYSQLI_ASSOC)) {
    $answer=$column['time_request'];
}
print_r($result);