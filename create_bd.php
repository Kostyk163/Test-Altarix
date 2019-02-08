<?php
$root          = "root";
$root_password = "";
$host          = "localhost";

$user = 'root';
$pass = '';
$db   = "testaltarix";

try {
    $dbh = new PDO("mysql:host=$host", $root, $root_password);
    $dbh->exec("CREATE DATABASE `$db`;");
} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}
