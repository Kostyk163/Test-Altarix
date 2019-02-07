<?php

$url = "http://dev.soap-task.blackhole.marm.altarix.org/wsdl";

$client = new SoapClient($url, array('trace' => 1));

$result = $client->getTaxiInfo(array("regNum"=> "ЕМ333777"));
$resultate = $result->getTaxiInfoResult;
print_r($resultate);
echo $client->__getLastResponse() . " ss " . $client->__getLastRequestHeaders();
//print_r($response);

$res = implode(" , ", $resultate);

$ok = 'OK';
$fail = 'FAIL';
$params = [
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

$str_params = implode(" , ", $params);

if ($str_params == $res){
    echo $ok;
}else {
        echo $fail;
}

$id = '';
$time_request = '';
$time_response = '';
$time_vait = $time_response - $time_request;
$status = '';
$body_response = $client->__getLastResponse;

$host = "localhost";
$user = 'root';
$pass = '';
$db = "testaltarix";

$link = mysqli_connect("$host" , "$user" , "$pass" , "$db");
if ( !$link ) {
    echo 'Ошибка: ' . mysqli_connect_errno() . ':' . mysqli_connect_error();
}

$sql = "SELECT * FROM users
        INSERT INTO users(id, time_request, time_response, time_vait, status, body_response)
        VALUES ($id, $time_request, $time_response, $time_vait, $status, $body_response)";
if (mysqli_query($link, $sql)) {
    echo "Запись добавлена";
} else {
    echo 'Ошибка: ' . $sql . '<br>' . mysqli_connect_error($link);
}
