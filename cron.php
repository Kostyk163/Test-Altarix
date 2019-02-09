<?php

$url = "http://dev.soap-task.blackhole.marm.altarix.org/wsdl";

$time_request = microtime(TRUE);

try {
    $client = new SoapClient($url, array('trace' => 1));
    $result = $client->getTaxiInfo(array("regNum" => "ЕМ333777"));
    $resultate = $result->getTaxiInfoResult;
} catch (Exception $e) {
    echo 'Некорректный ответ: ', $e->getMessage();
}

$time_response = microtime(TRUE);
//print_r($resultate);
//echo $client->__getLastResponse() . " ss " . $client->__getLastRequestHeaders();
//print_r($response);

$resultate = [
    'licenseNum'  => $result->licrnseNum,
    'licenseDate' => $result->licenseDate,
    'name'        => $result->name,
    'ogrnNum'     => $result->ogrnNum,
    'ogrnDate'    => $result->ogrnDate,
    'brand'       => $result->brand,
    'model'       => $result->model,
    'regNum'      => $result->regNum,
    'year'        => $result->year,
    'blankNum'    => $result->blankNum,
];

$original = [
    'licenseNum'  => '02651',
    'licenseDate' => '2011-08-08T00:00:00+00:00',
    'name'        => 'ООО "НЖТ-ВОСТОК"',
    'ogrnNum'     => '1107746402246',
    'ogrnDate'    => '2010-05-17T00:00:00+00:00',
    'brand'       => 'FORD',
    'model'       => 'FOCUS',
    'regNum'      => 'ЕМ333777',
    'year'        => '2011',
    'blankNum'    => '002695',
];

$resultate_str = implode(" ", $resultate);
$original_str = implode(" ", $original);

if ($original_str == $resultate_str) {
    echo $status = "OK";
}
else {
    echo $status = "FAIL";

}

$id            = "NULL";
$time_wait     = $time_response - $time_request;
$body_response = $client->__getLastResponse;

$time_request  = round ($time_request, 0);
$time_response = round ($time_response, 0);

$host = "localhost";
$user = 'root';
$pass = '';
$db   = "testaltarix";

$link = mysqli_connect("$host" , "$user" , "$pass" , "$db");
if ( !$link ) {
    echo 'Ошибка: ' . mysqli_connect_errno() . ':' . mysqli_connect_error();
}
$sql = "INSERT INTO list(id, time_request, time_response, time_wait, status, body_response)
        VALUES ($id, $time_request, $time_response, $time_wait, $status, $body_response)";
if (mysqli_query($link, $sql)) {
    echo "Запись добавлена";
} else {
    echo 'Ошибка: ' . $sql . '<br>' . mysqli_connect_error($link);
}
