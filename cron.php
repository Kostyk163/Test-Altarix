<?php

$url = "http://dev.soap-task.blackhole.marm.altarix.org/wsdl";

$client = new SoapClient($url, array('trace' => 1));

$result = $client->getTaxiInfo(array("regNum"=> "ЕМ333777"));
print_r($result->getTaxiInfoResult);
echo $client->__getLastResponse() . " ss " . $client->__getLastRequestHeaders();
//print_r($response);

$id = '';
$time_request = '';
$time_response = '';
$time_vait = $time_response - $time_request;
$status = '';
$body_response = $client->__getLastResponse;

$host="localhost";
$user='root';
$pass='';
$db="testaltarix";

$link = mysqli_connect("$host" , "$user" , "$pass" , "$db");
if ( !$link ) {
    echo 'Ошибка: ' . mysqli_connect_errno() . ':' . mysqli_connect_error();
}

$sql = "SELECT FROM users
        INSERT INTO users(id, time_request, time_response, time_vait, status, body_response)
        VALUES ($id, $time_request, $time_response, $time_vait, $status, $body_response)";
if (mysqli_query($link, $sql)) {
    echo "Запись добавлена";
} else {
    echo 'Ошибка: ' . $sql . '<br>' . mysqli_connect_error($link);
}