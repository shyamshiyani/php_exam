<?php
include '../../config/config.php';
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $config = new Config();

    $res = $config->fetchallUser();

    $user_records = [];

    while ($record = mysqli_fetch_assoc($res)) {
        array_push($user_records, $record);
    }
    echo json_encode($user_records);


} else {
    $arr['error'] = "ONLY GET HTTP REQUEST METHOD IS ALLOWED...!";
    echo json_encode($arr);
}
?>