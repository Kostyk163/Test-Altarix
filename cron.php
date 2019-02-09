<?php

$url = "http://dev.soap-task.blackhole.marm.altarix.org/wsdl";

$time_request = microtime(TRUE);
$body_response = "";
$statusService = true;
try {
    $client = new SoapClient($url, array('trace' => 1));
    $result = $client->getTaxiInfo(array("regNum" => "ЕМ333777"));
    $resultate = $result->getTaxiInfoResult;
} catch (Exception $e) {
    echo 'Некорректный ответ: ', $e->getMessage();
    $statusService = false;
}

$time_response = microtime(TRUE);
//print_r($resultate);
//echo $client->__getLastResponse() . " ss " . $client->__getLastRequestHeaders();
//print_r($response);

$resultate = [
    'licenseNum'  => $resultate->licenseNum,
    'licenseDate' => $resultate->licenseDate,
    'name'        => $resultate->name,
    'ogrnNum'     => $resultate->ogrnNum,
    'ogrnDate'    => $resultate->ogrnDate,
    'brand'       => $resultate->brand,
    'model'       => $resultate->model,
    'regNum'      => $resultate->regNum,
    'year'        => $resultate->year,
    'blankNum'    => $resultate->blankNum,
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
} else {
    if($statusService) {
        $body_response = $resultate_str;
    } else {
        $body_response = "Ошибка внешнего сервиса.";
    }
    echo $status = "FAIL";
}

$id            = NULL;
$time_wait     = $time_response - $time_request;
$time_request  = round ($time_request, 0);
$time_response = round ($time_response, 0);

$host = "localhost";
$user = 'root';
$pass = '';
$db   = "testaltarix";

//var_dump(array($id, (int)$time_request, (int)$time_response, (string)$time_wait, (string)$status, (string)$body_response));

$dbh = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
if( $dbh->exec("INSERT INTO `list` (`id`, `time_request`, `time_response`, `time_wait`, `status`, `body_response`) 
VALUES (NULL, '${time_request}', '${time_response}', '${time_wait}', '${status}', '${body_response}');")){
    echo "success insert";
} else {
    echo "error insert";
}
