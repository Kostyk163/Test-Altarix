<?php
$root="root";
$root_password="";
$host="localhost";

$user='root';
$pass='';
$db="testaltarix";

try {
$dbh = new PDO("mysql:dbname=$db;host=$host", $root, $root_password);
    if( $dbh->exec("CREATE TABLE IF NOT EXISTS `users` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `time_request` bigint NOT NULL,
                `time_response` bigint NOT NULL,
                `time_wait` bigint NOT NULL,
                `status` varchar(5) NOT NULL,
                `body_response` text(2000),
                PRIMARY KEY (`id`)
                )"))
            echo "Таблица создана";
        else
            echo "таблица существует";

} catch(PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}